<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovmentNNonGovmentCollection extends Model
{
    use HasFactory;

    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'gov.n.gov.collection.view';
    }

    public function setEditRouteAttribute()
    {
        return 'gov.n.gov.collection.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'gov.n.gov.collection.delete';
    }
}
