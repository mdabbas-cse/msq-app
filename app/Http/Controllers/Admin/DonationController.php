<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
  public function indexDebit()
  {
    $create = 1;
    $data = Donation::where('cost_status', 1)->get();
    return view('admin.donation.all', ['donations' => $data, 'create' => $create]);
  }
  public function indexCredit()
  {
    $create = 2;
    $data = Donation::where('cost_status', 2)->get();
    return view('admin.donation.all', ['donations' => $data, 'create' => $create]);
  }

  public function create($id)
  {
    $coststatus = $id;
    return view('admin.donation.create', compact('coststatus'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $request->validate([
      'month' => 'required',
      'amount' => 'required',
      'mobile_no' => 'required',
      'issue_date' => 'required',
      'description' => 'required',
      'cost_status' => 'required',
    ]);
    $data = [
      'amount' => $request->amount,
      'address' => $request->address,
      'mobile_no' => $request->mobile_no,
      'donar_name' => $request->donar_name,
      'cost_status' => $request->cost_status,
      'description' => $request->description,
      'month' => Carbon::parse($request->month)->format('Y-m-d'),
      'issue_date' => Carbon::parse($request->issue_date)->format('Y-m-d'),

    ];
    $donation = Donation::create($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.donation.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.donation.all.credit');
    }
  }

  public function edit($id, $cost_status)
  {
    $coststatus = $cost_status;
    $donation = Donation::find($id);
    return view('admin.donation.edit', compact('donation', 'coststatus'));
  }

  public function update(Request $request, $id)
  {
    $data = $request->all();
    $donation = Donation::find($id);
    $donation->update($data);
    if ($request->cost_status == 1) {
      return redirect()->route('admin.donation.all.debit');
    } elseif ($request->cost_status == 2) {
      return redirect()->route('admin.donation.all.credit');
    }
  }

  public function delete($id, $cost_status)
  {
    $donation = Donation::find($id);
    $donation->delete();
    if ($cost_status == 1) {
      return redirect()->route('admin.donation.all.debit');
    } elseif ($cost_status == 2) {
      return redirect()->route('admin.donation.all.credit');
    }
  }
}
