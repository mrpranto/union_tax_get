@extends('layouts.master')
@section('title', $taxRegister->name .' বিস্তারিত')
@section('css')
    <style>

        .bg-gray{
            background-color: #ededed;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800"> <i class="fa fa-user"></i> {{ $taxRegister->name }} বিস্তারিত</h4>

            <div class="btn-group-sm">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark"><i class="fa fa-backspace"></i> Back</a>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive-sm">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>মালিকের নাম</th>
                                            <td>{{ $taxRegister->name }}</td>
                                            <th>পিতার নাম</th>
                                            <td>{{ $taxRegister->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>হোল্ডিং নং</th>
                                            <td>{{ $taxRegister->holding_no }}</td>
                                            <th>দালান</th>
                                            <td>{{ $taxRegister->building }}</td>
                                        </tr>
                                        <tr>
                                            <th>ডোয়া পাকা টিনসেড</th>
                                            <td>{{ $taxRegister->doa_ripe_tin_shed }}</td>
                                            <th>কাঁচা ছাপড়া</th>
                                            <td>{{ $taxRegister->raw_chapra }}</td>
                                        </tr>
                                        <tr>
                                            <th>পাকা ঘর ওয়ালা</th>
                                            <td>{{ $taxRegister->pucca_house }}</td>
                                            <th>জমির পরিমাণ</th>
                                            <td>{{ $taxRegister->amount_of_land }}</td>
                                        </tr>
                                        <tr>
                                            <th>জমিসহ বসতবাড়ির আনুমানিক মূল্য</th>
                                            <td>{{ $taxRegister->house_and_land_rate }}</td>
                                            <th>পেশা</th>
                                            <td>{{ $taxRegister->occupation->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>অপ্রাপ্ত বয়স্ক মেয়ের সংখ্যা <small>(১৮ এর নিচে)</small></th>
                                            <td>{{ $taxRegister->minor_girl_count }}</td>
                                            <th>প্রাপ্তবয়স্ক মেয়ের সংখ্যা <small>(১৮ এর উর্দ্ধে)</small></th>
                                            <td>{{ $taxRegister->adult_girl_count }}</td>
                                        </tr>
                                        <tr>
                                            <th>অপ্রাপ্ত বয়স্ক ছেলের সংখ্যা <small>(২১ এর নিচে)</small></th>
                                            <td>{{ $taxRegister->minor_boy_count }}</td>
                                            <th>প্রাপ্ত বয়স্ক ছেলের সংখ্যা <small>(২১ এর ঊর্ধ্বে)</small></th>
                                            <td>{{ $taxRegister->adult_boy_count }}</td>
                                        </tr>
                                        <tr>
                                            <th>মোট সদস্য</th>
                                            <td>{{ $taxRegister->count_of_member }}</td>
                                            <th>জাতীয় পরিচয় পত্র নং</th>
                                            <td>{{ $taxRegister->nid_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>মোবাইল নং</th>
                                            <td>{{ $taxRegister->mobile }}</td>
                                            <th>ওয়ার্ড নাম্বার</th>
                                            <td>{{ $taxRegister->word_number->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>গ্রাম</th>
                                            <td>{{ $taxRegister->village->name }}</td>
                                            <th>বই নং</th>
                                            <td>{{ $taxRegister->book_no }}</td>
                                        </tr>
                                        <tr>
                                            <th>সানিটেশন</th>
                                            <td>{{ $taxRegister->sanitation }}</td>
                                            <td colspan="2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>অর্থ বছর</th>
                                                        <th>ধার্য কৃত ট্যাক্স</th>
                                                    </tr>

                                                    @foreach($taxRegister->taxAmount as $taxAmount)
                                                        <tr>
                                                            <td>{{ $taxAmount->from }} <i class="fa fa-arrow-right"></i> {{ $taxAmount->to }}</td>
                                                            <td>{{ $taxAmount->amount_of_tax }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Row-->
    </div>
@endsection

@section('js')



@endsection
