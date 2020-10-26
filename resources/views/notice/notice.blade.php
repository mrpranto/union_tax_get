@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')



    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none">
            <h4 class="mb-0 text-gray-800">Dashboard</h4>
        </div>

        <div class="row d-print-none">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">হোল্ডিং নাম্বার দিয়ে খোঁজ করুন - </label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm" required name="holding_no" value="{{ request('holding_no') }}" id="holding_no">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">&nbsp;</label>
                                        <div>
                                            <button class="btn btn-sm btn-dark" type="submit"><i class="fa fa-search"></i> খোঁজ করুন</button>
                                            <a href="{{ route('notice.index') }}" class="btn btn-sm btn-outline-dark"><i class="fa fa-recycle"></i> রিফ্রেশ</a>

                                            @if (request('holding_no') && $taxRegister)
                                                <button class="btn btn-sm btn-primary" type="button" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (request('holding_no'))

            @if($taxRegister)

                <div class="row mb-3 mt-5">
                    <div class="col-md-12">


                        <h4 class="text-center">বোকেয়া নোটিশ</h4>
                        <p class="text-center">(ইউপি: পরিষদ ট্যাক্স ধার্য বিধির ১২ নিয়মের ধারণামতে)</p>
                        <p class="text-center"><strong>১০ হরিশংকরপুর ইউনিয়ন পরিষদ</strong></p>
                        <p class="text-center">বরাবর:{{ $taxRegister->name }}</p>
                        <p class="text-center">ঠিকানা: {{ $taxRegister->village->name }},হরিশংকরপুর, উপজেলা ও জেলাঃ ঝিনাইদহ।</p>
                        <p class="text-center">যেহেতু অত্র পরিষদের প্রাপ্ত বা নিম্নে বর্ণিত রেট ও ট্যাক্স আপনি জমা দেন নাই| উহা বাংলাদেশ সরকারের আইনের খেলাপ| অতএব এই নোটিশ প্রাপ্তির ৭ দিনের মধ্যে উপযুক্ত কারণ দর্শাইয় প্রাপ্ত টাকা জমা দিবেন| অন্যথায় প্রাপ্ত টাকা সহ দন্ড আপনার অস্থাবর ক্রোক দ্বারা আদায় করা হবে</p>

                    </div>
                    <div class="col-md-12">
                        <div class="row">

                            <table class="table table-bordered" >


                                <tbody>
                                <tr>
                                    <th>বর্ণনা</th>
                                    <th>টাকা</th>

                                </tr>

                                <tr>
                                    <td>গাড়ির ট্যাক্স</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>জন্ম, বিবাহ</td>
                                    <td>০০.০০</td>
                                </tr>

                                <tr>
                                    <td>ভোজ, প্রমোদ</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>পেশা, বানিজ্য বৃত্তি</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>আমদানি, রপ্তানি</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>ঘর, জমি-১৯</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>গ্রাম্য পুলিশ রেট</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>জরিমানা</td>
                                    <td>১০.০০</td>
                                </tr>

                                <tr>
                                    <td>মোট টাকা</td>
                                    <td>১০০.০০</td>
                                </tr>


                                </tbody>



                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 pt-5" >
                        <div class="row">

                            <div class="col-md-6">
                                <p>তারিখ:</p>
                            </div>

                            <div class="col-md-6">
                                <p>চেয়ারম্যানের স্বাক্ষর</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else

                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-warning">এই হোল্ডিং নং রেজিস্টারে কোন তথ্য খুঁজে পাওয়া যাই নাই।</div>
                    </div>
                </div>

            @endif

        @endif


    </div>
@endsection
