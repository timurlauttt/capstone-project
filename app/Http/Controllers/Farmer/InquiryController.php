<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::query()->latest();
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $inquiries = $query->paginate(15);
        return view('farmer.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        return view('farmer.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $data = $request->validate(['status' => 'required|string']);
        $inquiry->status = $data['status'];
        $inquiry->save();
        return redirect()->route('farmer.inquiries.show', $inquiry)->with('success', 'Status updated');
    }

    public function reply(Request $request, Inquiry $inquiry)
    {
        $data = $request->validate(['message' => 'required|string']);
        // Simple internal reply: log and flash. In future we can send email and store notes table.
        Log::info('Farmer reply to inquiry '.$inquiry->id.' by user '.Auth::id().': '.$data['message']);
        return redirect()->route('farmer.inquiries.show', $inquiry)->with('success', 'Reply saved (logged).');
    }

    public function export()
    {
        $filename = 'inquiries-'.date('Ymd-His').'.csv';
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id','product_id','name','email','phone','qty','message','status','created_at']);
            Inquiry::orderBy('id')->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [$r->id,$r->product_id,$r->name,$r->email,$r->phone,$r->qty,$r->message,$r->status,$r->created_at]);
                }
            });
            fclose($handle);
        });
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');
        return $response;
    }
}
