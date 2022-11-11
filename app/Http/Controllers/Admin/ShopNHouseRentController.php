<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ShopNHouseRent;
use App\Http\Controllers\Controller;

class ShopNHouseRentController extends Controller
{
  public function all()
  {
    $data = ShopNHouseRent::all();
    return view('admin.snhrent.all', ['snhrents' => $data]);
  }

  public function create()
  {
    return view('admin.snhrent.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'nid' => 'required',
      'month' => 'required',
      'amount' => 'required',
      'house_no' => 'required',
      'mobile_no' => 'required',
      'issue_date' => 'required',
      'description' => 'required',
      'cost_status' => 'required',
      'rent_category' => 'required',
    ]);
    $data = [
      'nid' => $request->nid,
      'amount' => $request->amount,
      'address' => $request->address,
      'house_no' => $request->house_no,
      'mobile_no' => $request->mobile_no,
      'donar_name' => $request->donar_name,
      'cost_status' => $request->cost_status,
      'description' => $request->description,
      'rent_category' => $request->rent_category,
      'month' => Carbon::parse($request->month)->format('Y-m-d'),
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),

    ];
    $snhrent = ShopNHouseRent::create($data);
    return redirect()->route('admin.snhrent.all');
  }

  public function edit($id)
  {
    $snhrent = ShopNHouseRent::find($id);
    return view('admin.snhrent.edit', compact('snhrent'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $snhrent = ShopNHouseRent::find($id);
    $snhrent->update($data);
    return redirect()->route('admin.snhrent.all');
  }

  public function delete($id)
  {
    $snhrent = ShopNHouseRent::find($id);
    $snhrent->delete();
    return redirect()->route('admin.snhrent.all');
  }
}
