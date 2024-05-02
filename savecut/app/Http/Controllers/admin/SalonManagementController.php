<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salon;
use Session;

class SalonManagementController extends Controller
{
  public function index()
  {
    $salon = Salon::all();
    return view('content.admin.salonlist', compact('salon'));
  }
  public function store(Request $request)
  {
    // Validate incoming request data
    $request->validate([
      'salon_name' => 'required|string|max:255',
      'salon_location' => 'required|string|max:255',
      'salon_phone' => 'required|string|max:20',
      // Add additional validation rules as needed
    ]);

    // Create a new salon instance
    $salon = new Salon();
    $salon->salon_name = $request->salon_name;
    $salon->salon_location = $request->salon_location;
    $salon->salon_phone = $request->salon_phone;
    // Add additional fields as needed

    // Save the salon to the database
    $salon->save();

    // Optionally, you can return a response indicating success
    Session::flash('success', 'Salon named ' . $salon->salon_name . ' successfully added');
    return back();
  }
  public function editSalon(Request $request, $salon_id)
  {
    $salon = Salon::where('salon_id', '=', '$salon_id')->first();
    // Validate incoming request data
    $request->validate([
      'salon_name' => 'required|string|max:255',
      'salon_location' => 'required|string|max:255',
      'salon_phone' => 'required|string|max:20',
      // Add additional validation rules as needed
    ]);

    // Update salon data
    $salon_id = $request->salon_id;
    $salon_name = $request->salon_name;
    $salon_location = $request->salon_location;
    $salon_phone = $request->salon_phone;
    // Add additional fields as needed

    $salon = Salon::where('salon_id', '=', $salon_id)->update([
      'salon_name' => $salon_name,
      'salon_location' => $salon_location,
      'salon_phone' => $salon_phone,
    ]);
    Session::flash('success', 'Salon named ' . $salon_name . ' successfully updated');
    return back();
    // Save the updated salon data
  }
  public function destroy($salon_id)
  {
    $salon = Salon::find($salon_id);
    if (!$salon) {
      return back()->with('error', 'Salon not found.');
    }

    $salon->delete();

    Session::flash('success', 'Salon named ' . $salon->salon_name . ' successfully deleted');
    return back();
  }
}
