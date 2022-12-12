@extends('layouts.appLayout')
@section('css')
    <style>
        @media only screen and (min-width: 800px) {

            #miscat_filter,
            #miscat_paginate {
                float: right !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">বিবিধ খরচ ক্যাটাগরি / Miscellaneous costs category</h1>
        <div>
            <a class="btn btn-primary" href="{{ route('admin.miscat.create') }}">ADD NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="miscat" class="table table-bordered table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Update</th>
                </thead>
                <tbody>
                    @foreach ($miscats as $miscat)
                        <tr>
                            <td>{{ $miscat->id }}</td>
                            <td>{{ $miscat->category_name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.miscat.edit', ['id' => $miscat->id]) }}">
                                    <i class="fas fa-fw fa-edit"></i>
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
            $('#miscat').DataTable();
        });
    </script>
@endsection
