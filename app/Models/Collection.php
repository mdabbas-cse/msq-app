<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;


    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'collection.view';
    }

    public function setEditRouteAttribute()
    {
        return 'collection.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'collection.delete';
    }
}
