<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function upgrade($id)
    {
        $user = User::find($id);
        $user->removeRole('User');
        $user->assignRole('Admin');
        return redirect('/admins-list');
    }
    public function downgrade($id)
    {
        $user = User::find($id);
        $user->removeRole('Admin');
        $user->assignRole('User');
        return redirect('/users-list');
    }
    
}
