<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ShopNHouseRent;
use App\Http\Controllers\Controller;

class ShopNHouseRentController extends Controller
{
  public function indexDebit()
  {
    $create = 1;
    $data = ShopNHouseRent::where('cost_status', 1)->get();
    return view('admin.snhrent.all', ['snhrents' => $data, 'create' => $create]);
  }
  public function indexCredit()
  {
    $create = 2;
    $data = ShopNHouseRent::where('cost_status', 2)->get();
    return view('admin.snhrent.all', ['snhrents' => $data, 'create' => $create]);
  }

  public function create($id)
  {
    $coststatus = $id;
    return view('admin.snhrent.create', compact('coststatus'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $request->validate([
      'nid' => 'required|numeric',
      'month' => 'required|date',
      'amount' => 'required|numeric',
      'house_no' => 'required|numeric',
      'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'issue_date' => 'required|date',
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
    if ($request->cost_status == 1) {
      return redirect()->route('admin.snhrent.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.snhrent.all.credit');
    }
  }

  public function edit($id, $cost_status)
  {
    $coststatus = $cost_status;
    $snhrent = ShopNHouseRent::find($id);
    return view('admin.snhrent.edit', compact('snhrent', 'coststatus'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'nid' => 'required|numeric',
      'month' => 'required|date',
      'amount' => 'required|numeric',
      'house_no' => 'required|numeric',
      'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
      'issue_date' => 'required|date',
      'cost_status' => 'required',
      'rent_category' => 'required',
    ]);
    $data = $request->all();
    $snhrent = ShopNHouseRent::find($id);
    $snhrent->update($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.snhrent.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.snhrent.all.credit');
    }
  }

  public function delete($id, $cost_status)
  {
    $snhrent = ShopNHouseRent::find($id);
    $snhrent->delete();
    if ($cost_status == 1) {
      return redirect()->route('admin.snhrent.all.debit');
    } elseif ($cost_status == 2) {
      return redirect()->route('admin.snhrent.all.credit');
    }
  }
}
