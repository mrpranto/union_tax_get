@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0 text-gray-800">Dashboard</h4>
        </div>

        <div class="row mb-3">

            @forelse($word_numbers as $key => $word_number)

                <div class="col-xl-2 col-md-2 mb-4 text-center">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-center">ওয়ার্ড নাম্বার
                                        : {{ $word_number->name }}</div>
                                    <div class="mt-2 mb-0 text-muted text-xs text-center">
                                        <a href="{{ route('tax-register.index') }}?word-number={{ $word_number->id }}"
                                           class="text-decoration-none">
                                            <div
                                                class="h5 mb-0 font-weight-bold text-gray-800">{{ enToBnNumber(count($word_numbers)) }}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty


                <div class="col-sm-12">
                    <div class="alert alert-dark">
                        ওয়ার্ড নাম্বার এখন সংরক্ষণ করা হই নাই।
                    </div>
                </div>

            @endforelse

        </div>

        <div class="row mb-3">

            <div class="col-sm-4 offset-sm-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center"> মোট টাক্স গ্রহন রেজিস্টার</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie">
                            <canvas id="myPieChart" width="300" height="150" class="chartjs-render-monitor"
                                    style="display: block; width: 303px; height: 253px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row mb-3">

            @foreach($word_numbers as $key => $word_number)

{{--                @if ($word_number->tax_registers_count > 0 || $word_number->tax_get_count > 0)--}}
                    <div class="col-sm-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary text-center">{{ $word_number->name }} ওয়ার্ড টাক্স গ্রহন </h6>
                            </div>
                            <div class="card-body">

                                <div class="chart-pie">
                                    <canvas id="myPieChart_{{ $word_number->id }}" width="300" height="150" class="chartjs-render-monitor"
                                            style="display: block; width: 303px; height: 253px;"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
{{--                @endif--}}
            @endforeach

        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">বাৎসরিক ট্যাক্স গ্রহন</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="myBarChart" width="670" height="320" class="chartjs-render-monitor" style="display: block; width: 670px; height: 320px;"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>


        <!--Row-->
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/js/demo/chart-bar-demo.js') }}"></script>

    <script>

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["মোট টাক্স রেজিস্টার", "ট্যাক্স গ্রহন"],
                datasets: [{
                    data: [{{ $total_register }}, {{ $total_tax_get }}],
                    backgroundColor: ['#4e73df', '#26a074', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
        });

        @foreach($word_numbers as $key => $word_number)

{{--        @if ($word_number->tax_registers_count > 0 || $word_number->tax_get_count > 0)--}}
        var ctx = document.getElementById("myPieChart_{{ $word_number->id }}");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["মোট টাক্স রেজিস্টার", "ট্যাক্স গ্রহন"],
                datasets: [{
                    data: [{{ $word_number->totalTax }}, {{ $word_number->taxGet }}],
                    backgroundColor: ['#4e73df', '#26a074', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
        });
{{--        @endif--}}
        @endforeach


        //Bar Chart

        // Bar Chart Example

        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June"],
                datasets: [{
                    label: "Revenue",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [4215, 5312, 6251, 7841, 9821, 14984],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 15000,
                            maxTicksLimit: 5,
                            padding: 5,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '$' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });



    </script>

@endpush
