<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopNHouseRent extends Model
{
    use HasFactory;

    protected $fillable = [
      'nid',
      'month',
      'amount',
      'address',
      'house_no',
      'mobile_no',
      'donar_name',
      'cost_status',
      'description',
      'rent_category',
      'issue_date',
    ];

    protected $appends = ['view_route', 'edit_route', 'delete_route'];

    public function setViewRouteAttribute()
    {
      return 'shop.n.house.view';
    }

    public function setEditRouteAttribute()
    {
        return 'shop.n.house.edit';
    }

    public function setDeleteRouteAttribute()
    {
        return 'shop.n.house.delete';
    }
}
