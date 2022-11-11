@extends('layouts.appLayout')
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">Add New / নতুন সংযুগ করুন</h1>
        <div>
            <a class="btn btn-primary" href="@if ($coststatus == 1) {{ route('admin.snhrent.all.debit') }}
            @elseif($coststatus == 2)
              {{ route('admin.snhrent.all.credit') }} @endif">Back/ পেছনে যান</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.snhrent.update', $snhrent->id) }}">
                @csrf
                <input type="hidden" name="cost_status" value="{{ $coststatus }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="donar_name" class="form-label">Donar Name</label>
                            <input type="text" name="donar_name" class="form-control" id="donar_name"
                                placeholder="Donar Name" value="{{ $snhrent->donar_name }}">
                            @error('donar_name')
                                <div id="donar_name" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount"
                                value="{{ $snhrent->amount }}">
                            @error('amount')
                                <div id="amount" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nid" class="form-label">NID</label>
                            <input type="text" name="nid" class="form-control" id="nid" placeholder="NID"
                                value="{{ $snhrent->nid }}">
                            @error('nid')
                                <div id="nid" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile_no" class="form-label">Mobile No <span class="text-danger">*</span></label>
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no"
                                placeholder="Mobile No" value="{{ $snhrent->mobile_no }}">
                            @error('mobile_no')
                                <div id="mobile_no" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="house_no" class="form-label">House No <span class="text-danger">*</span></label>
                            <input type="text" name="house_no" class="form-control" id="house_no" placeholder="House No"
                                value="{{ $snhrent->house_no }}">
                            @error('house_no')
                                <div id="house_no" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="month" class="form-label">Month <span class="text-danger">*</span></label>
                            <input type="date" name="month" class="form-control" id="month" placeholder="month"
                                value="{{ $snhrent->month }}">
                            @error('month')
                                <div id="month" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="issue_date" class="form-label">Issue Date <span class="text-danger">*</span></label>
                            <input type="date" name="issue_date" class="form-control" id="issue_date"
                                placeholder="issue_date" value="{{ $snhrent->issue_date }}">
                            @error('issue_date')
                                <div id="issue_date" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rent_category" class="form-label">Rent Category<span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="rent_category" id="rent_category">
                                <option value="">Select Cost Status</option>
                                <option value="shop" {{ $snhrent->rent_category == 'shop' ? 'selected' : '' }}>Shop
                                </option>
                                <option value="house" {{ $snhrent->rent_category == 'house' ? 'selected' : '' }}>House
                                </option>
                            </select>
                            @error('rent_category')
                                <div id="rent_category" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cost_status" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ $snhrent->address }}</textarea>
                            @error('address')
                                <div id="address" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cost_status" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $snhrent->description }}</textarea>
                            @error('description')
                                <div id="description" class="form-text text-danger">{{ $message }}</div>
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
