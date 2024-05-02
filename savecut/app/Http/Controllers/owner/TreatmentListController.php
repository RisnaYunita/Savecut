<?php
namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Session;

class TreatmentListController extends Controller
{
  public function index()
  {
    $treatment = Treatment::all();
    return view('content.owner.treatment-list-owner', compact('treatment'));
  }
  public function store(Request $request)
  {
    // Validate incoming request data
    $request->validate([
      'treatment_image' => 'image|mimes:jpeg,png,gif|max:2048',
      'treatment_name' => 'required|string|max:255',
      'treatment_price' => 'required|numeric',
      'treatment_description' => 'required|string|max:255',
    ]);

    // Handle treatment image upload
    $imagePath = null;
    if ($request->hasFile('treatment_image')) {
      $imagePath = $request->file('treatment_image')->store('public/assets/img/treatment_image');
      $imagePath = str_replace('public/', '', $imagePath);
    }

    // Create a new Treatment instance
    $treatment = new Treatment();
    $treatment->treatment_name = $request->treatment_name;
    $treatment->treatment_price = $request->treatment_price;
    $treatment->treatment_description = $request->treatment_description;
    $treatment->treatment_image = $imagePath; // Assign the treatment image

    // Save the treatment to the database
    $treatment->save();

    // Optionally, you can return a response indicating success
    Session::flash('success', 'Treatment named ' . $treatment->treatment_name . ' successfully added');
    return back();
  }
  public function editTreatment(Request $request, $treatment_id)
  {
    $treatment = Treatment::find($treatment_id);
    // Validate incoming request data
    $request->validate([
      'treatment_image' => 'image|mimes:jpeg,png,gif|max:2048',
      'treatment_name' => 'required|string|max:255',
      'treatment_price' => 'required|numeric',
      'treatment_description' => 'required|string',
    ]);
    $imagePath = $treatment->treatment_image;
    if ($request->hasFile('treatment_image')) {
      $imagePath = $request->file('treatment_image')->store('public/assets/img/treatment_image');
      $imagePath = str_replace('public/', '', $imagePath);
    }

    // Update treatment data
    $treatment->treatment_name = $request->treatment_name;
    $treatment->treatment_price = $request->treatment_price;
    $treatment->treatment_description = $request->treatment_description;
    $treatment->treatment_image = $imagePath; // Assign the treatment image
    // Add additional fields as needed
    $treatment->save();

    Session::flash('success', 'Treatment named ' . $treatment->treatment_name . ' successfully updated');
    return back();
    // Save the updated treatment data
  }
  public function destroy($treatment_id)
  {
    $treatment = Treatment::find($treatment_id);
    if (!$treatment) {
      return back()->with('error', 'Treatment not found.');
    }

    $treatment->delete();

    Session::flash('success', 'Treatment named ' . $treatment->treatment_name . ' successfully deleted');
    return back();
  }
}
