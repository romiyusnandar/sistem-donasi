<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationModel extends Model
{
    use HasFactory;

    public $table = 'donations';
    public $fillable = [
      'user_id',
      'user_id',
      'campaign_id',
      'amount',
      'note',
      'status',
    ];

    function campaign()
    {
      return $this->belongsTo(CampaignModel::class, 'campaign_id', 'id');
    }

    function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

}
