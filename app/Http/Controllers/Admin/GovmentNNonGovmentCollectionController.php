<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GovmentNNonGovmentCollection;

class GovmentNNonGovmentCollectionController extends Controller
{
  public function all()
  {
    $data = GovmentNNonGovmentCollection::all();
    // dd($data);
    return view('admin.gngc.all', ['gngcs' => $data]);
  }

  public function create()
  {
    return view('admin.gngc.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'amount' => 'required',
      'cost_status' => 'required',
    ]);
    $data = [
      'amount' => $request->amount,
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),
      'cost_status' => $request->cost_status,
      'description' => $request->description,

    ];
    // dd($data);
    $gngc = GovmentNNonGovmentCollection::create($data);
    return redirect()->route('admin.gngc.all');
  }

  public function edit($id)
  {
    $gngc = GovmentNNonGovmentCollection::find($id);
    return view('admin.gngc.edit', compact('gngc'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $gngc = GovmentNNonGovmentCollection::find($id);
    $gngc->update($data);
    return redirect()->route('admin.gngc.all');
  }

  public function delete($id)
  {
    $gngc = GovmentNNonGovmentCollection::find($id);
    $gngc->delete();
    return redirect()->route('admin.gngc.all');
  }
}
