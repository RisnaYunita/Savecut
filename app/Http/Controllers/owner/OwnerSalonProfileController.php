<?php
namespace App\Http\Controllers\owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salon;
use Session;

class OwnerSalonProfileController extends Controller
{
  public function index()
  {
    $salon = Salon::first();
    return view('content.owner.salon-profile', compact('salon'));
  }
  public function editProfile(Request $request, $salon_id)
  {
    // Fetch the salon record to edit
    $salon = Salon::where('salon_id', $salon_id)->firstOrFail();

    // Validate incoming request data
    $request->validate([
      'salon_name' => 'required|string|max:255',
      'salon_location' => 'required|string|max:255',
      'salon_phone' => 'required|string|max:20',
      'salon_description' => 'required|string|max:255',
      'salon_image' => 'image|mimes:jpeg,png,gif|max:2048',
      // Add additional validation rules as needed
    ]);

    // Update salon data
    $salon->salon_name = $request->salon_name;
    $salon->salon_location = $request->salon_location;
    $salon->salon_phone = $request->salon_phone;
    $salon->salon_description = $request->salon_description;

    // Check if a new image is uploaded
    if ($request->hasFile('salon_image')) {
      $imagePath = $request->file('salon_image')->store('public/assets/img/salon_profile');
      $imagePath = str_replace('public/', '', $imagePath);
      $salon->salon_image = $imagePath;
    }

    // Save the updated salon data
    $salon->save();

    // Flash success message and redirect back
    Session::flash('success', 'Salon profile successfully updated');
    return back();
  }
}
