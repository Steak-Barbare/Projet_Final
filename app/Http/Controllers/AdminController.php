<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function delete(User $user)
    {
        $deletedUserName = $user->name; 
        $user->delete();
        return redirect()->route('admin.users')->with('success', "L'utilisateur $deletedUserName a été supprimé avec succès.");
    }

    public function approve(User $user)
    {
        $accesUserName = $user->name;
        $user->access = 1;
        $user->save();
        return redirect()->route('admin.users')->with('success', "L'utilisateur $accesUserName a été autorisé à accéder à l'application.");
    }
    public function makeAdmin(User $user)
{
    $userName = $user->name;
    $user->is_admin = 1; 
    $user->save();
    return redirect()->route('admin.users')->with('success', "L'utilisateur $userName a été autorisé en tant qu'administrateur.");
}
}
