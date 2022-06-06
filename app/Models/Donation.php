<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

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
