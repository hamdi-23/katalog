<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categorySlug = $request->input('category');

        // Fetch active categories
        $categories = Category::where('is_active', true)->orderBy('name')->get();

        // Query active products
        $query = Product::where('is_active', true)->with('category');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $products = $query->orderBy('created_at', 'desc')->get();

        return view('catalog.index', [
            'categories' => $categories,
            'products' => $products,
            'currentCategory' => $categorySlug,
            'search' => $search,
        ]);
    }
}
