@extends('layouts.appLayout')
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">GOV. NON-GOV. COLLECTION</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.gngc.create') }}">ADD NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="back-account" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Description</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($gngcs as $gngc)
                        <tr>
                            <td>{{ $gngc->id }}</td>
                            <td>{{ $gngc->amount }}</td>
                            <td>{{ $gngc->description }}</td>
                            <td>{{ $gngc->issue_date }}</td>
                            <td> {{ $gngc->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center"><a href="{{ route('admin.gngc.edit', ['id' => $gngc->id]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.gngc.delete', ['id' => $gngc->id]) }}"><i
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
            $('#back-account').DataTable();
        });
    </script>
@endsection
