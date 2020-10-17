@extends('layouts.master')
@section('title', 'Members')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800"> <i class="fa fa-plus"></i> ট্যাক্স গ্রহন করুন</h4>
        </div>

        <div class="row mb-3">

            <div class="col-sm-12 col-md-12">


                @include('partials.alert')



                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>নাম</th>
                                    <th>হোল্ডিং নং</th>
                                    <th>ট্যাক্স জমার তারিখ</th>
                                    <th>ট্যাক্স অর্থ বছর</th>
                                    <th>ধার্য কৃত ট্যাক্স</th>
                                    <th>আকশন</th>
                                </tr>

                                @forelse($taxGet as $key => $tax)
                                    <tr>
                                        <td>{{ $taxGet->firstItem() + $key }}</td>
                                        <td>{{ $tax->taxRegister->name }}</td>
                                        <td>{{ $tax->taxRegister->holding_no }}</td>
                                        <td>{{ dateInBangla($tax->date) }}</td>
                                        <td>{{ dateInBangla(date('d/m/y', strtotime($tax->from))).'-'.dateInBangla(date('d/m/y', strtotime($tax->to))) }}</td>
                                        <td>{{ $tax->tax_amount }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> প্রিন্ট</a>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7">NO Data Found !</td>
                                    </tr>

                                @endforelse

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Row-->
    </div>
@endsection

@section('js')

    <script>
        $('.date-range').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });
    </script>

@endsection
