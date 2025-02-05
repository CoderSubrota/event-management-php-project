<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Events</title>
</head>

<body>
    <?php

    session_start();
    require_once "./navbar.php";
    require_once '../back-end/config.php';

    $result = [];
    $flag = false;
    if (isset($_REQUEST['search_participant'])) {
        $searchValue = $_REQUEST['search'];
        $getEvents = "SELECT * FROM participants WHERE full_name LIKE '%$searchValue%'";
        $result = mysqli_query($connection, $getEvents);
        $flag=true ;
    }

    ?>

    <!-- Search Event Section -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2 class="text-center fs-2 fw-bold my-5">Search Participants</h2>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" class="input-group flex-nowrap" method="post">
                <input type="search" class="form-control" name="search"
                    placeholder="Search participant using name like (Subrota)" aria-label="Username"
                    aria-describedby="addon-wrapping">
                <button class="btn btn-primary px-3" type="submit" name="search_participant" id="addon-wrapping">
                    <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>


            <div class="searched_events" style="height:50%;">

                <div class="container mx-auto">
                    <div class="row">
                      <?php
                     if ($flag  === true) {
                          $row_count = mysqli_num_rows($result);
                           if ($row_count > 0) {
                              while ($event = mysqli_fetch_array($result)) {
                                ?>
                                <div class="col-sm-12 col-md-6 col-lg-4 my-1 px-3 pt-3">
                                    <div class="h-fit p-3 pt-5 rounded shadow-lg mt-3" style="width: 20rem; height:14rem;">
                                        <h5 class="text-primary">Full name:<?php echo $event['full_name']; ?></h5>
                                        <p class="text-primary  fs-6">Email:<?php echo $event['email']; ?></p>
                                        <h5 class="text-primary">Event id:<?php echo $event['event_id']; ?></h5>
                                    </div>
                                </div>
                                <?php
                            }
                        }else {
                            echo "<h2 class='fs-1 fw-bold text-center text-info my-5'> Search data not found !! </h2>";
                        }
                        } else{
                            echo "<h2 class='fs-1 fw-bold text-center text-info my-5'> Search your user like  using b letter or h </h2>";

                        }
                        ?>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php require "./footer.html"; ?>

</body>

</html>