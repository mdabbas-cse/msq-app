<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiscellaneousCost extends Model
{
    use HasFactory;

    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'miscenus.cost.view';
    }

    public function setEditRouteAttribute()
    {
        return 'miscenus.cost.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'miscenus.cost.delete';
    }
}
