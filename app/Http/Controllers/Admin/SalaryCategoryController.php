<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SalaryCategory;

class SalaryCategoryController extends Controller
{
  public function all()
  {
    $data = SalaryCategory::all();
    return view('admin.salcat.all', ['salcats' => $data]);
  }

  public function create()
  {
    return view('admin.salcat.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'salary_category_name' => 'required',
    ]);
    $data = [
      'salary_category_name' => $request->salary_category_name,
    ];
    // dd($data);
    $salcat = SalaryCategory::create($data);
    return redirect()->route('admin.salcat.all');
  }

  public function edit($id)
  {
    $salcat = SalaryCategory::find($id);
    return view('admin.salcat.edit', compact('salcat'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'salary_category_name' => 'required',
    ]);
    $data = $request->all();
    $salcat = SalaryCategory::find($id);
    $salcat->update($data);
    return redirect()->route('admin.salcat.all');
  }

  public function delete($id)
  {
    $salcat = SalaryCategory::find($id);
    $salcat->delete();
    return redirect()->route('admin.salcat.all');
  }
}
