<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.view_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateduser = $request->validate([
            'name' => 'required',
            'email' => 'required : unique:users',
        ]);
        // $image = $request->file('image')->store('profile-photos');
        $user = new User();
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->profile_photo_path = $image;
        $user->save();
        if ($user instanceof Model) {
            toastr()->success('User has been saved successfully!');


            return redirect()->route('user.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('user.edituser', compact('users'));
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
        $user = User::find($id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->profile_photo_path = $image;
        $user->save();
        if ($user instanceof Model) {
            toastr()->success('User updated successfully!');

            return redirect()->route('user.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        if ($users instanceof Model) {
            toastr()->success('User deleted successfully!');

            return redirect()->route('user.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}