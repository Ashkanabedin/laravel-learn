<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function view(home $home)
  {
      return view ('home');
  }
}
