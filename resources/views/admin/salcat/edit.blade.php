@extends('layouts.appLayout')
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">ADD NEW / নতুন সংযুগ করুন</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.salcat.all') }}">BACK / পেছনে যান</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('admin.salcat.update', $salcat->id) }}">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="salary_category_name" class="form-label">NAME <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="salary_category_name" class="form-control" id="salary_category_name"
                                placeholder="NAME" value="{{ $salcat->salary_category_name }}">
                            @error('salary_category_name')
                                <div id="salary_category_name" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 my-auto">
                      <div class="float-right">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // alert('Hello');
    </script>
@endsection
