<?php

namespace Ado\Shopify\Http\Controllers;

class ExpiredSessionsController extends Controller
{
    public function index()
    {
        return view('carter::embedded.expired-session');
    }
}