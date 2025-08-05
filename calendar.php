<?php

$file = __DIR__ . '/events.json';
$eventsFromDB = [];

// Load Events
function loadEvents() {
    global $file;
    if (!file_exists($file)) return [];
    $json = file_get_contents($file);
    return json_decode($json, true) ?: [];
}

// Save Events
function saveEvents($events) {
    global $file;
    file_put_contents($file, json_encode($events, JSON_PRETTY_PRINT));
}

$events = loadEvents();

// ADD
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['action'] ?? '') === "add") {
    $course     = trim($_POST["course_name"] ?? '');
    $instructor = trim($_POST["instructor_name"] ?? '');
    $start      = $_POST["start_date"] ?? '';
    $end        = $_POST["end_date"] ?? '';
    $startTime  = $_POST["start_time"] ?? '';
    $endTime    = $_POST["end_time"] ?? '';

    if ($course && $instructor && $start && $end && $startTime && $endTime) {
        $events[] = [
            "id"              => uniqid(),
            "course_name"     => $course,
            "instructor_name" => $instructor,
            "start_date"      => $start,
            "end_date"        => $end,
            "start_time"      => $startTime,
            "end_time"        => $endTime
        ];
        saveEvents($events);
        $_SESSION["success"] = '1';
    } else {
        $_SESSION["error"] = '1';
    }

    header("Location: index.php");
    exit;
}

// EDIT
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['action'] ?? '') === "edit") {
    $id         = $_POST["event_id"] ?? '';
    $course     = trim($_POST["course_name"] ?? '');
    $instructor = trim($_POST["instructor_name"] ?? '');
    $start      = $_POST["start_date"] ?? '';
    $end        = $_POST["end_date"] ?? '';
    $startTime  = $_POST["start_time"] ?? '';
    $endTime    = $_POST["end_time"] ?? '';

    if ($id && $course && $instructor && $start && $end && $startTime && $endTime) {
        foreach ($events as &$event) {
            if ($event["id"] === $id) {
                $event["course_name"]     = $course;
                $event["instructor_name"] = $instructor;
                $event["start_date"]      = $start;
                $event["end_date"]        = $end;
                $event["start_time"]      = $startTime;
                $event["end_time"]        = $endTime;
                break;
            }
        }
        saveEvents($events);
        $_SESSION["success"] = '2';
    } else {
        $_SESSION["error"] = '2';
    }

    header("Location: index.php");
    exit;
}

// DELETE
if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST['action'] ?? '') === "delete") {
    $id = $_POST["event_id"] ?? '';
    if ($id) {
        $events = array_filter($events, fn($e) => $e["id"] !== $id);
        saveEvents($events);
        $_SESSION["success"] = '3';
    }
    header("Location: index.php");
    exit;
}

// Expand events for each day in date range
foreach ($events as $event) {
    $start = new DateTime($event["start_date"]);
    $end   = new DateTime($event["end_date"]);

    while ($start <= $end) {
        $eventsFromDB[] = [
            "id"              => $event["id"],
            "course_title"    => $event["course_name"],
            "instructor_name" => $event["instructor_name"],
            "start_date"      => $start->format("Y-m-d"),
            "end_date"        => $event["end_date"],
            "start_time"      => $event["start_time"],
            "end_time"        => $event["end_time"]
        ];
        $start->modify("+1 day");
    }
}
?>
