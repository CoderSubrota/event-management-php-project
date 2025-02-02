<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html" ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add user </title>
</head>

<body class="body">

    <?php
    session_start() ;
    require_once "./navbar.php";

    require_once "../back-end/config.php";

    if (isset($_POST['register'])) {
        $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

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
                    window.location="./register_page.php" ;
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
                    window.location="./register_page.php" ;
                   }, 4500);
                 </script>
            <?php
            exit() ;
        } else{

        $hash_password = password_hash($get_password, PASSWORD_DEFAULT);

        // Check if the email already exists
        $select = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $select);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>
                   Swal.fire({
                       title: "This email already exists",
                       icon: "info",
                       timer: 2500
                   });
                 </script>';
        } else {
            $insert = "INSERT INTO users(full_name, email, user_password) VALUES ('$full_name', '$email', '$hash_password')";

            if (mysqli_query($connection, $insert)) {
                $_SESSION['message'] = 'New user '. $full_name . ' added successfully !!' ; 
                header("Location: ./show_users.php");
                exit();
            } else {
                ?>
                <script>
                    Swal.fire({
                        title: "<?php echo "Error: " . mysqli_error($connection); ?>",
                        icon: "warning",
                        timer: 3500
                    });
                    setTimeout(() => {
                        window.location="./register_page.php" ;
                   }, 3500);
                </script>
                <?php
            }
        }
      }
    }
    ?>

    <br><br>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"
        class="was-validated w-50 mx-auto shadow-lg p-5 bg-body-tertiary rounded">
        <div class="text-center mb-4">
            <h3>Add User</h3>
        </div>

        <div class="mb-3">
            <input type="text" name="full_name" placeholder="Enter user full name" class="form-control" required />
            <div class="invalid-feedback">Please enter your real name.</div>
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="mb-3">
            <input type="email" name="email" placeholder="Enter user email" class="form-control" required />
            <div class="invalid-feedback">Please enter a valid email address.</div>
            <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="mb-3">
            <input type="password" name="password" placeholder="Enter a strong password" class="form-control"
                required />
            <div class="invalid-feedback">Please create a strong password.</div>
            <div class="valid-feedback">Looks good!</div>
        </div>
        <div class="mb-3">
            <input type="password" name="confirm_password" placeholder="Enter password again" class="form-control"
                required />
            <div class="invalid-feedback">Type your same password.</div>
            <div class="valid-feedback">Looks good!</div>
        </div>


        <button type="submit" name="register" class="btn btn-primary w-100">Save</button>
    </form>

    <br><br>
    <?php require_once "./footer.html"; ?>
</body>

</html>