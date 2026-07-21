<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $siteSettings = Setting::current();

        // Accept multi-category filter via `categories` array or comma-separated string `category`
        $rawCategories = $request->input('categories', $request->input('category'));
        if (is_string($rawCategories)) {
            $selectedCategories = array_filter(explode(',', $rawCategories));
        } elseif (is_array($rawCategories)) {
            $selectedCategories = array_filter($rawCategories);
        } else {
            $selectedCategories = [];
        }

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

        if (!empty($selectedCategories)) {
            $query->whereHas('category', function ($q) use ($selectedCategories) {
                $q->whereIn('slug', $selectedCategories);
            });
        }

        $products = $query->orderByRaw('sort_order IS NULL, sort_order ASC')->orderBy('created_at', 'desc')->get();

        return view('catalog.index', [
            'categories' => $categories,
            'products' => $products,
            'selectedCategories' => array_values($selectedCategories),
            'currentCategory' => count($selectedCategories) === 1 ? reset($selectedCategories) : null,
            'search' => $search,
            'siteSettings' => $siteSettings,
        ]);
    }
}
