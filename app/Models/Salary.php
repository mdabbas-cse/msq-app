<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'salary.view';
    }

    public function setEditRouteAttribute()
    {
        return 'salary.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'salary.delete';
    }
}
