<?php
session_start() ;
require_once "./config.php" ;

if(isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'] ;
    $delete_event = "DELETE FROM events WHERE id=$event_id" ;
    $result = mysqli_query($connection, $delete_event) ;
    if($result==true){
    $_SESSION['message'] = "Event deleted successfully !!" ;
    header("location:../front-end/dashboard.php") ;
    }
}

?>