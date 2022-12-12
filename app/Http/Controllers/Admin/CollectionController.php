<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
  public function indexDebit()
  {
    $create = 1;
    $data = Collection::where('cost_status', 1)->get();
    return view('admin.collection.all', ['collections' => $data, 'create' => $create]);
  }
  public function indexCredit()
  {
    $create = 2;
    $data = Collection::where('cost_status', 2)->get();
    return view('admin.collection.all', ['collections' => $data, 'create' => $create]);
  }

  public function create($id)
  {
    $coststatus = $id;
    return view('admin.collection.create', compact('coststatus'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'collection_category' => 'required',
    ]);
    $data = [
      'amount' => $request->amount,
      'cost_status' => $request->cost_status,
      'description' => $request->description,
      'collection_category' => $request->collection_category,
      'month' => Carbon::parse($request->month)->format('Y-m-d'),
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),

    ];
    $collection = Collection::create($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.collection.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.collection.all.credit');
    }
  }

  public function edit($id, $cost_status)
  {
    $coststatus = $cost_status;
    $collection = Collection::find($id);
    return view('admin.collection.edit', compact('collection', 'coststatus'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'collection_category' => 'required',
    ]);
    $data = $request->all();
    $collection = Collection::find($id);
    $collection->update($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.collection.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.collection.all.credit');
    }
  }

  public function delete($id, $cost_status)
  {
    $collection = Collection::find($id);
    $collection->delete();
    if ($cost_status == 1) {
      return redirect()->route('admin.collection.all.debit');
    } elseif ($cost_status == 2) {
      return redirect()->route('admin.collection.all.credit');
    }
  }
}
