@extends('layouts.appLayout')
@section('css')
    <style>
        @media only screen and (min-width: 800px) {

            #miscost_filter,
            #miscost_paginate {
                float: right !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">
            @if ($title == 1)
                অফিস/ওয়াকফ/চিকিৎসা খরচ
            @elseif ($title == 2)
                বিল
            @elseif ($title == 3)
                ঋণ পরিশোধ
            @endif
        </h1>
        <div>
            <a class="btn btn-primary"
                href="@if ($create == 1) {{ route('admin.miscost.create', 1) }}
                      @elseif($create == 2)
                        {{ route('admin.miscost.create', 2) }} @endif">ADD
                NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="miscost" class="table table-bordered table-responsive-sm table-responsive-md">
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
                    @foreach ($miscosts as $miscost)
                        <tr>
                            <td>{{ $miscost->id }}</td>
                            <td>
                                @foreach ($categories as $data)
                                    @if ($miscost->miscellaneous_cost_category_id == $data->id)
                                        {{ $data->category_name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $miscost->description }}</td>
                            <td>{{ $miscost->amount }}</td>
                            <td>{{ $miscost->month }}</td>
                            <td>{{ $miscost->issue_date }}</td>
                            <td> {{ $miscost->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center">
                                <a
                                    href="{{ route('admin.miscost.edit', ['id' => $miscost->id, 'cost_status' => $miscost->cost_status]) }}">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.miscost.delete', ['id' => $miscost->id, 'cost_status' => $miscost->cost_status]) }}">
                                    <i class="fas fa-fw fa-trash text-danger"></i>
                                </a>
                            </td>
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
            $('#miscost').DataTable();
        });
    </script>
@endsection
