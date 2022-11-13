@extends('layouts.appLayout')
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">ADD NEW / নতুন সংযুগ করুন</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.gngc.all') }}">BACK / পেছনে যান</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.gngc.update', $gngc->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount" class="form-label">AMOUNT <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" id="amount" placeholder="Amount"
                                value="{{ $gngc->amount }}">
                            @error('amount')
                                <div id="amount" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="issue_date" class="form-label">ISSE DATE <span class="text-danger">*</span></label>
                            <input type="date" name="issue_date" class="form-control" id="issue_date"
                                placeholder="issue_date" value="{{ $gngc->issue_date }}">
                            @error('issue_date')
                                <div id="issue_date" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cost_status" class="form-label">COST STATUS <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="cost_status" id="cost_status">
                                <option value="">SELECT COST STATUS</option>
                                <option value="1" {{ $gngc->cost_status == 1 ? 'selected' : '' }}>Debit</option>
                                <option value="2" {{ $gngc->cost_status == 2 ? 'selected' : '' }}>Cradit</option>
                            </select>
                            @error('cost_status')
                                <div id="cost_status" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cost_status" class="form-label">DESCRIPTION</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $gngc->description }}</textarea>
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
