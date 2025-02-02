<?php
require_once '../back-end/config.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("location: ./login_page.php");
    exit();
}
//get the user id
$select = "SELECT id, email FROM users WHERE email='" . $_SESSION['email'] . "'";
$query = mysqli_query($connection, $select);
$row = mysqli_fetch_assoc($query);
$user_id = $row['id'];
$events=[] ;

if (isset($_SESSION['email']) && $_SESSION['email'] == "subrota12@gmail.com") {
    $get_events = "SELECT * FROM events  ORDER BY date ASC ";
    $result = mysqli_query($connection, $get_events);   
    $events = $result;
}else{
    $get_events = "SELECT * FROM events WHERE created_by='$user_id' ORDER BY date ASC ";
    $result = mysqli_query($connection, $get_events);
    $events = $result;
}

require_once "../back-end/download_attendees.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Dashboard</title>

</head>

<body id="body">
    <?php
    require_once "./navbar.php";
    if (isset($_SESSION['email'])) {
        ?>

        <div class="container mt-5">
            <h1 class="text-center mb-4 text-primary">Event Dashboard</h1>

            <?php
            $row_count = mysqli_num_rows($events);
            if ($row_count > 0) {

                if (isset($_SESSION['message']) && $_SESSION['message'] != "") {
                    ?>
                    <script>
                        Swal.fire({
                            title: "<?php echo $_SESSION['message'] ?>",
                            icon: "success",
                            timer: 3000
                        });
                    </script>;
                <?php
                }

                if (isset($_SESSION['message'])) {
                    $_SESSION['message'] = "";
                }

                ?>
                <div class="flex justify-content-around flex-row">
                    <a href="./create_event_page.php" class="btn btn-success mb-3">Create Event <i
                            class="fa-solid fa-arrow-right"></i></a>
                    <a href="./add_participant.php" class="btn btn-primary mb-3">Add participant <i
                            class="fa-solid fa-arrow-right"></i> </a>
                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['email'] == "subrota12@gmail.com") {
                        echo ' <a href="./show_users.php" class="btn btn-success mb-3">Show users <i class="fa-solid fa-arrow-right"></i> </a> ';
                    }
                    ?>
                </div>

                <table id="eventsTable" class="table table-bordered mb-1 table-hover display text-center  table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Max Capacity</th>
                            <th> Edit </th>
                            <th> Delete </th>
                            <?php if (isset($_SESSION['email']) && $_SESSION['email'] == "subrota12@gmail.com") {

                                echo "<th> Download participant </th>";
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial = 0;
                        foreach ($events as $event):
                            $serial += 1;
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($serial) ?></td>
                                <td><?= htmlspecialchars($event['name']) ?></td>
                                <td><?= htmlspecialchars($event['description']) ?></td>
                                <td><?= htmlspecialchars($event['date']) ?></td>
                                <td><?= htmlspecialchars($event['max_capacity']) ?></td>
                                <td> <a href="./update-event.php?event_id=<?php echo $event['id']; ?>"> <i
                                            class="fa-solid fa-edit text-success"></i> </a> </td>
                                <td> <a href="../back-end/delete_event.php?event_id=<?php echo $event['id']; ?>"
                                        onclick="return confirm('Are you want to delete this data ?')"> <i
                                            class="fa-solid fa-trash text-danger"></i> </a> </td>
                                <?php if (isset($_SESSION['email']) && $_SESSION['email'] == "subrota12@gmail.com") {
                                  ?>
                                    <td> <a href="./dashboard.php?event_id=<?php echo $event['id']; ?>"> <i
                                                class="fa-solid fa-download text-primary"></i> </a> </td>

                                <?php } ?>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php
            } else {
                ?>
            <p class='text-danger fw-bold text-center my-5 fs-2'> Events data not found </p> ;
            <a href="./create_event_page.php" class="btn btn-success mb-3">Create Event</a>


        <?php
            }
            require_once "./footer.html";

            ?>

        <script>
            $(document).ready(function () {
                $('#eventsTable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true
                });
            });
        </script>

        <?php
    } else {
        header("location:./login_page.php");
    }
    ?>
</body>

</html>