<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    public function index()
    {
        $provider = auth('provider')->user();

        $categories = Category::whereHas('packages', function ($query) use ($provider) {
            $query->where('provider_id', $provider->id);
        })
        ->withCount(['packages' => function ($query) use ($provider) {
            $query->where('provider_id', $provider->id);
        }])
        ->with(['packages' => function ($query) use ($provider) {
            $query->where('provider_id', $provider->id)->with('files');
        }])
        ->get();

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
        // Update validation rules to handle services with names, costs, and optional images
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'files' => 'required|array',
            'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,doc',
            'service_name' => 'required|array|min:1', // Ensure at least one service is added
            'service_name.*' => 'required|string|max:255',
            'service_cost' => 'required|array|min:1',
            'service_cost.*' => 'required|numeric',
            'service_image.*' => 'nullable|file|mimes:jpg,jpeg,png|max:2048' // Optional image for each service
        ]);

        // Get authenticated provider
        $provider = auth('provider')->user();

        // Create the package with basic details
        $package = $provider->packages()->create($request->only(['name', 'description', 'cost', 'category_id']));

        // Handle package files
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('uploads/packages', 'public');
                $package->files()->create(['path' => $path, 'name' => $file->getClientOriginalName()]);
            }
        }

        // Add services to the package
        $serviceNames = $request->input('service_name');
        $serviceCosts = $request->input('service_cost');
        $serviceImages = $request->file('service_image', []);

        foreach ($serviceNames as $index => $serviceName) {
            $serviceCost = $serviceCosts[$index];
            $serviceData = [
                'name' => $serviceName,
                'cost' => $serviceCost,
            ];

            // Handle optional service image
            if (isset($serviceImages[$index]) && $serviceImages[$index]->isValid()) {
                $serviceData['image_path'] = $serviceImages[$index]->store('uploads/service_images', 'public');
            }

            $serviceData['provider_id'] = $provider->id;

            // Create the service for the package
            $package->services()->create($serviceData);
        }

        // Redirect with success message
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
