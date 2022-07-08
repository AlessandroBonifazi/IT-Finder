@extends('layouts.app')

@section('content')
    <h2 style="text-align:center; margin-top: 15px;">Statistics Messages/Reviews</h2>

    <div style="width:50%; margin:auto; margin-top: 15px;">
        {!! $chartjs->render() !!}
    </div>

    <h2 style="text-align:center; margin-top: 15px;">Statistics Valutation</h2>

    <div style="width:50%; margin:auto; margin-top: 15px;">
        {!! $chart2js->render() !!}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
