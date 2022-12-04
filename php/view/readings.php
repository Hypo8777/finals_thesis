<?php

require_once "../model/database.php";


date_default_timezone_set('Asia/Manila');

class readings extends DBConn
{
    public function getReadingsByDate($date, $device)
    {
        $conn = parent::set_connection();
        $query_readings_by_date = "SELECT * FROM readings_v WHERE device = '$device' AND date_entry = '$date' ORDER BY time_entry ASC";
        $_readings_by_date = $conn->query($query_readings_by_date);
        $sensor_data = "";
        $time_entry = "";
        foreach ($_readings_by_date->fetchAll() as $rows) {
            $sensor_data .= $rows->sensor_data . ",";
            $time_entry .= $rows->time_entry . ",";
        }
        echo json_encode([
            'sensor_data' => $sensor_data,
            'time_entry' => $time_entry,
        ]);
    }
    public function getReadingsByTime(
        $date,
        $device,
        $from,
        $to
    ) {
        $conn = parent::set_connection();
        $query_readings_by_time = "SELECT * FROM readings_v WHERE device = '$device' AND date_entry = '$date' AND time_entry BETWEEN TIME_FORMAT('$from','%r') AND TIME_FORMAT('$to','%r') ORDER BY time_entry ASC";
        $_readings_by_time = $conn->query($query_readings_by_time);
        $sensor_data = "";
        $time_entry = "";
        foreach ($_readings_by_time->fetchAll() as $rows) {
            $sensor_data .= $rows->sensor_data . ",";
            $time_entry .= $rows->time_entry . ",";
        }
        echo json_encode([
            'sensor_data' => $sensor_data,
            'time_entry' => $time_entry
        ]);
    }
    public function getLiveReadings($date, $device)
    {
        $conn = parent::set_connection();
        $query_live_readings = "SELECT * FROM readings_live_v WHERE device = '$device' AND date_entry = '$date' ORDER BY time_entry DESC LIMIT 20";
        $_live_readings = $conn->query($query_live_readings);
        $sensor_data = "";
        $time_entry = "";
        foreach ($_live_readings->fetchAll() as $rows) {
            $sensor_data .= $rows->sensor_data . ",";
            $time_entry .= $rows->time_entry . ",";
        }
        echo json_encode([
            'sensor_data' => $sensor_data,
            'time_entry' => $time_entry,
        ]);
    }
}



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $init = new readings;
    if (isset($_GET['get_readings_bydate'])) {
        $date = $_GET['date'];
        $device = $_GET['device'];
        $init->getReadingsByDate($date, $device);
    }
    if (isset($_GET['get_readings_bytime'])) {
        $date = $_GET['date'];
        $device = $_GET['device'];
        $from = $_GET['from'];
        $to = $_GET['to'];
        $init->getReadingsByTime(
            $date,
            $device,
            $from,
            $to
        );
    }
    if (isset($_GET['get_live_readings'])) {
        $date = date('Y-m-d');
        $device = $_GET['device'];
        $init->getLiveReadings($date, $device);
    }
} else {
    echo "Invalid Request";
}
