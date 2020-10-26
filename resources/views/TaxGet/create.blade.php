@extends('layouts.master')
@section('title', 'ট্যাক্স গ্রহন করুন')
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
                        <form action="">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">হোল্ডিং নাম্বার দিয়ে খোঁজ করুন - </label>
                                        <div>
                                            <input type="number" class="form-control" required name="holding_no" value="{{ request('holding_no') }}" id="holding_no">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">অর্থ বছর-  </label>
                                        <div>
                                            <div class="input-daterange input-group">
                                                <input type="text" class="form-control input-sm date-range"  name="from_year" value="{{ request('from_year') }}" required>
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">হইতে</span>
                                                </div>
                                                <input type="text" class="form-control input-sm date-range" name="to_year" value="{{ request('to_year') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">&nbsp;</label>
                                        <div>
                                            <button class="btn btn-sm btn-dark" type="submit"><i class="fa fa-search"></i> খোঁজ করুন</button>
                                            <a href="{{ route('tax-get.create') }}" class="btn btn-sm btn-outline-dark"><i class="fa fa-recycle"></i> রিফ্রেশ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <hr>

                        @if (!request('holding_no'))
                            <div class="alert alert-warning">
                                হোল্ডিং নং এবং অর্থ বছর দিয়ে খোঁজ করুন
                            </div>


                        @else

                            @if($taxRegister)


                                <div class="row">
                                    <div class="col-sm-6 offset-sm-3 mb-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>অর্থ বছর</th>
                                                <th>ধার্য কৃত ট্যাক্স</th>
                                                <th>বোকিয়া</th>
                                            </tr>

                                            @php
                                                $fromYear = date('Y', strtotime(optional($taxRegisterInfo->taxAmount->last())->from));
                                                $toYear = date('Y');
                                            @endphp
                                            @foreach(range($toYear, $fromYear) as $value)
                                                @php

                                                    @endphp
                                                <tr>
                                                    <td>{{ $value }} - {{ $value+1 }}</td>
                                                    <td>{{ optional(collect($taxRegisterInfo->taxAmount)->where('from', $value)->first())->amount_of_tax }}</td>
                                                    <td>{!! optional(collect($taxRegisterInfo->tax_get)->where('from', $value)->first())->tax_amount ? '<span class="text-success">নাই</span>' : '<span class="text-danger">হ্যাঁ</span>' !!}</td>
                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>



                                <form action="{{ route('tax-get.store') }}" method="post">
                                    @csrf

                                    <input type="hidden" value="{{ $taxRegister->id }}" name="tax_register_id">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>খানা প্রধানের নামঃ</th>
                                                    <td>{{ $taxRegister->name }}</td>
                                                    <th>হোল্ডিং নং</th>
                                                    <td>{{ $taxRegister->holding_no }}</td>
                                                    <th>বিল নং</th>
                                                    <td>{{ str_pad(($taxGet + 1),4,"0000",STR_PAD_LEFT)  }}</td>
                                                    <th>ইস্যুর তারিখ</th>
                                                    <td>{{ dateInBangla(date('Y-m-d')) }}</td>
                                                    <input type="hidden" value="{{ date('Y-m-d') }}" name="tax_get_date">
                                                    <input type="hidden" value="{{ request('from_year') }}" name="from">
                                                    <input type="hidden" value="{{ request('to_year') }}" name="to">
                                                </tr>
                                                <tr>
                                                    <th>পিতার নাম</th>
                                                    <td>{{ $taxRegister->father_name }}</td>
                                                    <th>অর্থ-বছর</th>
                                                    <td>{{ dateInBangla(date('d/m/y' ,strtotime(request('from_year')))) .'-'. dateInBangla(date('d/m/y', strtotime(request('to_year'))))  }}</td>
                                                    <th>বই নং</th>
                                                    <td>{{ $taxRegister->book_no }}</td>
                                                    <th>গ্রামঃ</th>
                                                    <td>{{ $taxRegister->village->name }}</td>
                                                </tr>

                                                <tr class="row100">
                                                    <td colspan="3"></td>
                                                    <th colspan="2">সর্বমোট</th>
                                                    <th>
                                                        <input type="number" class="form-control form-control-sm" name="amount_of_tax" value="{{ optional($taxRegister->taxAmount->first())->amount_of_tax }}" readonly style="width: 100px;">
                                                    </th>
                                                    <td>টাকা</td>
                                                    <td>--</td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3">
                                        <div class="col-sm-12">
                                            <div class="btn-group float-right">
                                                <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Get Tax</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            @else


                                <div class="alert alert-warning">
                                    এই হোল্ডিং নং কোন রেকর্ড পাওয়া যাই নাই।
                                </div>


                            @endif
                        @endif



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
            minViewMode: 2,
            format: 'yyyy',
            autoclose:true

        });
    </script>

@endsection
