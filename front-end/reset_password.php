
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once "./cdn.html";  ?> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
</head>
<body>
<?php 
session_start() ;

require_once "../back-end/config.php";

if (isset($_POST['next'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
   
    // Fetch user details
    $select = "SELECT email, user_password FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email ;
        header("location:./set_password.php") ;
         
    } else {
        ?>
        <script>
             Swal.fire({
                 title: "Emil not found!!",
                 icon: "warning",
                 timer: 2500
             });
           </script>
      <?php
    }
}
require_once "./navbar.php" ;
?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Forgot Password</h5>
                        
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your valid email" required/>
                            </div>

                            <button type="submit" name="next" class="btn btn-primary w-100">Next</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php require_once "./footer.html" ; ?>
</body>
</html>
