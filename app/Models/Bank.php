<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  use HasFactory;

  protected $fillable = [
    'bank_name',
    'account_name',
    'account_no',
    'check_no',
    'amount',
    'issue_date',
    'cost_status',
    'description',
  ];

  protected $appends = ['view_route', 'edit_route', 'delete_route'];

  public function setViewRouteAttribute()
  {
    return 'bank.view';
  }

  public function setEditRouteAttribute()
  {
    return 'admin.bank.edit';
  }

  public function setDeleteRouteAttribute()
  {
    return 'admin.bank.delete';
  }
}
