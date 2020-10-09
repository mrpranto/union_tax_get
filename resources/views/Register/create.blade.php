@extends('layouts.master')
@section('title', 'Members')
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
                                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name">
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
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="fathers_name" id="fathers_name" >
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
                                            <input type="text" class="form-control form-control-sm @error('holding_number') is-invalid @enderror" name="holding_number" id="holding_number" >
                                            @error('holding_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="house_model" class="col-form-label">প্রকৃত ঘরের বর্ণনা</label>
                                        <div>
                                            <select class="select2-single form-control" name="house_model" id="house_model">
                                                <option value="" selected disabled>- সেট করুন -</option>

                                                @foreach($houseModels as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach

                                            </select>

                                            @error('house_model')
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
                                            <input type="text" class="form-control form-control-sm @error('amount_of_land') is-invalid @enderror" name="amount_of_land" id="amount_of_land" >
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
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="house_and_land_rate" id="house_and_land_rate" >
                                            @error('house_and_land_rate')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="occupation" class="col-form-label">পেশা</label>
                                        <div>

                                            <select name="occupation" class="select2-single form-control" id="occupation">
                                                <option value="">- সেট করুন -</option>

                                                @foreach($occupations as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
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
                                        <label for="amount_of_tax" class="col-form-label">ধার্যকৃত ট্যাক্স</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="amount_of_tax" id="amount_of_tax" >
                                            @error('amount_of_tax')
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
                                            <input type="text" class="form-control form-control-sm @error('minor_girl_count') is-invalid @enderror" name="minor_girl_count" id="minor_girl_count" >
                                            @error('minor_girl_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="adult_girl_count" class="col-form-label">প্রাপ্তবয়স্ক মেয়ের সংখ্যা <small>(১৮ এর উর্দ্ধে)</small></label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('adult_girl_count') is-invalid @enderror" name="adult_girl_count" id="adult_girl_count">
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
                                            <input type="text" class="form-control form-control-sm @error('minor_boy_count') is-invalid @enderror" name="minor_boy_count" id="minor_boy_count" >
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
                                            <input type="text" class="form-control form-control-sm @error('adult_boy_count') is-invalid @enderror" name="adult_boy_count" id="adult_boy_count" >
                                            @error('adult_boy_count')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="count_of_member" class="col-form-label">মোট সদস্য</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('count_of_member') is-invalid @enderror" name="count_of_member" id="count_of_member">
                                            @error('count_of_member')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="mobile" class=col-form-label">মোবাইল নং</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('mobile') is-invalid @enderror" name="mobile" id="mobile" >
                                            @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="nid_number" class="col-form-label">জাতীয় পরিচয় পত্র নং</label>
                                        <div>
                                            <input type="text" class="form-control form-control-sm @error('nid_number') is-invalid @enderror" name="nid_number" id="nid_number">
                                            @error('nid_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">সানিটেশন</label>
                                        <div>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="sanitation" value="1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">পাকা </label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="customRadio1" name="sanitation" value="2" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">কাঁচা </label>
                                            </div>


                                            @error('sanitation')
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
                                            <select class="select2-single form-control" name="word_number" onchange="getVillages(this)">
                                                <option value="">- সেট করুন -</option>

                                                @foreach($wordNumbers as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
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
                                            <select class="select2-single form-control" name="village" id="village">
                                                <option value="">- সেট করুন -</option>

                                            </select>

                                            @error('village')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save"></i> Save</button>
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
