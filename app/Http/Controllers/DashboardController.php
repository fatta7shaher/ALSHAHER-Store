<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller

{
    public function __construct()
    {
        // $this->middleware(['auth']);
    }

    public function index()
    {
        $title = 'Store';

        $user = Auth::user();

        return view('dashboard.index', [
            'user' => 'Abdulfattah',
            'title' => $title
        ]);
    }
}
