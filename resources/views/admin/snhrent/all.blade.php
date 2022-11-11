@extends('layouts.appLayout')
@section('css')
    <style>
        @media only screen and (min-width: 800px) {
            #snhrent_filter {
                float: right !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">SHOP & HOUSE RENT / ব্যাংক হিসাব</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.snhrent.create') }}">ADD NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="snhrent" class="table table-bordered table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donar Name</th>
                        <th scope="col">NID</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">House No</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Month</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Rent Category</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($snhrents as $snhrent)
                        <tr>
                            <td>{{ $snhrent->id }}</td>
                            <td>{{ $snhrent->donar_name }}</td>
                            <td>{{ $snhrent->nid }}</td>
                            <td>{{ $snhrent->mobile_no }}</td>
                            <td>{{ $snhrent->house_no }}</td>
                            <td>{{ $snhrent->description }}</td>
                            <td>{{ $snhrent->address }}</td>
                            <td>{{ $snhrent->month }}</td>
                            <td>{{ $snhrent->amount }}</td>
                            <td>{{ $snhrent->issue_date }}</td>
                            <td>{{ $snhrent->rent_category }}</td>
                            <td> {{ $snhrent->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center"><a href="{{ route('admin.snhrent.edit', ['id' => $snhrent->id]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.snhrent.delete', ['id' => $snhrent->id]) }}"><i
                                        class="fas fa-fw fa-trash text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @include('/layouts/dataTable')
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#snhrent').DataTable();
        });
    </script>
@endsection
