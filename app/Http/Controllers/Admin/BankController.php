<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BankController extends Controller
{
  public function all()
  {
    $data = Bank::all();
    // dd($data);
    return view('admin.bank.all', ['banks' => $data]);
  }

  public function create()
  {
    return view('admin.bank.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'account_no' => 'required',
      'check_no' => 'required',
      'amount' => 'required',
      'cost_status' => 'required',
    ]);
    $data = [
      'bank_name' => $request->bank_name,
      'account_name' => $request->account_name,
      'account_no' => $request->account_no,
      'check_no' => $request->check_no,
      'amount' => $request->amount,
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),
      'cost_status' => $request->cost_status,
      'description' => $request->description,

    ];
    // dd($data);
    $bank = Bank::create($data);
    return redirect()->route('admin.bank.all');
  }

  public function edit($id)
  {
    $bank = Bank::find($id);
    return view('admin.bank.edit', compact('bank'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $bank = Bank::find($id);
    $bank->update($data);
    return redirect()->route('admin.bank.all');
  }

  public function delete($id)
  {
    $bank = Bank::find($id);
    $bank->delete();
    return redirect()->route('admin.bank.all');
  }
}
