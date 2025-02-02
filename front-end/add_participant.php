<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html" ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add participant </title>
</head>

<body id="body">

<?php
    session_start() ;
    if(!isset($_SESSION['email'])) {
        header("location:./login_page.php") ;
    }
    require_once "./navbar.php";
    require_once "../back-end/config.php";

    if (isset($_POST['add_participant'])) {
        $full_name =  mysqli_real_escape_string($connection, $_POST['full_name']);
        $email =  mysqli_real_escape_string($connection,$_POST['email']);
        $event_id =  mysqli_real_escape_string($connection,$_POST['event_id']);
        //get user id from file
         require_once "../back-end/get_user_id.php" ;

        //check event max 
        $get_event = "SELECT * FROM events WHERE id='$event_id'";
        $get_events = mysqli_query($connection, $get_event);
        $row = mysqli_fetch_assoc($get_events);
        $max_capacity = $row['max_capacity'];
        // check participant for event
        $get_participant = "SELECT * FROM participants WHERE event_id='$event_id'";
        $participants = mysqli_query($connection, $get_participant);
        $participants_row = mysqli_num_rows($participants);
        //Is  participants data are empty
        if ($participants_row  == 0 ) {
            $insert = "INSERT INTO participants(full_name, email,event_id) VALUES ('$full_name', '$email', '$event_id')";
            $insertParticipant = mysqli_query($connection, $insert);
            if ($insertParticipant) {
              // insert data to attendees
              $insert_attendees = "INSERT INTO attendees(event_id,user_id) VALUES('$event_id','$user_id')";
              $result = mysqli_query($connection, $insert_attendees);

                header("location: ./dashboard.php");
                $_SESSION["message"] = "Participant added successfully !!";
                exit(); 
            }
        }
        //check the event capacity
        if (intval($max_capacity) > intval($participants_row)) {
            $insert = "INSERT INTO participants(full_name, email,event_id) VALUES ('$full_name', '$email', '$event_id')";
            $insertParticipant = mysqli_query($connection, $insert);
            if ($insertParticipant) {
             // insert data to attendees
              $insert_attendees = "INSERT INTO attendees(event_id,user_id) VALUES('$event_id','$user_id')";
              $result = mysqli_query($connection, $insert_attendees);
                header("location: ./dashboard.php");
                $_SESSION['message'] = "Participant added successfully !!";
                exit(); 
            } else {
                ?>
                <script>
                    Swal.fire({
                        title: "<?php  echo "Error: " . mysqli_error($connection); ?>",
                        icon: "warning",
                        timer: 2500
                    });
                </script>
                <?php
            } 

        } else {
            echo '<script>
                        Swal.fire({
                        title: "Maximum capacity full for this event",
                        icon: "info",
                        timer: 3500
                       });
                 </script>';
         }

        }
    ?>

    <br>
      
<div class="container mt-2">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
          class="was-validated mx-auto shadow-lg p-4 bg-body-tertiary rounded" style="max-width: 500px;">

        <h3 class="text-primary text-center mb-3">Add Participant</h3>

        <div class="mb-3">
            <input type="text" name="full_name" placeholder="Enter your full name" class="form-control" required />
            <div class="invalid-feedback">Enter your real name</div>
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="mb-3">
            <input type="email" name="email" placeholder="Enter your email" class="form-control" required />
            <div class="invalid-feedback">Enter a valid email</div>
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="mb-3">
            <select name="event_id" class="form-control" id="event_id" required>
                <option value="" disabled selected>Select an event from here</option>
                <?php
                //get user id from file
                require_once "../back-end/get_user_id.php" ;
                $select_events = "SELECT * FROM events WHERE created_by='$user_id'";
                $get_events = mysqli_query($connection, $select_events);
                while ($row = mysqli_fetch_array($get_events)) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                ?>
            </select>
            <div class="invalid-feedback">Select an event</div>
            <div class="valid-feedback">Event selected</div>
        </div>

        <button type="submit" name="add_participant" class="btn btn-primary w-100">Save</button>

    </form>
</div>

    <br><br>
    <?php require_once "./footer.html"; ?>
</body>

</html>