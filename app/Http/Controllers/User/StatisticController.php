<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Review;

use App\User;
use App\Contact;
use App\Specialization;
use App\Message;

class StatisticController extends Controller
{
    public function getStatistics(User $user){
        $user = Auth::user();
        $messages = $user->messages->all();
        $reviews = $user->reviews->all();

        $countMessages = [];
        foreach($messages as $mess){
            $countMessages[]=$mess['messages'];
        };

        // $valutation = Review::user();
        // $voto = $review -> all();

        // dd($valutation);
        // dd(count($reviews));

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 500, 'height' => 250])
        ->labels(['January','Febraury','March','April','May','June','July','August','September','October','November','December'])
        ->datasets([
            [
                "label" => "Messages",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [count($countMessages)],
            ],
            [
                "label" => "Reviews",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [count($reviews)],
            ]
        ])
        ->options([]);

        $chart2js = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Label x', 'Label y'])
        ->datasets([
            [
                "label" => "Valutation",
                'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                'data' => [15,85,96,35,65]
            ],
            [
                "label" => "My First dataset",
                'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                'data' => [65, 12]
            ]
        ])
        ->options([]);


return view('auth.statistics', compact('chartjs','chart2js','user'));
}
}
