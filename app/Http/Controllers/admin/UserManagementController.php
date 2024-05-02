<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserManagementController extends Controller
{
  public function index()
  {
    $user = User::all();
    return view('content.admin.userlist', compact('user'));
  }
  public function updateRole(Request $request, $id)
  {
    // Validate the incoming request data
    $validatedData = $request->validate([
      'role' => 'required|in:0,1,2',
    ]);

    try {
      // Find the user by ID
      $user = User::find($id);

      if (Auth::user()->user_id == $id) {
        return redirect()
          ->back()
          ->with('error', 'You are not allowed to edit yourself.');
      }

      // Update the user's role directly in the database
      User::where('user_id', $id)->update(['role' => $validatedData['role']]);

      // Return a response indicating success
      return redirect()
        ->route('user-list')
        ->with('success', 'User role ' . $user->name . ' updated successfully');
    } catch (\Exception $e) {
      // Handle exceptions
      return redirect()
        ->route('user-list')
        ->with('error', 'Failed to update user role. Please try again.');
    }
  }
  public function destroy($id)
  {
    $user = User::find($id);
    if (!$user) {
      return back()->with('error', 'User not found.');
    }
    if (Auth::user()->user_id == $id) {
      Session::flash('error', 'You are not allowed to delete yourself.');
      return back();
    }

    $user->delete();

    Session::flash('success', 'User named ' . $user->name . ' successfully deleted');
    return back();
  }
}
