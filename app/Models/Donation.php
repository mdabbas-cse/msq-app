<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
      'month',
      'amount',
      'address',
      'mobile_no',
      'issue_date',
      'donar_name',
      'cost_status',
      'description',
    ];

    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'donation.view';
    }

    public function setEditRouteAttribute()
    {
        return 'donation.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'donation.delete';
    }
}
