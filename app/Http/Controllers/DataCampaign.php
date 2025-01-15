<?php

namespace App\Http\Controllers;

use App\Models\CampaignModel;
use App\Models\DonationModel;
use Illuminate\Http\Request;

class DataCampaign extends Controller
{
  function index()
  {
      $data = CampaignModel::with('donations')
          ->get()
          ->map(function ($campaign) {
              $campaign->collected_amount = $campaign->donations->sum('amount');
              return $campaign;
          });

      return view('data_campaign.index', ['campaigns' => $data]);
  }


    function create()
    {
        return view('data_campaign.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|file',
            'target_amount' => 'required|numeric',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $gambar_file = $request->file('image');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/campaign'), $nama_gambar);

        $infoCampaign = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $nama_gambar,
            'target_amount' => $request->target_amount,
            'collected_amount' => 0,
            'status' => $request->status,
            'created_by' => auth()->user()->id,
        ];

        CampaignModel::create($infoCampaign);

        return redirect()->route('datacampaign')->with('success', 'Data kampanye berhasil ditambahkan');
    }

  public function show($id)
  {
      $campaign = CampaignModel::findOrFail($id);
      $donations = DonationModel::with('user')
      ->orderBy('created_at', 'DESC')
      ->get();

      return view('data_campaign.show', compact('campaign', 'donations'));
  }


    function edit($id)
    {
      $campaign = CampaignModel::find($id);
      if (!$campaign) {
          return redirect()->route('datacampaign')->withErrors(['Kampanye tidak ditemukan.']);
      }

      return view('data_campaign.edit', ['campaign' => $campaign]);
    }

    function update(Request $request, $id)
    {
        $campaign = CampaignModel::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'status' => 'required|in:aktif,tidak_aktif',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->target_amount = $request->target_amount;
        $campaign->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('picture/campaign'), $filename);
            $campaign->image = $filename;
        }

        $campaign->save();

        return redirect()->route('datacampaign')->with('success', 'Kampanye berhasil diperbarui.');
    }


    function delete(Request $request)
    {
      CampaignModel::where('id', $request->id)->delete();
      return redirect()->route('datacampaign')->with('success', 'Data kampanye berhasil dihapus');
    }
}
