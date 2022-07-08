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

use Illuminate\Support\Carbon;

class StatisticController extends Controller
{
    public function getStatistics(User $user)
    {
        $user = Auth::user();
        $messages = $user->messages->all();
        $reviews = $user->reviews->all();

        $monthsOfYear = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];

        // messages
        $queryData = $user
            ->messages()
            ->select("id", "created_at")
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format("M");
            });

        $reviewQuery = $user
            ->reviews()
            ->select("id", "created_at")
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format("M");
            });

        $data = $queryData;
        // dd($data);
        $reviewData = $reviewQuery;

        $months = [];
        $reviewMonths = [];
        $monthMessagesCount = [];
        $monthReviewsCount = [];
        foreach ($monthsOfYear as $month) {
            if (isset($data[$month])) {
                $months[] = $month;
                $monthMessagesCount[] = count($data[$month]);
            } else {
                $months[] = $month;
                $monthMessagesCount[] = 0;
            }
            if (isset($reviewData[$month])) {
                $months[] = $month;
                $monthReviewsCount[] = count($reviewData[$month]);
            } else {
                $months[] = $month;
                $monthReviewsCount[] = 0;
            }
        }
        // foreach ($data as $month => $values) {
        //     $months[] = $month;
        //     $monthMessagesCount[] = count($values);
        // }
        // foreach ($reviewData as $month => $values) {
        //     $reviewMonths[] = $month;
        //     // assign the count of messages to the month
        //     $monthReviewsCount[] = count($values);
        // }
        // dd($monthReviewsCount);

        // $valutation = Review::user();
        // $voto = $review -> all();

        // dd($valutation);
        // dd(count($reviews));

        // compare months and concatinate them
        // $months = array_unique(array_merge($months, $reviewMonths));

        $generalMonths = array_unique(array_merge($months, $reviewMonths));

        // dd($generalMonths);
        // $generalMonths = array_unique($generalMonths);

        // $generalMonths->unique();

        $chartjs = app()
            ->chartjs->name("lineChartTest")
            ->type("bar")
            ->size(["width" => 500, "height" => 250])
            ->labels([...$generalMonths])
            ->datasets([
                [
                    "label" => "Messages",
                    "backgroundColor" => "rgba(38, 185, 255, 0.31)",
                    "borderColor" => "rgba(38, 185, 0, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $monthMessagesCount,
                ],
                [
                    "label" => "Reviews",
                    "backgroundColor" => "rgba(38, 185, 154, 0.31)",
                    "borderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $monthReviewsCount,
                ],
            ])
            ->options([
                "responsive" => true,
                "maintainAspectRatio" => false,
            ]);

        $chart2js = app()
            ->chartjs->name("barChartTest")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->labels(["Label x", "Label y"])
            ->datasets([
                [
                    "label" => "Valutation",
                    "backgroundColor" => [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(54, 162, 235, 0.2)",
                    ],
                    "data" => [15, 85, 96, 35, 65],
                ],
                [
                    "label" => "My First dataset",
                    "backgroundColor" => [
                        "rgba(255, 99, 132, 0.3)",
                        "rgba(54, 162, 235, 0.3)",
                    ],
                    "data" => [65, 12],
                ],
            ])
            ->options([]);

        return view("auth.statistics", compact("chartjs", "chart2js", "user"));
    }
}
