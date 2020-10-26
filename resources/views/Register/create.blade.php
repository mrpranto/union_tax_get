@extends('layouts.master')
@section('title', 'নতুন রেজিস্টার যোগ করুন')
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
            <h4 class="mb-0 text-gray-800"> <i class="fa fa-plus"></i> নতুন রেজিস্টার যোগ করুন</h4>
        </div>

        <div class="row mb-3">

            <div class="col-sm-12 col-md-12">


                @include('partials.alert')



                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tax-register.store') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">মালিকের নাম</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" required name="name" value="{{ old('name') }}" id="name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="fathers_name" class="col-form-label">পিতার নাম</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="fathers_name" value="{{ old('fathers_name') }}" required id="fathers_name" >
                                            @error('fathers_name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="holding_number" class="col-form-label">হোল্ডিং নং</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('holding_number') is-invalid @enderror" name="holding_number" value="{{ old('holding_number') }}" required id="holding_number" >
                                            @error('holding_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_model" class="col-form-label">দালান</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('building') is-invalid @enderror" name="building" step="0.01" value="{{ old('building') }}" id="building">

                                            @error('building')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_model" class="col-form-label">ডোয়া পাকা টিনসেড</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('doa_ripe_tin_shed') is-invalid @enderror"  name="doa_ripe_tin_shed" step="0.01" value="{{ old('doa_ripe_tin_shed') }}" id="doa_ripe_tin_shed">

                                            @error('doa_ripe_tin_shed')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_model" class="col-form-label">কাঁচা ছাপড়া</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('raw_chapra') is-invalid @enderror" name="raw_chapra" step="0.01" value="{{ old('raw_chapra') }}" id="raw_chapra">

                                            @error('raw_chapra')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_model" class="col-form-label">পাকা ঘর ওয়ালা </label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('pucca_house') is-invalid @enderror" name="pucca_house" step="0.01" value="{{ old('pucca_house') }}" id="pucca_house">

                                            @error('pucca_house')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="amount_of_land" class="col-form-label">জমির পরিমাণ</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('amount_of_land') is-invalid @enderror" required name="amount_of_land" step="0.01" value="{{ old('amount_of_land') }}" id="amount_of_land" >
                                            @error('amount_of_land')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_and_land_rate" class="col-form-label">জমিসহ বসতবাড়ির আনুমানিক মূল্য</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('mobile') is-invalid @enderror" step="0.01" required name="house_and_land_rate" value="{{ old('house_and_land_rate') }}" id="house_and_land_rate" >
                                            @error('house_and_land_rate')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="occupation" class="col-form-label">পেশা</label>
                                        <div>

                                            <select name="occupation" class="select2-single form-control" required id="occupation">
                                                <option value="">- সেট করুন -</option>

                                                @foreach($occupations as $key => $value)
                                                    <option {{ old('occupation') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                @endforeach

                                            </select>

                                            @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="minor_girl_count" class="col-form-label">অপ্রাপ্ত বয়স্ক মেয়ের সংখ্যা <small>(১৮ এর নিচে)</small></label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('minor_girl_count') is-invalid @enderror" name="minor_girl_count" value="{{ old('minor_girl_count') }}" id="minor_girl_count" >
                                            @error('minor_girl_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="adult_girl_count" class="col-form-label">প্রাপ্তবয়স্ক মেয়ের সংখ্যা <small>(১৮ এর উর্দ্ধে)</small></label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('adult_girl_count') is-invalid @enderror" name="adult_girl_count" value="{{ old('adult_girl_count') }}" id="adult_girl_count">
                                            @error('adult_girl_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="minor_boy_count" class="col-form-label">অপ্রাপ্ত বয়স্ক ছেলের সংখ্যা <small>(২১ এর নিচে)</small></label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('minor_boy_count') is-invalid @enderror" name="minor_boy_count" value="{{ old('minor_boy_count') }}" id="minor_boy_count" >
                                            @error('minor_boy_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="adult_boy_count" class="col-form-label">প্রাপ্ত বয়স্ক ছেলের সংখ্যা <small>(২১ এর ঊর্ধ্বে)</small></label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('adult_boy_count') is-invalid @enderror" name="adult_boy_count" value="{{ old('adult_boy_count') }}" id="adult_boy_count" >
                                            @error('adult_boy_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="count_of_member" class="col-form-label">মোট সদস্য</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('count_of_member') is-invalid @enderror" required name="count_of_member" value="{{ old('count_of_member') }}" id="count_of_member">
                                            @error('count_of_member')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="nid_number" class="col-form-label">জাতীয় পরিচয় পত্র নং</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('nid_number') is-invalid @enderror" name="nid_number" value="{{ old('nid_number') }}" id="nid_number">
                                            @error('nid_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="mobile" class="col-form-label">মোবাইল নং</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" id="mobile">
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="word_number" class="col-form-label">ওয়ার্ড নাম্বার</label>
                                        <div>
                                            <select class="select2-single form-control" name="word_number" required onchange="getVillages(this)">
                                                <option value="">- সেট করুন -</option>

                                                @foreach($wordNumbers as $key => $value)
                                                    <option {{ old('word_number') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                @endforeach


                                            </select>

                                            @error('word_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="village" class="col-form-label">গ্রাম</label>
                                        <div>
                                            <select class="select2-single form-control" name="village" required id="village">
                                                <option value="">- সেট করুন -</option>

                                            </select>

                                            @error('village')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="mobile" class="col-form-label">বই নং</label>
                                        <div>
                                            <input type="number" class="form-control form-control-sm @error('book_no') is-invalid @enderror" name="book_no" value="{{ old('book_no') }}" id="book_no">
                                            @error('book_no')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">সানিটেশন</label>
                                        <div>

                                            <label><input type="radio" name="sanitation" value="1" {{ old('sanitation') == 1 ? 'checked' : '' }} required> পাকা</label>
                                            &nbsp;&nbsp;
                                            <label><input type="radio" name="sanitation" value="2" {{ old('sanitation') == 2 ? 'checked' : '' }} required> কাঁচা</label>


                                            @error('sanitation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-12 col-md-10 offset-md-1">

                                    <table id="myTable" class="table table-bordered edu1">

                                        <tr>
                                            <th class="bg-gray">ক্রমিক নং</th>
                                            <th class="text-center bg-gray">বৎছর - থেকে - বৎছর</th>
                                            <th class="bg-gray">ধার্যকৃত ট্যাক্স</th>
                                            <th class="bg-gray"></th>
                                        </tr>
                                        <tr>
                                            <td class="serial">1</td>
                                            <td>
                                                <div class="input-daterange input-group">
                                                    <input type="text" class="form-control input-sm date-range" name="from_year[]" required>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">হইতে</span>
                                                    </div>
                                                    <input type="text" class="form-control input-sm date-range" name="to_year[]" required>
                                                </div>
                                            </td>
                                            <td><input type="number" class="form-control" name="amount_of_tax[]" required></td>
                                            <td>
                                                <button type="button" class="ibtnDel btn btn-sm btn-danger" disabled><i class="fa fa-times-circle"></i></button>
                                            </td>
                                        </tr>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">
                                                <button class="btn btn-sm btn-dark" id="add" type="button"><i class="fa fa-plus"></i> আরো অ্যাড করুন</button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="btn-group float-right">
                                        <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!--Row-->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $("#add").on("click", function () {
                var newRow = $("<tr id='tax_amount'>");
                var cols = "";
                cols += '<td class="serial"></td>';
                cols += '<td><div class="input-daterange input-group">\n' +
                    '        <input type="text" class="form-control input-sm date-range" name="from_year[]" required>\n' +
                    '        <div class="input-group-prepend">\n' +
                    '            <span class="input-group-text">হইতে</span>\n' +
                    '        </div>\n' +
                    '        <input type="text" class="form-control input-sm date-range" name="to_year[]" required>\n' +
                    '    </div></td>';
                cols += '<td><input type="number" class="form-control" name="amount_of_tax[]" required ></td>';
                cols += '<td><button type="button" class="ibtnDel btn btn-sm btn-danger"><i class="fa fa-times-circle"></i></button></td>';
                newRow.append(cols);
                $("table.edu1").append(newRow);

                getSerial();

                $('.date-range').datepicker({
                    minViewMode: 2,
                    format: 'yyyy',
                    autoclose:true
                });
            });



            $("table.edu1").on("click", ".ibtnDel", function (event) {
                $(this).closest("tr").remove();
                getSerial();
            });


        });

        function getSerial(){
            $(".serial").each(function (index){
                $(this).text(index+1)
            })
        }


        $('.date-range').datepicker({
            minViewMode: 2,
            format: 'yyyy',
            autoclose:true
        });

    </script>
@endsection
