@extends('layouts.master')
@section('title', 'Members')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800"> <i class="fa fa-list-alt"></i> রেজিস্টার তালিকা</h4>
        </div>

        <div class="row mb-3">

            <div class="col-sm-12 col-md-12">


                @include('partials.alert')



                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ক্রমিক নং</th>
                                    <th>মালিকের নাম</th>
                                    <th>পিতার নাম</th>
                                    <th>হোল্ডিং নং</th>
                                    <th>পেশা</th>
                                    <th>ধার্যকৃত ট্যাক্স</th>
                                    <th>মোট সদস্য</th>
                                    <th>মোবাইল নং</th>
                                    <th>অ্যাকশান</th>
                                </tr>

                                @forelse($taxRegisters as $key => $taxRegister)
                                    <tr>
                                        <td>{{ $taxRegisters->firstItem() + $key }}</td>
                                        <td>{{ $taxRegister->name }}</td>
                                        <td>{{ $taxRegister->father_name }}</td>
                                        <td>{{ $taxRegister->holding_no }}</td>
                                        <td>{{ $taxRegister->occupation->name }}</td>
                                        <td>{{ $taxRegister->amount_of_tax }}</td>
                                        <td>{{ $taxRegister->count_of_member }}</td>
                                        <td>{{ $taxRegister->mobile }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tax-register.edit', $taxRegister->id) }}" class="btn btn-sm btn-outline-dark">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <button class="btn btn-sm btn-dark" onclick="deleteCheck({{ $taxRegister->id }})">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </div>

                                            <form action="{{ route('tax-register.destroy', $taxRegister->id) }}" method="post" id="deleteForm_{{ $taxRegister->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="9">No Data Found.</td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $taxRegisters->links() }}
                    </div>
                </div>
            </div>

        </div>

        <!--Row-->
    </div>
@endsection
