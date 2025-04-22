<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BkashController extends Controller
{
    public function index()
    {
        return view('BackEnd.bkash.index');
    }
}
