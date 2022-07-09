@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="row align-content-stretch">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <div class="itf-card h-100">
                    <div class="itf-card-header">
                        <h2 class="itf-card-title">Messages and Reviews number per month</h2>
                    </div>
                    <div class="itf-card-body">
                        {!! $chartjs->render() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="itf-card h-100">
                    <div class="itf-card-header">
                        <h2 class="itf-card-title">Messages and Reviews number per month</h2>
                    </div>
                    <div class="itf-card-body">
                        {!! $chart2js->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
