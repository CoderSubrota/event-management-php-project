<?php

if (isset($_REQUEST['event_id'])) {
    $event_id = mysqli_real_escape_string($connection, $_REQUEST['event_id']);

    // Fetch attendee data with selected columns
    $query = "SELECT id, full_name, email FROM participants WHERE event_id = '$event_id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Set headers for CSV download
    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="event_attendees.csv"');

    $output = fopen('php://output', 'w');

    // Output CSV header
    fputcsv($output, ['ID', 'Name', 'Email']);

    // Output data rows
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit() ;

} 
?>
