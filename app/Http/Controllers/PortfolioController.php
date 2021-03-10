<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function portfolio()
    {
        $title = 'Portfolio';
        return view('portfolio.portfolio', compact('title'));
    }
}
