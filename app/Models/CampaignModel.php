<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignModel extends Model
{
    use HasFactory;
    public $table = 'campaigns';
    public $fillable = [
      'title',
      'description',
      'image',
      'target_amount',
      'collected_amount',
      'status',
      'created_by'
  ];

  function donations()
  {
    return $this->hasMany(DonationModel::class, 'campaign_id', 'id');
  }
}
