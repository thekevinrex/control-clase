<?php

namespace App\Http\Controllers;

use App\Services\NavigationService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Navigation()
    {
        $navigationMap = (new NavigationService)->getNavigaitonMap();

        return view('dashboard', compact("navigationMap"));
    }
}
