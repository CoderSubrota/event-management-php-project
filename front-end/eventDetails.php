<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "./cdn.html" ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event details</title>
</head>
<body>
<?php 
session_start() ;
require_once "./navbar.php" ;
require_once "../back-end/config.php" ;

if(isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'] ;
    $select = "SELECT name,date,description,max_capacity FROM events WHERE id=$event_id";
    $result=mysqli_query($connection,$select);
    $row = mysqli_fetch_assoc($result) ;
    ?>
<div class="card mx-auto my-5 fw-bold" style="width: 32rem;">
  <img src="https://i.ibb.co.com/bMhfrPdY/Restaurant-Branding.jpg" class="card-img-top" style="height:20rem;"  alt="event image">
  <div class="card-body">
    <p class="card-text">Event name:  <?php echo $row['name']; ?>   </p>
    <p class="card-text"> Capacity: <?php echo $row['max_capacity']; ?> </p>
    <p class="card-text"> Date: <?php echo $row['date']; ?> </p>
    <p class="card-text">Description: <?php echo $row['description']; ?> </p>
    <a href="./search_events.php" class="btn btn-primary px-3 my-2"> <i class="fa-solid fa-arrow-left"></i> Go Back </a>
  </div>
</div>

<?php
}

require_once "./footer.html" ;

?>
</body>
</html>