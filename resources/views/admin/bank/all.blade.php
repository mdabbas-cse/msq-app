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


        <h1 class="h5 mb-4 text-gray-800">Bank Account / ব্যাংক হিসাব</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.bank.create') }}">Add New / নতুন সংযুগ করুন</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <table id="back-account" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Bank Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Account No</th>
                        <th scope="col">Check No</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Description</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($banks as $bank)
                        <tr>
                            <td>{{ $bank->id }}</td>
                            <td>{{ $bank->bank_name }}</td>
                            <td>{{ $bank->account_name }}</td>
                            <td>{{ $bank->account_no }}</td>
                            <td>{{ $bank->check_no }}</td>
                            <td>{{ $bank->amount }}</td>
                            <td>{{ $bank->description }}</td>
                            <td>{{ $bank->issue_date }}</td>
                            <td>{{ $bank->cost_status }}</td>
                            <td class="text-center"><a href="{{ route('admin.bank.edit', ['id' => $bank->id]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.bank.delete', ['id' => $bank->id]) }}"><i
                                        class="fas fa-fw fa-trash text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@section('scr ipts')
    @include('/layouts/dataTable')
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#back-account').DataTable();
        });
    </script>
@endsection
