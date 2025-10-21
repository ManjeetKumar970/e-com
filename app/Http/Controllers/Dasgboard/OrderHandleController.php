<?php

namespace App\Http\Controllers\Dasgboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderHandleController extends Controller
{
    public function orderview(){

        return view('dashboard.pages.order');
    }
}
