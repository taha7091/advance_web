<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function showDashboard()
    {
        return view('client.dashboard');
    }
}
