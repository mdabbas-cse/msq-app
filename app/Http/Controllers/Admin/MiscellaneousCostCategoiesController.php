<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MiscellaneousCostCategoies;
use Illuminate\Http\Request;

class MiscellaneousCostCategoiesController extends Controller
{
  public function all()
  {
    $data = MiscellaneousCostCategoies::all();
    return view('admin.miscat.all', ['miscats' => $data]);
  }

  public function create()
  {
    return view('admin.miscat.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'category_name' => 'required',
    ]);
    $data = [
      'category_name' => $request->category_name,
    ];
    // dd($data);
    $miscat = MiscellaneousCostCategoies::create($data);
    return redirect()->route('admin.miscat.all');
  }

  public function edit($id)
  {
    $miscat = MiscellaneousCostCategoies::find($id);
    return view('admin.miscat.edit', compact('miscat'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'category_name' => 'required',
    ]);
    $data = $request->all();
    $miscat = MiscellaneousCostCategoies::find($id);
    $miscat->update($data);
    return redirect()->route('admin.miscat.all');
  }

  public function delete($id)
  {
    $miscat = MiscellaneousCostCategoies::find($id);
    $miscat->delete();
    return redirect()->route('admin.miscat.all');
  }
}
