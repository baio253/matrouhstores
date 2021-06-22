<?php

namespace App\Http\Controllers;

use App\Product;
use App\Role;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('control');
        return view('home');
    }

    public function show()
    {

        return view('users.show');
    }

    public function update()
    {
        $user = User::find(request('id'));
        $photo = request()->file('photo');
        $filename = '/images/users/' . time() . '.' . $photo->getClientOriginalExtension();
        Image::make($photo)->save(public_path($filename));
        $user->photo = $filename;
        $user->update();
        return redirect('/profile');
    }

    public function assign()
    {
        request()->validate([
            'assignRole' => 'required',
            'assignUser' => 'required'
        ]);

        $user = User::find(\request('assignUser'));
        $role = Role::find(\request('assignRole'));
        $user->assignRole($role);
        return view('home', [
            'assignMessage' => 'Role Updated Successfully'
        ]);
    }

    public function reassign($user_id,$role_id)
    {

        $user = User::find($user_id);
        $role = Role::find($role_id);
        $user->reassignRole($role);
        return view('home',[
            'reassignMessage' => 'Role Deleted Successfully'
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
