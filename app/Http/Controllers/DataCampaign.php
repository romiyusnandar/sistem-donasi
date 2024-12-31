<?php

namespace App\Http\Controllers;

use App\Models\CampaignModel;
use Illuminate\Http\Request;

class DataCampaign extends Controller
{
    function index()
    {
      $data = CampaignModel::all();
      return view('data_campaign.index', ['campaigns' => $data] );
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
            'image' => 'required|image|mimes:jpeg,png,jpg|file',
            'target_amount' => 'required',
            'collected_amount' => 'required',
            'status' => 'required',
            'created_by' => 'required',
        ], [
            'title.required' => 'Judul campaign harus diisi',
            'description.required' => 'Deskripsi campaign harus diisi',
            'image.required' => 'Gambar campaign harus diisi',
            'image.image' => 'File yang diupload harus gambar',
            'image.mimes' => 'Format gambar yang diperbolehkan hanya JPEG, PNG, dan JPG',
            'image.file' => 'File yang diupload harus berupa gambar',
            'target_amount.required' => 'Target donasi harus diisi',
            'collected_amount.required' => 'Jumlah yang sudah dikumpulkan harus diisi',
            'status.required' => 'Status campaign harus diisi',
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
            'collected_amount' => $request->collected_amount,
            'status' => $request->status,
            'created_by' => auth()->user()->id,
        ];

        CampaignModel::create($infoCampaign);

        return redirect()->route('datacampaign')->with('success', 'Data campaign berhasil ditambahkan');
    }

    function edit($id)
    {
      $campaign = CampaignModel::find($id);
      if (!$campaign) {
          return redirect()->route('datacampaign')->withErrors(['Campaign tidak ditemukan.']);
      }

      return view('data_campaign.edit', ['campaign' => $campaign]);
    }

    function update(Request $request, $id)
    {
        $campaign = CampaignModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'collected_amount' => 'required|numeric',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional
        ]);

        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->target_amount = $request->target_amount;
        $campaign->collected_amount = $request->collected_amount;
        $campaign->status = $request->status;

        if ($request->hasFile('image')) {
          $file = $request->file('image');
          $filename = time() . '_' . $file->getClientOriginalName();
          $file->move(public_path('picture/campaign'), $filename);
          $campaign->gambar = $filename;
      }

        $campaign->save();

        return redirect()->route('datacampaign')->with('success', 'Campaign berhasil diperbarui.');
    }

    function delete(Request $request)
    {
      CampaignModel::where('id', $request->id)->delete();
      return redirect()->route('datacampaign')->with('success', 'Data campaign berhasil dihapus');
    }
}
