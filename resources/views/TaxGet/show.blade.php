@extends('layouts.master')
@section('title', 'ট্যাক্স গ্রহন প্রিন্ট')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 d-print-none">
            <h5 class="mb-0 text-gray-800">Dashboard</h5>
            <div class="btn-group float-right">
                <button class="btn btn-primary btn-sm" type="button" onclick="window.print()"><i class="fa fa-print"></i> প্রিন্ট</button>
                <a href="{{ route('tax-get.index') }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> ট্যাক্স গ্রহন তালিকা</a>
                <a href="{{ route('tax-get.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> ট্যাক্স গ্রহন করুন</a>
            </div>
        </div>
        <div class="row mb-3">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2"><p>ইউপি ফরম নং ১০</p></div>
                    <div class="col-md-8"><h4 class="text-center mt-3">১০ হরিশংকরপুর ইউনিয়ন পরিষদ</h4></div>
                    <div class="col-md-2"><p>অফিস কপি</p></div>
                </div>

                <h5 class="text-center">
                    ডাকঘরঃ হরিশংকরপুর, উপজেলা ও জেলাঃ ঝিনাইদহ। <br />
                    মোবাঃ ০১৭২৪-২৯৯৭৯৯
                </h5>

                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>খানা প্রধানের নামঃ</td>
                        <td>{{ $taxGet->taxRegister->name }}</td>
                        <td>হোল্ডিং নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->holding_no) }}</td>
                        <td>বিল নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->holding_no) .'-'. enToBnNumber(date('y')).enToBnNumber($taxGet->id) }}</td>
                        <td>ইস্যুর তারিখ</td>
                        <td>{{ dateInBangla($taxGet->date) }}</td>
                    </tr>

                    <tr>
                        <td>পিতার নাম</td>
                        <td>{{ $taxGet->taxRegister->father_name }}</td>
                        <td>অর্থ-বছর</td>
                        <td>{{ dateInBangla($taxGet->from) .'-'. dateInBangla($taxGet->to) }}</td>
                        <td>বই নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->book_no) }}</td>
                        <td>গ্রামঃ</td>
                        <td>{{ $taxGet->taxRegister->village->name }}</td>
                    </tr>

                    <tr class="row100">
                        <td colspan="3"></td>
                        <td colspan="2">সর্বমোট</td>
                        <td>{{ enToBnNumber($taxGet->tax_amount) }}</td>
                        <td>টাকা</td>
                        <td>--</td>
                    </tr>
                    </tbody>
                </table>
                <div class="row pt-5" style="">
                    <div class="col-md-4">
                        <p>আদায়কারী স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                    <div class="col-md-4">
                        <p>যাচাইকারীর স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                    <div class="col-md-4">
                        <p>চেয়ারম্যানের স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr style="border-top: 1px dashed;" />
            </div>

            <div class="col-md-12 pt-5">
                <div class="row">
                    <div class="col-md-2"><p>ইউপি ফরম নং ১০</p></div>
                    <div class="col-md-8"><h4 class="text-center mt-3">১০ হরিশংকরপুর ইউনিয়ন পরিষদ</h4></div>
                    <div class="col-md-2"><p>গ্রাহক কপি</p></div>
                </div>
                <h5 class="text-center">
                    ডাকঘরঃ হরিশংকরপুর, উপজেলা ও জেলাঃ ঝিনাইদহ। <br />
                    মোবাঃ ০১৭২৪-২৯৯৭৯৯
                </h5>

                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>খানা প্রধানের নামঃ</td>
                        <td>{{ $taxGet->taxRegister->name }}</td>
                        <td>হোল্ডিং নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->holding_no) }}</td>
                        <td>বিল নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->holding_no) .'-'. enToBnNumber(date('y')).enToBnNumber($taxGet->id) }}</td>
                        <td>ইস্যুর তারিখ</td>
                        <td>{{ dateInBangla($taxGet->date) }}</td>
                    </tr>

                    <tr>
                        <td>পিতার নাম</td>
                        <td>{{ $taxGet->taxRegister->father_name }}</td>
                        <td>অর্থ-বছর</td>
                        <td>{{ dateInBangla($taxGet->from) .'-'. dateInBangla($taxGet->to) }}</td>
                        <td>বই নং</td>
                        <td>{{ enToBnNumber($taxGet->taxRegister->book_no) }}</td>
                        <td>গ্রামঃ</td>
                        <td>{{ $taxGet->taxRegister->village->name }}</td>
                    </tr>

                    <tr class="row100">
                        <td colspan="3"></td>
                        <td colspan="2">সর্বমোট</td>
                        <td>{{ enToBnNumber($taxGet->tax_amount) }}</td>
                        <td>টাকা</td>
                        <td>--</td>
                    </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12"><h5 class="text-center">আদায়ার বিবারন</h5></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>ক্রো.নং</th>
                                <th>খাত</th>
                                <th>বোকিয়া</th>
                                <th>{{ dateInBangla($taxGet->from) .'-'. dateInBangla($taxGet->to) }} <br> অর্থ বছরের</th>
                                <th>মোট পরিমাণ</th>
                                <th>পয়সা</th>
                                <th>মন্তব্য</th>
                            </tr>

                            <tr>
                                <td>১</td>
                                <td>বসতবাড়ির বাৎসরিক মূল্যের উপর কর</td>
                                <td>০.০০</td>
                                <td>{{ enToBnNumber($taxGet->tax_amount) }}</td>
                                <td>{{ enToBnNumber($taxGet->tax_amount) }}</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>2</td>
                                <td>ব্যবসা/ পেশা/ জীবীকার উপর কর</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>3</td>
                                <td>সিনেমা/ যাত্রা /থিয়েটার/ অন্যান্য বিনোদনমূলক অনুষ্ঠান এর উপর কর</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>
                            <tr class="row100">
                                <td>4</td>
                                <td>লাইসেন্স পারমিট ফি</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>
                            <tr class="row100">
                                <td>5</td>
                                <td>ভূমি ইমারত ভাড়া</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>6</td>
                                <td>হাট-বাজার /ফেরিঘাট /জলমহাল/ ইজারা</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>7</td>
                                <td>নিলামে বিক্রয়লব্ধ আয়</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>8</td>
                                <td>বকেয়া জরিমানা</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>9</td>
                                <td>অন্যান্য দাবি আদায়ে</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>

                            <tr class="row100">
                                <td>10</td>
                                <td>মোট</td>
                                <td>০.০০</td>
                                <td>০.০০</td>
                                <td>{{ enToBnNumber($taxGet->tax_amount) }}</td>
                                <td>--</td>
                                <td>--</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row pt-5" style="">
                    <div class="col-md-4">
                        <p>আদায়কারীর স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                    <div class="col-md-4">
                        <p>যাচাইকারীর স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                    <div class="col-md-4">
                        <p>চেয়ারম্যানের স্বাক্ষর</p>
                        <p>তাং</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        window.print()
    </script>
@endsection
