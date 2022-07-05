<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

        // dd(count($messages));

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 500, 'height' => 250])
        ->labels(['January','Febraury','January','January','January','January','January','January','January','January','January','January'])
        ->datasets([
            [
                "label" => "Messages",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [count($messages)],
            ],
            [
                "label" => "Reviews",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);

return view('auth.statistics', compact('chartjs','user'));
}
}
