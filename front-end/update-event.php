<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['email'])) {
        header("location:./login_page.php") ;
    }
    require_once "./navbar.php";
    require_once "./cdn.html";
    require_once '../back-end/config.php';

    if (!isset($_SESSION['email'])) {
        header("location: ./login_page.php");
        exit;
    }
    $get_event_id = "";
    $event = [];

    //get data of the event 
    if (isset($_REQUEST['event_id'])) {
        $event_id = $_REQUEST['event_id'];
        $get_event_id = $event_id;
        $select = "SELECT * FROM events WHERE id='$event_id'";
        $query = mysqli_query($connection, $select);
        $row = mysqli_fetch_assoc($query);
        $event = $row;
    }

    //update event data 
    if (isset($_POST['event_save'])) {
        $name = $_POST['event_name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $max_capacity = $_POST['max_capacity'];
        $update_event = "UPDATE events SET name='$name' , description='$description', date='$date', max_capacity='$max_capacity' WHERE id=$get_event_id";
        $result = mysqli_query($connection, $update_event);

        if ($result == true) {
            header("location:./dashboard.php");
            $_SESSION['message'] = "Event ". $name ." updated successfully!";
        } else {
            echo '<script>
            Swal.fire({
                title: "Error: Event is not update",
                icon: "info",
                timer: 2500
            });
          </script>';
        }
    }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Edit Event</h5>

                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Event Name</label>

                                <input type="text" value="<?php echo $event['name']; ?>" class="form-control"
                                    id="name" name="event_name" placeholder="Event Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Description" required>
                                <?php echo $event['description']; ?>
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Event Date</label>
                                <input type="date" class="form-control" value="<?php echo $event['date']; ?>" id="date"
                                    name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity</label>
                                <input type="number" class="form-control" id="max_capacity"
                                    value="<?php echo $event['max_capacity']; ?>" name="max_capacity"
                                    placeholder="Max Capacity" required>
                            </div>
                            <button type="submit" name="event_save" class="btn btn-primary w-100">Save Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once "./footer.html";
    ?>

</body>

</html>