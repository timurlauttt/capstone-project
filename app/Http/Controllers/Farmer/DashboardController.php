<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Inquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Products belonging to the authenticated farmer
        $productsQuery = $user->products();

        // Totals
        $totalProducts = $productsQuery->count();
        // Visible products (if column exists in the schema)
        try {
            $visibleProducts = $productsQuery->where('is_visible', 1)->count();
        } catch (\Throwable $e) {
            // Fallback if column doesn't exist
            $visibleProducts = $totalProducts;
        }

        // Recent items for dashboard (show latest 5)
        $recentProducts = $productsQuery->latest()->take(4)->get();

        // Inquiries related to this farmer's products
        $productIds = $user->products()->pluck('id')->toArray();
        $recentInquiries = [];
        $totalInquiries = 0;
        if (!empty($productIds)) {
            $recentInquiries = Inquiry::whereIn('product_id', $productIds)->latest()->take(5)->get();
            $totalInquiries = Inquiry::whereIn('product_id', $productIds)->count();
        }

        // For backward compatibility the view expects $products — provide recent products
        $products = $recentProducts;

        return view('farmer.dashboard.index', compact(
            'user',
            'products',
            'totalProducts',
            'visibleProducts',
            'recentProducts',
            'recentInquiries',
            'totalInquiries'
        ));
    }

    public function profile()
    {
        $user = Auth::user();
        // Support projects where additional farmer profile relation may or may not exist.
        // If a related profile exists use it, otherwise fall back to the authenticated user.
        $farmer = null;
        try {
            $farmer = $user->farmerProfile ?? null;
        } catch (\Throwable $e) {
            // relation/magic property not defined, ignore and fallback to user
            $farmer = null;
        }

        if (empty($farmer)) {
            $farmer = $user;
        }

        return view('farmer.profile.index', compact('user', 'farmer'));
    }
}
