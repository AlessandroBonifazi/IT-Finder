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

        // reviews
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
        $generalMonths = array_unique(array_merge($months, $reviewMonths));

        $chartjs = app()
            ->chartjs->name("lineChartTest")
            ->type("bar")
            ->size(["width" => 500, "height" => 250])
            ->labels([...$generalMonths])
            ->datasets([
                [
                    "label" => "Messages",
                    "backgroundColor" => "#b2cac6",
                    "borderColor" => "#3d7068",
                    "pointBorderColor" => "#3d7068",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => $monthMessagesCount,
                ],
                [
                    "label" => "Reviews",
                    "backgroundColor" => "#ffe4b3",
                    "borderColor" => "#d99f35",
                    "pointBorderColor" => "#d99f35",
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

        // messages
        $queryData = $user
            ->messages()
            ->select("id", "created_at")
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format("Y");
            });
        $yearMessagesData = $queryData;

        // reviews
        $reviewQuery = $user
            ->reviews()
            ->select("id", "created_at")
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format("Y");
            });
        $yearReviewsData = $reviewQuery;

        $messagesYears = [];
        $reviewsYears = [];
        $yearMessagesCount = [];
        $yearReviewsCount = [];
        foreach ($yearMessagesData as $year => $messages) {
            $messagesYears[] = $year;
            $yearMessagesCount[] = count($messages);
        }
        foreach ($yearReviewsData as $year => $reviews) {
            $reviewsYears[] = $year;
            $yearReviewsCount[] = count($reviews);
        }
        $generalYears = array_unique(
            array_merge($messagesYears, $reviewsYears)
        );

        $chart2js = app()
            ->chartjs->name("barChartTest")
            ->type("bar")
            ->size(["width" => 400, "height" => 200])
            ->labels([...$generalYears])
            ->datasets([
                [
                    "label" => "Messages",
                    "backgroundColor" => "#b2cac6",
                    "borderColor" => "#3d7068",
                    "pointBorderColor" => "#3d7068",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [...$yearMessagesCount],
                ],
                [
                    "label" => "Reviews",
                    "backgroundColor" => "#ffe4b3",
                    "borderColor" => "#d99f35",
                    "pointBorderColor" => "#d99f35",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    "data" => [...$yearReviewsCount],
                ],
            ])
            ->options([
                "responsive" => true,
                "maintainAspectRatio" => false,
            ]);

        return view("auth.statistics", compact("chartjs", "chart2js", "user"));
    }
}
