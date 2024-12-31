<?php

namespace App\Http\Controllers;
use App\Models\CampaignModel;

class UserController extends Controller
{
  function index()
  {
    $data = CampaignModel::with('donations')
          ->get()
          ->map(function ($campaign) {
              $campaign->collected_amount = $campaign->donations->sum('amount');
              return $campaign;
          });

    return view('halaman_depan/index', ['campaigns' => $data]);
  }
}
