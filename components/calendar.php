<?php
session_start();
use function PHPSTORM_META\type;

include("../include/header.php");
date_default_timezone_set('Asia/Manila');

$sr_code = $_SESSION['SRcode'];

//this function accepts the month and year in the url
function build_calendar($month, $year)
{

    $itemID = $_GET['itemID'];
    $itemName = $_GET['itemName'];
    $stock = $_GET['stock'];
    $size = $_GET['size'];
    $price = $_GET['price'];

    $dayOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    //get date today
    $dateToday = date('Y-m-d');

    //get unix code of date depends on the passed value in the url
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
    //echo $firstDayOfMonth.'<br>';

    //get month days total(t = 1-31)
    $numberDays = date('t', $firstDayOfMonth);
    //echo $numberDays.'<br>';

    //print date components 
    $dateComponents = getdate($firstDayOfMonth);
    //var_dump($dateComponents).'<br>';

    //print the month November
    $monthName = $dateComponents['month'];
    //var_dump( $monthName.'<br>');

    //print 3 int type 
    $daysOfWeek = $dateComponents['wday'];
    //echo $daysOfWeek.'<br>';


    $prev_month = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
    //echo $prev_month.'<br>';

    $prev_year = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
    //echo $prev_year.'<br>';

    $next_month = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
    // echo $next_month.'<br>';

    $next_year = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));
    // echo $next_year.'<br>';

    $calendar = "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class = 'btn btn-danger btn-xs' href='?month=" . $prev_month . "&year=" . $prev_year . "&itemID={$itemID}&itemName={$itemName}&stock={$stock}&size={$size}&price={$price}'>Prev Month</a>";
    $calendar .= "<a class='btn btn-primary btn-xs mx-2' href='?month=" . date('m') . "&year" . date('Y') . "&itemID={$itemID}&itemName={$itemName}&stock={$stock}&size={$size}&price={$price}'>Current Month</a>";
    $calendar .= "<a class = 'btn btn-success btn-xs' href='?month=" . $next_month . "&year=" . $next_year . "&itemID={$itemID}&itemName={$itemName}&stock={$stock}&size={$size}&price={$price}'>Next Month</a></center><br>";
    $calendar .= "<table class='table table-bordered thead-secondary'>";
    $calendar .= "<tr>";
    foreach ($dayOfWeek as $day) {
        $calendar .= "<th class= 'header table-secondary'>$day</th>";
    }
    $calendar .= "</tr><tr>";
    $currentDay = 1;
    if ($daysOfWeek > 0) {
        for ($k = 0; $k < $daysOfWeek; $k++) {
            $calendar .= "<td class = 'empty'></td>";
        }
    }

    while ($currentDay <= $numberDays) {
        if ($daysOfWeek == 7) {
            $daysOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        //prints 01-31
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        // echo $currentDayRel.'<br>';


        //prints out 2023-11-03
        $date = "$year-$month-$currentDayRel";
        // echo $date.'<br>';

        //use this for comparison later //prints 24789273492809
        $dateParse = strtotime($date);
        // echo $dateParse.'<br>';

        //sample is thursday
        $dayName = strtolower(date("l", strtotime($date)));
        //date('',strtotime($date)); === where i should extrract datas from the date string
        //echo $dayName.'<br>';

        //this is the display per date and i need to put the datas and status here for slot availability
        $today = $date == date('Y-m-d') ? 'today' : " ";
        $calendar .= "<td class = '$today'><h3>$currentDayRel</h3><a class ='btn btn-danger btn-xs' href = 'reservationForm_Stud.php?date={$date}&itemID={$itemID}&itemName={$itemName}&stock={$stock}&size={$size}&price={$price}'>Reserve</a></td>";
        $currentDay++;
        $daysOfWeek++;
    }

    if ($daysOfWeek < 7) {
        $remainingDays = 7 - $daysOfWeek;
        for ($i = 0; $i < $remainingDays; $i++) {
            $calendar .= "<td class = 'empty'></td>";
        }
    }
    $calendar .= "</tr></table>";

    return $calendar;




}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Calendar</title>
    <style>
        @media only screen and(max-width:760px),
        (min-device-width:802px) and (max-dvice-width:1020px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            .empty {
                display: none;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;

            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:nth-of-type(1):before {
                content: "Sunday";
            }

            td:nth-of-type(2):before {
                content: "Monday";
            }

            td:nth-of-type(3):before {
                content: "Tuesday";
            }

            td:nth-of-type(4):before {
                content: "Wednesday";
            }

            td:nth-of-type(5):before {
                content: "Thursday";
            }

            td:nth-of-type(6):before {
                content: "Friday";
            }

            td:nth-of-type(7):before {
                content: "Saturday";
            }
        }

        @media only screen and(min-device-width:320px) and (max-device-width:480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        @media only screen and (min-devicew-width:802px) and (max-device-width:1020px) {
            body {
                width: 495px;
            }
        }

        @media(min-width:641px) {
            table {
                table-layout: fixed;

            }

            td {
                width: 33%;
            }
        }

        .row {
            margin-top: 20px;

        }

        .today {
            background: yellow;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }

                echo build_calendar($month, $year);
                ?>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center pt-1 pb-3">
            <a href="studHome.php" class="btn btn-danger m-2" id="cancel" name="cancel">Cancel</a>
        </div>
    </div>
</body>

</html>