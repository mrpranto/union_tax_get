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

                        @if (!$taxRegister->taxAmount->first())
                            <div class="alert alert-warning">
                                ট্যাক্সের কোন তত্থ্য পাও্যা যাই নাই।
                            </div>

                        @elseif(request('holding_no'))

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
                                                <th><input type="number" class="form-control form-control-sm" name="amount_of_tax" value="{{ optional($taxRegister->taxAmount->first())->amount_of_tax }}" readonly style="width: 100px;"></th>
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
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });
    </script>

@endsection
