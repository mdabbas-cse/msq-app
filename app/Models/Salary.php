<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
      'month',
      'amount',
      'issue_date',
      'description',
      'cost_status',
      'salary_category_id',
    ];

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
