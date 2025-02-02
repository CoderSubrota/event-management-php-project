<?php
require_once './config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../front-end/login_page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($connection,$_POST['event_name']);
    $description = mysqli_real_escape_string($connection,$_POST['description']);
    $date = mysqli_real_escape_string($connection,$_POST['date']);
    $max_capacity = mysqli_real_escape_string($connection,$_POST['max_capacity']);
    //get user id from file
    require_once './get_user_id.php' ;
    $insert = "INSERT INTO events (name, description, date, max_capacity, created_by) VALUES ('$name','$description','$date','$max_capacity',' $user_id')";
    $result = mysqli_query($connection, $insert) ;
  
    if ($result==true) {
        $_SESSION['message'] = "Event ". $name ." added successfully!";
        header("location:../front-end/dashboard.php") ;
    } else {
        echo '<script>
           alert("Error: Could not create event.") ;
           window.location="../front-end/create_event_page.php";
      </script>';
    }
}
?>