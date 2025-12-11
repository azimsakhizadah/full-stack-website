<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $categories = PortfolioCategory::all();
        return view('admin.backend.portfolio_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.backend.portfolio_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PortfolioCategory::create($request->all());

        return redirect()->route('portfolio-categories.index')->with('success', 'Category Added');
    }

    public function edit(PortfolioCategory $portfolio_category)
    {
        return view('admin.backend.portfolio_categories.edit', compact('portfolio_category'));
    }

    public function update(Request $request, PortfolioCategory $portfolio_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $portfolio_category->update($request->all());

        return redirect()->route('portfolio-categories.index')->with('success', 'Category Updated');
    }

    public function destroy(PortfolioCategory $portfolio_category)
    {
        $portfolio_category->delete();
        return redirect()->route('portfolio-categories.index')->with('success', 'Category Deleted');
    }
}
