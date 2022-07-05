@extends('layouts.app')

@section('content')
    <h2>Prova e inserimento grafico</h2>

    <div style="width:75%;">
        {!! $chartjs->render() !!}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- GRAFICO STANDARD OF CHARTJS - DON'T WORK --}}

    {{-- <canvas id="myChart" width="600" height="400"></canvas> --}}
@endsection
