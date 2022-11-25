<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalaryCategory;

class SalaryController extends Controller
{
  public function indexDebit()
  {
    $create = 1;
    $categories = SalaryCategory::all();
    $data = Salary::where('cost_status', 1)->get();
    return view('admin.salary.all', ['salaries' => $data, 'create' => $create, 'categories' => $categories]);
  }
  public function indexCredit()
  {
    $create = 2;
    $categories = SalaryCategory::all();
    $data = Salary::where('cost_status', 2)->get();
    return view('admin.salary.all', ['salaries' => $data, 'create' => $create, 'categories' => $categories]);
  }

  public function create($id)
  {
    $coststatus = $id;
    $categories = SalaryCategory::all();
    return view('admin.salary.create', compact('coststatus','categories'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'description' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'salary_category_id' => 'required',
    ]);
    $data = [
      'amount' => $request->amount,
      'cost_status' => $request->cost_status,
      'description' => $request->description,
      'salary_category_id' => $request->salary_category_id,
      'month' => Carbon::parse($request->month)->format('Y-m-d'),
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),

    ];
    $salary = Salary::create($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.salary.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.salary.all.credit');
    }
  }

  public function edit($id, $cs)
  {
    $coststatus = $cs;
    $salary = Salary::find($id);
    $categories = SalaryCategory::all();
    return view('admin.salary.edit', compact('salary', 'coststatus','categories'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'month' => 'required|date',
      'cost_status' => 'required',
      'description' => 'required',
      'amount' => 'required|numeric',
      'issue_date' => 'required|date',
      'salary_category_id' => 'required',
    ]);
    $data = $request->all();
    $salary = Salary::find($id);
    $salary->update($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.salary.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.salary.all.credit');
    }
  }

  public function delete($id, $cost_status)
  {
    $salary = Salary::find($id);
    $salary->delete();
    if ($cost_status == 1) {
      return redirect()->route('admin.salary.all.debit');
    } elseif ($cost_status == 2) {
      return redirect()->route('admin.salary.all.credit');
    }
  }
}
