<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars =Cars::with('user')->latest()->paginate(12);
        return view('cars',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|alpha',
            'model' => 'required',
            'year' => 'required|date_format:Y',
            'details' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        $imageName = time() . '.' . $validatedData['image']->extension();
        $validatedData['image']->StoreAs('public/image', $imageName);
        $validatedData['image'] = $imageName;

        Cars::create([
            'company' => $validatedData['company'],
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'details' => $validatedData['details'],
            'price' => $validatedData['price'],
            'image' => $imageName,
            'user_id' => auth()->id()
        ]);

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars ,$id)
    {
        $productes = Cars::with('user')->findOrFail($id);
        $comments = Comments::with('user')->where('car_id', $id)->get();
        return view('carDetails',compact(['productes','comments']));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $editMedicine = Cars::findOrFail($id);

        $Medicine = $request->validate([
            'company' => 'required|alpha',
            'model' => 'required',
            'year' => 'required|date_format:Y',
            'details' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if ($request->hasFile('image')) {
            // Get the uploaded file
            $uploadedImage = $request->file('image');

            // Generate a unique filename for the image
            $imageName = time() . '.' . $uploadedImage->extension();

            // Store the image in the public/imagepharmacy directory
            $uploadedImage->storeAs('public/image', $imageName);

            // Delete the previous image if it exists
            if ($editMedicine->image) {
                Storage::delete('public/image/' . $editMedicine->image);
            }

            // Update the 'image' field in the $Medicine array
            $Medicine['image'] = $imageName;
        }

        // Update the pharmacy request with the validated data
        $editMedicine->update([
            'company' => $Medicine['company'],
            'model' => $Medicine['model'],
            'year' => $Medicine['year'],
            'details' => $Medicine['details'],
            'price' => $Medicine['price'],
            'image' => $Medicine['image'] ?? $editMedicine->image,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cars::findOrFail($id)->delete();
        return back();
    }
}
