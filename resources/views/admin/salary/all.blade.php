@extends('layouts.appLayout')
@section('css')
    <style>
        @media only screen and (min-width: 800px) {
            #donation_filter {
                float: right !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">
            @if ($create == 2)
                DEBIT
            @elseif($create == 1)
                সেলারি ক্যাটাগরি /Salary Category
            @endif
        </h1>
        <div>
            <a class="btn btn-primary"
                href="@if ($create == 1) {{ route('admin.salary.create', 1) }}
                      @elseif($create == 2)
                        {{ route('admin.salary.create', 2) }} @endif">ADD
                NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="salary" class="table table-bordered table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Salary Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Month</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($salaries as $salary)
                        <tr>
                            <td>{{ $salary->id }}</td>
                            <td>
                                @foreach ($categories as $data)
                                    @if ($salary->salary_category_id == $data->id)
                                        {{ $data->salary_category_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $salary->description }}</td>
                            <td>{{ $salary->amount }}</td>
                            <td>{{ $salary->month }}</td>
                            <td>{{ $salary->issue_date }}</td>
                            <td> {{ $salary->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center"><a
                                    href="{{ route('admin.salary.edit', ['id' => $salary->id, 'cost_status' => $salary->cost_status]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.salary.delete', ['id' => $salary->id, 'cost_status' => $salary->cost_status]) }}"><i
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
            $('#salary').DataTable();
        });
    </script>
@endsection
