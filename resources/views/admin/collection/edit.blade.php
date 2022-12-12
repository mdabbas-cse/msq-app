@extends('layouts.appLayout')
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">Add New / নতুন সংযুগ করুন</h1>
        <div>
            <a class="btn btn-primary"
                href="@if ($coststatus == 1) {{ route('admin.collection.all.debit') }}
            @elseif($coststatus == 2)
              {{ route('admin.collection.all.credit') }} @endif">Back/
                পেছনে যান</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.collection.update', $collection->id) }}">
                @csrf
                <input type="hidden" name="cost_status" value="{{ $coststatus }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="collection_category" class="form-label">Rent Category<span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="collection_category" id="collection_category">
                                <option value="">Select Collection Category</option>
                                <option value="jumma" {{ $collection->collection_category == 'jumma' ? 'selected' : '' }}>
                                    Jumma</option>
                                <option value="dan_box"
                                    {{ $collection->collection_category == 'dan_box' ? 'selected' : '' }}>Dan Box</option>
                                <option value="mashik_bazar_collection"
                                    {{ $collection->collection_category == 'mashik_bazar_collection' ? 'selected' : '' }}>
                                    Mashik Bazar Collection</option>
                                <option value="akdh" {{ $collection->collection_category == 'akdh' ? 'selected' : '' }}>
                                    Akdh</option>
                            </select>
                            @error('collection_category')
                                <div id="collection_category" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount"
                                value="{{ $collection->amount }}">
                            @error('amount')
                                <div id="amount" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="month" class="form-label">Month <span class="text-danger">*</span></label>
                            <input type="date" name="month" class="form-control" id="month" placeholder="month"
                                value="{{ $collection->month }}">
                            @error('month')
                                <div id="month" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="issue_date" class="form-label">Issue Date <span class="text-danger">*</span></label>
                            <input type="date" name="issue_date" class="form-control" id="issue_date"
                                placeholder="issue_date" value="{{ $collection->issue_date }}">
                            @error('issue_date')
                                <div id="issue_date" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost_status" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $collection->description }}</textarea>
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
