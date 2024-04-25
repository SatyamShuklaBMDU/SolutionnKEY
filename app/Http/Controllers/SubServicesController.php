<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class SubServicesController extends Controller
{
    public function index()
    {
        $services = SubService::all();
        return view('admin.all_subservices',compact('services'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'services' => 'required|exists:services,id',
            'services_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('services/images'), $imageName);
            $imagePath = 'services/images/' . $imageName;
        }

        // Create and save the new SubService instance
        $subService = new SubService();
        $subService->services_id = $validatedData['services'];
        $subService->name = $validatedData['services_name'];
        $subService->description = $validatedData['description'];
        $subService->image = $imagePath;
        $subService->save();

        // Redirect back with a success message
        return redirect()->route('sub-service')->with('success', 'Sub service created successfully.');
    }

    public function create()
    {
        $services = Service::all();
        return view('admin.add_subservices',compact('services'));
    }

    public function edit($id){
        $service = SubService::find($id);
        // dd($id);
        return response()->json($service);
    }
}
