<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index()
    {
        $provider = auth('provider')->user();

        $categories = Category::whereHas('packages', function($query) use ($provider) {
            $query->where('provider_id', $provider->id);
        })->with(['packages' => function($query) use ($provider) {
            $query->where('provider_id', $provider->id)
            ->with('files');
        }])->get();


        return view('provider-panel.packages.index', compact('categories'));
    }

    public function show(Category $category, $package)
    {
        $provider = auth('provider')->user();

        $package = $provider->packages()->where('id', $package)->with('files')->first();

        return view('provider-panel.packages.show', compact('package'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('provider-panel.packages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'services' => 'required',
            'files' => 'required|array',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,doc',
        ]);
    
        $provider = auth('provider')->user();
    
        $package = $provider->packages()->create($request->only(['name', 'description', 'cost', 'category_id']));
    
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads/packages', 'public');
                $package->files()->create(['path' => $path, 'name' => $path]);
            }
        }
    
        return redirect()->route('provider-panel.packages.index')->with('success', 'Package created successfully.');
    }
    

    public function edit(Category $category, $package)
    {
        $provider = auth('provider')->user();

        $categories = Category::all();

        $package = $provider->packages()->where('id', $package)->with('files')->first();

        return view('provider-panel.packages.edit', compact('package' , 'categories'));
    }

    public function update(Request $request, Category $category, $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        $provider = auth('provider')->user();

        $package = $provider->packages()->where('id', $package)->first();

        $package->update($request->all());

        return redirect()->route('provider-panel.packages.index');
    }

    public function destroy(Category $category, $package)
    {
        $provider = auth('provider')->user();

        $package = $provider->packages()->where('id', $package)->first();

        $package->delete();

        return redirect()->route('provider-panel.packages.index');
    }
}
