<?php

namespace Ado\Shopify\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('shopify::embedded.dashboard');
    }
}