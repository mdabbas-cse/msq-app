<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MiscellaneousCost;
use App\Http\Controllers\Controller;
use App\Models\MiscellaneousCostCategoies;

class MiscellaneousCostController extends Controller
{
  public function indexDebit()
  {
    $create = 1;
    $categories = MiscellaneousCostCategoies::all();
    $data = MiscellaneousCost::where('cost_status', 1)->get();
    return view('admin.miscost.all', ['miscosts' => $data, 'create' => $create, 'categories' => $categories]);
  }
  public function indexOwbm()
  {
    $create = 1;
    $title = 1;
    $categories = MiscellaneousCostCategoies::all();
    $data = MiscellaneousCost::where('miscellaneous_cost_category_id', [1,2,3])->get();
    return view('admin.miscost.all', ['miscosts' => $data, 'create' => $create, 'categories' => $categories,'title'=>$title]);
  }
  public function indexBill()
  {
    $create = 1;
    $title = 2;
    $categories = MiscellaneousCostCategoies::all();
    $data = MiscellaneousCost::where('miscellaneous_cost_category_id', [4])->get();
    return view('admin.miscost.all', ['miscosts' => $data, 'create' => $create, 'categories' => $categories,'title'=>$title]);
  }
  public function indexDebtpay()
  {
    $create = 1;
    $title = 3;
    $categories = MiscellaneousCostCategoies::all();
    $data = MiscellaneousCost::where('miscellaneous_cost_category_id', [5])->get();
    return view('admin.miscost.all', ['miscosts' => $data, 'create' => $create, 'categories' => $categories,'title'=>$title]);
  }

  public function create($id)
  {
    $coststatus = $id;
    $categories = MiscellaneousCostCategoies::all();
    return view('admin.miscost.create', compact('coststatus','categories'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'description' => 'required',
      'miscellaneous_cost_category_id' => 'required',
    ]);
    $data = [
      'amount' => $request->amount,
      'cost_status' => $request->cost_status,
      'description' => $request->description,
      'miscellaneous_cost_category_id' => $request->miscellaneous_cost_category_id,
      'month' => Carbon::parse($request->month)->format('Y-m-d'),
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),
    ];
    $miscost = MiscellaneousCost::create($data);
      return redirect()->back();
  }

  public function edit($id, $cs)
  {
    $coststatus = $cs;
    $miscost = MiscellaneousCost::find($id);
    $categories = MiscellaneousCostCategoies::all();
    return view('admin.miscost.edit', compact('miscost', 'coststatus','categories'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'miscellaneous_cost_category_id' => 'required',
    ]);
    $data = $request->all();
    $miscost = MiscellaneousCost::find($id);
    $miscost->update($data);
    return redirect()->back();
  }

  public function delete($id, $cost_status)
  {
    $miscost = MiscellaneousCost::find($id);
    $miscost->delete();
    return redirect()->back();
  }
}
