<?php
namespace Gnefiy\Utils;

class DateUtils
{
    public function test()
    {
        $monthDate = DateUtils::week_date(11);
        var_dump($monthDate);
    }

    public static function month_date($month, $year = null)
    {
        date_default_timezone_set('Asia/Shanghai');
        $time = time();
        if (is_null($year)) {
           $year = date('Y', $time);
        }

        $firstDayOfCurrentMonth = date('Y-m-01 00:00:00',$time);
        $diffMonth = $month - date('m',$time);
        $t = strtotime($firstDayOfCurrentMonth);
        $monthDate['start_time'] = strtotime("$diffMonth month", $t);
        $m = $diffMonth+1;
        $monthDate['end_time'] = strtotime("$m month", $t) - 1;
        $monthDate['start_date'] = date('Y-m-01 00:00:00', $monthDate['start_day_time']);
        $monthDate['end_date'] = date('Y-m-d 23:59:59', $monthDate['end_day_date']);
        $monthDate['month'] = $month;
        $monthDate['year'] = $year;

        return $monthDate;
    }

    public static function week_date($week, $year = null)
    {
        date_default_timezone_set('Asia/Shanghai');
        $week = (string)$week;
        if (is_null($year)) {
            $year = date('Y', time());
        } else {
            $year = (string)$year;
        }

        $thisWeek = date('W', time());
        $diffWeek = $week - $thisWeek;
        $diffYear = $year - date('Y', time());

        $date = new \DateTime();
        $date->modify("this year $diffYear years");
        $date->modify("this week $diffWeek weeks");
        $startDate = $date->format('Y-m-d 00:00:00');
        $date->modify("this week +6 days");
        $endDate = $date->format('Y-m-d 23:59:59');

        $weekTimes['start_time'] = strtotime($startDate);
        $weekTimes['end_time'] = strtotime($endDate);
        $weekTimes['start_date'] = $startDate;
        $weekTimes['end_date'] = $endDate;
        $weekTimes['week'] = $week;
        $weekTimes['year'] = $year;

        return $weekTimes;
    }
}
