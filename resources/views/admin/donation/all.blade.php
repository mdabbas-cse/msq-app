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
            @if ($create == 1)
                ( MONTHLY / MEMBERSHIP ) SUBSCRIPTION / DONATION / মাসিক চাঁদা/ সদস্য চাঁদা/ অনুদান
            @elseif($create == 2)
                DONATION / অনুদান
            @endif
        </h1>
        <div>
            <a class="btn btn-primary"
                href="@if ($create == 1) {{ route('admin.donation.create', 1) }}
                      @elseif($create == 2)
                        {{ route('admin.donation.create', 2) }} @endif">ADD
                NEW / নতুন সংযুগ করুন</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="donation" class="table table-bordered table-responsive-sm table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donar Name</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Description</th>
                        <th scope="col">Address</th>
                        <th scope="col">Amout</th>
                        <th scope="col">Month</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Cost Status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->id }}</td>
                            <td>{{ $donation->donar_name }}</td>
                            <td>{{ $donation->mobile_no }}</td>
                            <td>{{ $donation->description }}</td>
                            <td>{{ $donation->address }}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>{{ $donation->month }}</td>
                            <td>{{ $donation->issue_date }}</td>
                            <td> {{ $donation->cost_status == 1 ? 'Debit' : 'Cradit' }} </td>
                            <td class="text-center"><a
                                    href="{{ route('admin.donation.edit', ['id' => $donation->id, 'cost_status' => $donation->cost_status]) }}"><i
                                        class="fas fa-fw fa-edit"></i></a></td>
                            <td class="text-center "><a onclick="confirm('Are your delete confirm?')"
                                    href="{{ route('admin.donation.delete', ['id' => $donation->id, 'cost_status' => $donation->cost_status]) }}"><i
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
            $('#donation').DataTable();
        });
    </script>
@endsection
