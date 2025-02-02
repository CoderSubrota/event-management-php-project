
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once "./cdn.html";  ?> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
<?php 
session_start() ;
require_once "./navbar.php"; 

require_once "../back-end/config.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password']; 

    // Fetch user details
    $select = "SELECT email, user_password FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['user_password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $email;
            //redirect to dashboard
            header("Location: ./dashboard.php");  exit();
        } else {
            ?>
              <script>
                   Swal.fire({
                       title: "Login failed: Incorrect password",
                       icon: "info",
                       timer: 2500
                   });
                 </script>
            <?php
        }
    } else {
        ?>
        <script>
             Swal.fire({
                 title: "Login failed: Email not found",
                 icon: "warning",
                 timer: 2500
             });
           </script>
      <?php
    }
}

?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Login</h5>
                        
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required/>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                            </div>

                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

                               <div class="my-2 text-center">
                             <span>  Create new account ?   </span>   <a href="./register_page.php" > Register </a> 
                            </div>    
                               <div class="mb-2 text-center">
                             <span> Forgot password ?   </span>   <a href="./reset_password.php" > Reset </a> 
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "./footer.html"; ?>
</body>
</html>
