<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search_categories = Category::get();

        $packages = Service::query();
        $packages->where('type', 'package');

        if($request->filled('q')){
            $packages->where('title', 'like', '%'.$request->q.'%')
                ->orWhere('description', 'like', '%'.$request->q.'%');
        }

        if($request->filled('category')){
            $packages->where('category_id', $request->category);
        }

        $packages = $packages->with('category','createdBy','features')
            ->paginate(10);

        return view('search', compact('search_categories', 'packages'));

    }
}
