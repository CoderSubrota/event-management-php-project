<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
</head>

<body>

<?php
session_start() ;

require_once "../back-end/config.php";

    if (isset($_POST['reset'])) {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $hash_password = password_hash($password,PASSWORD_DEFAULT) ;

        // Regular expression for strong password validation
        $password_pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

        // Check if passwords match
        if ($password !== $confirm_password) {
            ?>
              <script>
                   Swal.fire({
                       title: "Error: Passwords do not match!",
                       icon: "info",
                       timer: 2500
                   });
                   setTimeout(() => {
                    window.location="./set_password.php" ;
                   }, 2500);
                 </script>;
            <?php 
        }
        // Check if password meets the strength criteria
        elseif (!preg_match($password_pattern, $password)) {
            ?>
             
             <script>
                   Swal.fire({
                       html: "<ul class='text-info fw-bold'> <li>Password must be at least 8 characters long</li><li>Include an uppercase letter</li><li>Include an lower letter</li><li>Include an lower number</li><li>Include an special character</li></ul>",
                       icon: "info",
                       timer: 4500
                   });
                   setTimeout(() => {
                    window.location="./set_password.php" ;
                   }, 4500);
                 </script>
            <?php
            exit() ;
        } else{
            
            $update_password = "UPDATE users SET user_password='$hash_password' WHERE email='" . $_SESSION['email'] . "'";
            $result= mysqli_query($connection, $update_password) ;
            if( $result ) {
                header("location:../login_page.php") ;
            }else{
                ?>
                <script>
                Swal.fire({
                    title:"Failed to update password",
                    icon: "info",
                    timer: 2500
                });
                setTimeout(() => {
                 window.location="./set_password.php" ;
                }, 2500);
              </script>
              <?php 
            }
        }
    
      }
      require_once "./navbar.php" ;
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Reset Password</h5>

                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="mb-3">
                                <input type="password" name="password" placeholder="Enter a new strong password"
                                    class="form-control" required />
                                <div class="invalid-feedback">Please create a strong password.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" placeholder="Enter new password again"
                                    class="form-control" required />
                                <div class="invalid-feedback">Type your same password.</div>
                                <div class="valid-feedback">Looks good!</div>
                            </div>

                            <button type="submit" name="reset" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php  require_once "./footer.html" ;?>
</body>

</html>