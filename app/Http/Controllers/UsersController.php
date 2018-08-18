<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin')->nest('create', 'users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate Form Input
        $this->validate(request(), [
            'name' => 'required|min:2',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'image' => 'image|nullable|max:1700',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:manager,sales',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Get the file name with the extension
            $fileNameWithExt = request()->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just EXT
            $extension = request()->file('image')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = request()->file('image')->storeAs('public/images/users', $fileNameToStore);
        } else {
            $fileNameToStore = 'user.jpg';
        }

        // Create The User
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'role' => request('role'),
            'image' => $fileNameToStore,
            'password' => Hash::make(request('password')),
        ]);

        return redirect('/users/'.$user->id)->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return $user->image;
        return view('pages.admin')->nest('show', 'users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin')->nest('create', 'users.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->image != 'user.jpg') {
            // Delete the image
            Storage::delete('public/images/users'.$user->image);
        }

        $user->delete();
        return redirect('/admin')->with('success', 'Amin Removed');
    }
}
