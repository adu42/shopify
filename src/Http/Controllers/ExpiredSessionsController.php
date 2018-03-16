<?php

namespace Ado\Shopify\Http\Controllers;

class ExpiredSessionsController extends Controller
{
    public function index()
    {
        return view('shopify::embedded.expired-session');
    }
}