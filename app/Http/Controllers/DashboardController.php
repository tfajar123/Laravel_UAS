<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tab;
use App\Models\Guitar;
use App\Http\Middleware\CheckRole;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['tab', 'guitar', 'user']);
    }

    public function tab(){
        return view('auth.tab', [
            'tabs' => Tab::latest()->paginate(10)
        ]);
    }
    public function guitar(){
        return view('auth.guitar', [
            'guitars' => Guitar::latest()->paginate(10)
        ]);
    }
    public function user(){
        return view('auth.user', [
            'users' => User::latest()->paginate(10)
        ]);
    }
}
