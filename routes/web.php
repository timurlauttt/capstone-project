<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Farmer\AuthController;
use App\Http\Controllers\Farmer\DashboardController;
use App\Http\Controllers\Farmer\ProductController;
use App\Http\Controllers\Farmer\InquiryController;


use App\Models\Category;
use App\Models\Product;

Route::get('/', function () {
    // Build categories array expected by the product-section component
    $categories = [];

    $allCategories = Category::all();
    foreach ($allCategories as $cat) {
        $products = Product::where('category_id', $cat->id)->where('is_visible', 1)->take(6)->get();

        $productsArray = $products->map(function ($p) {
            $img = $p->images()->first();
            $imageUrl = $img ? asset($img->path) : asset('images/sample-product.jpg');

            return [
                'name' => $p->title,
                'price' => 'Rp' . number_format($p->price, 0, ',', '.'),
                'desc' => $p->description,
                'image' => $imageUrl,
                'stock' => $p->stock,
            ];
        })->toArray();

        $categories[] = [
            'name' => $cat->name,
            // route as [name, param] so component can generate dynamic links
            'route' => ['menu.category', $cat->slug],
            'slug' => $cat->slug,
            'products' => $productsArray,
        ];
    }

    return view('welcome', compact('categories'));
});

// Dynamic category page: show all products for a given category slug
Route::get('/menu/{slug}', function ($slug) {
    $category = Category::where('slug', $slug)->firstOrFail();

    // Paginate 10 products per page
    $products = Product::where('category_id', $category->id)
        ->where('is_visible', 1)
        ->with('images')
        ->paginate(9);

    return view('menu.category', compact('category', 'products'));
})->name('menu.category');

Route::get('/menu', function () {
    return view('menu_product');
})->name('menu.products');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// Legacy static menu routes now redirect to dynamic category route
Route::get('/menu/buah', function () {
    return redirect()->route('menu.category', ['slug' => 'buah']);
})->name('menu.buah');

Route::get('/menu/bunga', function () {
    return redirect()->route('menu.category', ['slug' => 'bunga']);
})->name('menu.bunga');

Route::get('/menu/kayu', function () {
    return redirect()->route('menu.category', ['slug' => 'kayu']);
})->name('menu.kayu');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('profile', [DashboardController::class, 'profile'])->name('profile');

Route::prefix('farmer')->name('farmer.')->group(function () {
    Route::middleware(['auth', \App\Http\Middleware\FarmerOnly::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('products', ProductController::class)->names('products');
        Route::patch('products/{product}/toggle-visibility', [ProductController::class, 'toggleVisibility'])->name('products.toggle-visibility');

        // Inquiries (Inbox)
        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/create', [InquiryController::class, 'create'])->name('inquiries.create');
        Route::post('inquiries', [InquiryController::class, 'store'])->name('inquiries.store');
        Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::get('inquiries/{inquiry}/edit', [InquiryController::class, 'edit'])->name('inquiries.edit');
    Route::patch('inquiries/{inquiry}', [InquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
        Route::patch('inquiries/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('inquiries.status');
        Route::post('inquiries/{inquiry}/reply', [InquiryController::class, 'reply'])->name('inquiries.reply');
        Route::get('inquiries-export', [InquiryController::class, 'export'])->name('inquiries.export');
    });
});
