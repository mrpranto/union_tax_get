@extends('layouts.master')
@section('title', 'Dashboard')
@push('css')
    <style>
        body {
            background-color: #f9f9fa
        }

        .flex {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto
        }

        @media (max-width:991.98px) {
            .padding {
                padding: 1.5rem
            }
        }

        @media (max-width:767.98px) {
            .padding {
                padding: 1rem
            }
        }

        .padding {
            padding: 5rem
        }

        .card {
            background: #fff;
            border-width: 0;
            border-radius: .25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            margin-bottom: 1.5rem
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(19, 24, 44, .125);
            border-radius: .25rem
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(19, 24, 44, .03);
            border-bottom: 1px solid rgba(19, 24, 44, .125)
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        card-footer,
        .card-header {
            background-color: transparent;
            border-color: rgba(160, 175, 185, .15);
            background-clip: padding-box
        }
    </style>
@endpush
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
                <div class="col-sm-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary text-center">
                                {{ $word_number->name }} ওয়ার্ড টাক্স গ্রহন
                            </h6>
                        </div>
                        <div class="card-body">

                            <div class="chart-pie">
                                <canvas id="myPieChart_{{ $word_number->id }}" width="300" height="150" class="chartjs-render-monitor"
                                        style="display: block; width: 303px; height: 253px;"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">বাৎসরিক ট্যাক্স গ্রহন</h6>
                    </div>
                    <div class="card-body">
                        <div id="columnChart" style="height: 360px; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Row-->
    </div>
@endsection

@push('js')

    <script src="{{ asset('assets/js/demo/chart-bar-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/canvasjs.js') }}"></script>

    <script>

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["মোট টাক্স রেজিস্টার", "ট্যাক্স গ্রহন"],
                datasets: [{
                    data: [{{ $total_register_amount }}, {{ $total_tax_get }}],
                    backgroundColor: ['#4e73df', '#26a074', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
        });

        @foreach($word_numbers as $key => $word_number)
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
        })
        @endforeach


    </script>

    <script type="text/javascript">

        var columnChartValues = [

                @foreach($tax_year as $key => $year)
                @php

                $totalTaxAmount = \App\TaxGet::query()
                                    ->where('from', $year->from)
                                    ->where('to', $year->to)
                                    ->sum('tax_amount');

                @endphp

            {
                {{--y: {{ rand(100, 600) }},--}}
                y: {{ $totalTaxAmount }},

                label: {{ $year->from }} ,

                @if(($key+1) % 2 == 0)

                color: "#2E59D9",

                @else

                color: "#17A673",

                @endif
            },

            @endforeach
        ];

        renderColumnChart(columnChartValues);

        function renderColumnChart(values) {

            var chart = new CanvasJS.Chart("columnChart", {
                backgroundColor: "white",
                colorSet: "colorSet3",
                title: {
                    fontFamily: "Arial",
                    fontSize: 25,
                    fontWeight: "normal",
                },
                animationEnabled: true,
                legend: {
                    verticalAlign: "bottom",
                    horizontalAlign: "center"
                },
                theme: "theme2",
                data: [

                    {
                        indexLabelFontSize: 15,
                        indexLabelFontFamily: "Monospace",
                        indexLabelFontColor: "darkgrey",
                        indexLabelLineColor: "darkgrey",
                        indexLabelPlacement: "outside",
                        type: "column",
                        showInLegend: false,
                        legendMarkerColor: "grey",
                        dataPoints: values
                    }
                ]
            });

            chart.render();
        }
    </script>

@endpush
