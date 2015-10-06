<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return redirect('user/panel/');
    }

    public function getPanel() {

        $user = Auth::user();

        $roles = $user->roles;
        $deadlines = $user->deadlines;

        return view('user.panel', compact('roles', 'deadlines'));
    }

}
