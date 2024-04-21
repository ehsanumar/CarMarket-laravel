<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function guests(){
        $guests = User::with('roles')->role('guest')->latest()->get();
        return  view('guests',compact('guests'));
    }
    public function seller(){
        $seller = User::with('roles')->role('seller')->latest()->get();
        return  view('seller',compact('seller'));
    }
    public function buyer(){
        $buyer = User::with('roles')->role('buyer')->latest()->get();
        return  view('buyer',compact('buyer'));
    }
    public function cars(){
        $seller = Cars::latest()->get();
        return  view('seller',compact('seller'));
    }

    public function updateRole(Request $request, string $id)
    {
        $userRoleUpdate = User::findOrFail($id);
        $userRoleUpdate->syncRoles($request['role']);
        return back();
    }

    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return back();
    }
}
