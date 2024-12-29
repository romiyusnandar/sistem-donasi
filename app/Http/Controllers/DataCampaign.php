<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataCampaign extends Controller
{
    function index()
    {
      return view('data_user.index');
    }
}
