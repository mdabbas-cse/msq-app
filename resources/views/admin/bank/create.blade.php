@extends('layouts.appLayout')

@section('css')
<style>
  /* .container-fluid {
        background-color: red;
    } */
</style>

@endsection

@section('content')
<div class="d-flex justify-content-between">
  <h1 class="h5 mb-4 text-gray-800">Add New / নতুন সংযুগ করুন</h1>
  <div>
    <a class="btn btn-primary" href="{{ route('admin.bank.all')}}">Back/ পেছনে যান</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form method="post" action="{{route('admin.bank.store')}}">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="bank_name" class="form-label">Bank Name</label>
            <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Bank Name">
            @error('bank_name')
            <div id="bank_name" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account_name" class="form-label">Account Name</label>
            <input type="text" name="account-name" class="form-control" id="account_name" placeholder="Account Name">
            @error('account_name')
            <div id="account_name" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account_no" class="form-label">Account No <span class="text-danger">*</span></label>
            <input type="text" name="account_no" class="form-control" id="account_no" placeholder="Account No">
            @error('account_no')
            <div id="account_no" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="check_no" class="form-label">Check No <span class="text-danger">*</span></label>
            <input type="text" name="check_no" class="form-control" id="check_no" placeholder="Check No">
            @error('check_no')
            <div id="check_no" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
            <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount">
            @error('amount')
            <div id="amount" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="issue_date" class="form-label">Issue Date <span class="text-danger">*</span></label>
            <input type="date" name="issue_date" class="form-control" id="issue_date" placeholder="issue_date">
            @error('issue_date')
            <div id="issue_date" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="cost_status" class="form-label">Cost Status <span class="text-danger">*</span></label>
            <select class="form-control" name="cost_status" id="cost_status">
              <option value="">Select Cost Status</option>
              <option value="1">Debit</option>
              <option value="2">Cradit</option>
            </select>
            @error('cost_status')
            <div id="cost_status" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="cost_status" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
            @error('description')
            <div id="description" class="form-text text-danger">{{$message}}</div>
            @enderror
          </div>
        </div>

      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // alert('Hello');
</script>
@endsection