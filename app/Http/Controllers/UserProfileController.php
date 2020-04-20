<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class UserProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        if ($request->file('avatar')) {

            Storage::delete($request->user()->avatar);

            $avatar = $request->file('avatar')->store('avatars');

            $request->user()->update([
                'avatar' => $avatar
            ]);
            return redirect()->back()->with('info', 'Image uploaded successfully');
        } else {
            return redirect()->back()->with('danger', 'Image upload failed');
        }
    }

    public function destroy(Request $request)
    {
        if ($request->user()->avatar) {
            Storage::delete($request->user()->avatar);

            $request->user()->update([
                'avatar' => null
            ]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
