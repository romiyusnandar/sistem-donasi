<?php

namespace App\Http\Controllers;

use App\Models\DonationModel;
use App\Models\CampaignModel;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $campaigns = CampaignModel::all();

        $donations = DonationModel::with(['campaign'])
            ->where('user_id', auth()->id())
            ->when($request->campaign_id, function ($query, $campaignId) {
                return $query->where('campaign_id', $campaignId);
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('halaman_depan.donation.index', compact('donations', 'campaigns'));
    }

    public function create($campaign_id)
    {
        $campaign = CampaignModel::findOrFail($campaign_id);
        return view('halaman_depan.donation.create', compact('campaign'));
    }

    public function store(Request $request, $campaign_id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'note' => 'nullable|string|max:255'
        ], [
            'amount.required' => 'Jumlah donasi harus diisi',
            'amount.numeric' => 'Jumlah donasi harus berupa angka',
            'amount.min' => 'Minimal donasi Rp 1.000'
        ]);

        $donation = new DonationModel();
        $donation->user_id = auth()->id();
        $donation->campaign_id = $campaign_id;
        $donation->amount = $request->amount;
        $donation->note = $request->note;
        $donation->status = 'berhasil';
        $donation->save();

        // Update collected amount di campaign
        $campaign = CampaignModel::find($campaign_id);
        $campaign->collected_amount += $request->amount;
        $campaign->save();

        return redirect()->route('donations.index')->with('success', 'Donasi berhasil dilakukan');
    }

    public function show($id)
    {
        $donation = DonationModel::with(['campaign', 'user'])
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('halaman_depan.donation.show', compact('donation'));
    }
}
