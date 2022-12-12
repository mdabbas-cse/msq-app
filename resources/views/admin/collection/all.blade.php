@extends('layouts.appLayout')
@section('css')
    <style>
        @media only screen and (min-width: 800px) {
            #collection_filter,
            #collection_paginate {
                float: right !important;
            }
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h1 class="h5 mb-4 text-gray-800">
            @if ($create == 2)
                &#91;JUMA/DONATION BOX/MONTHLY BAZAAR COLLECTION/AKHD&#93; &#91;জুমা/দান বাক্স/মাসিক বাজার কালেকশন/আকদ &#93;
            @elseif($create == 1)
                DEBIT
            @endif
        </h1>
        <div>
            <a class="btn btn-primary"
                href="@if ($create == 1) {{ route('admin.collection.create', 1) }}
                      @elseif($create == 2)
                        {{ route('admin.collection.create', 2) }} @endif">ADD
                NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="collection" class="table table-bordered table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Collection Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Month</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($collections as $collection)
                        <tr>
                            <td>{{ $collection->id }}</td>
                            <td>
                                @if ($collection->collection_category == 'jumma')
                                    Jumma
                                @elseif ($collection->collection_category == 'dan_box')
                                    Dan Box
                                @elseif ($collection->collection_category == 'mashik_bazar_collection')
                                    Mashik Bazar Collection
                                @elseif ($collection->collection_category == 'akdh')
                                    Akdh
                                @endif
                            </td>
                            <td>{{ $collection->description }}</td>
                            <td>{{ $collection->amount }}</td>
                            <td>{{ $collection->month }}</td>
                            <td>{{ $collection->issue_date }}</td>
                            <td> {{ $collection->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center"><a
                                    href="{{ route('admin.collection.edit', ['id' => $collection->id, 'cost_status' => $collection->cost_status]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.collection.delete', ['id' => $collection->id, 'cost_status' => $collection->cost_status]) }}"><i
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
            $('#collection').DataTable();
        });
    </script>
@endsection
