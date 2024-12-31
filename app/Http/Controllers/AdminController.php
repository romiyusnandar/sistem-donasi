<?php

namespace App\Http\Controllers;

use App\Models\CampaignModel;
use App\Models\DonationModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  function index()
  {

    $totalUser = UserModel::count();
    $totalCampaign = CampaignModel::count();
    $recentDonations = DonationModel::with(['campaign', 'user'])->latest()->take(5)->get();

    return view('pointakses/admin/index', [
      'totalUser' => $totalUser,
      'totalCampaign' => $totalCampaign,
      'recentDonations' => $recentDonations
      ]  );
  }
}
