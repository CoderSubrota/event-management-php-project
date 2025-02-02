
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once "./cdn.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
<?php 
session_start() ;
require_once "./navbar.php"; 
if(isset($_SESSION['email'])) {
?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Create Event</h5>

                        <form method="POST" action="../back-end/create_event.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Event Name</label>
                                <input type="text" class="form-control" id="name" name="event_name" placeholder="Event Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity</label>
                                <input type="number" class="form-control" id="max_capacity" name="max_capacity" placeholder="Max Capacity" required>
                            </div>
                            <button type="submit" name="event_save" class="btn btn-primary w-100  mb-2">Create Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    require_once "./footer.html" ;

    }else{
        header("location:./login_page.php") ;
    }
    ?>
    <!-- Bootstrap JS (Optional for advanced functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
