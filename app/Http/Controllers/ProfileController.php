<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'address'=>'required',
        //     'paragraph'=>'required',
        //     'name'=>'required'
        // ]);

        $user->name = $request->name;

        $user->save();

        if ($user->profile) {
            $user->profile()->update([
                'address' => $request->address,
                'biography' => $request->biography

            ]);
        } else {
            $user->profile()->create([
                'address' => $request->address,
                'biography' => $request->biography


            ]);
        }



        return redirect(route('dashboard.index'))->with('message','User successfuly updated');
    }
}
