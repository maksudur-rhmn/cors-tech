<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CreateAdminController extends Controller
{
   public function makeAdmin($id)
   {
     User::findOrFail($id)->update([
       'role' => 'admin',
     ]);
     return back()->withSuccess('User has been promoted to Admin and now can access the Admin dashboard');
   }

   public function revokeAdmin($id)
   {
     User::findOrFail($id)->update([
       'role' => 'student',
     ]);
     return back()->withDanger('Admin right has been revoked and now user cannot access the admin dashboard');

   }
}
