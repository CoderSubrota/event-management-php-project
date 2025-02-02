<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html" ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit user </title>
</head>
<?php
session_start();
require_once "../back-end/config.php";
require_once "./navbar.php";
require_once "../back-end/config.php";
$user_data = [];
if (isset($_SESSION['email']) && $_SESSION['email'] == "subrota12@gmail.com") {
    if (isset($_REQUEST['user_id'])) {
        $user_id = $_REQUEST['user_id'];
        //get user data
        $get_user = "SELECT * FROM users WHERE id='$user_id'";
        $user_data = mysqli_query($connection, $get_user);
        $row = mysqli_fetch_assoc($user_data);
        $user_data = $row;
        ?>

        <?php
        //update user data 
        if (isset($_POST['update_user'])) {
            $user_id = mysqli_real_escape_string($connection, $_POST['hidden_id']);
            $full_name = mysqli_real_escape_string($connection, $_POST['full_name']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $password_pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

            // Check if passwords match
            if ($password !== $confirm_password) {
                ?>
                <script>
                    Swal.fire({
                        title: "Error: Passwords do not match!",
                        icon: "warning",
                        timer: 3500
                    });
                </script>
                <?php
            }
            // Check if password meets the strength criteria
            elseif (!preg_match($password_pattern, $password)) {
                ?>
                <script>
                    Swal.fire({
                        html: "<ul class='text-info fw-bold'> <li>Password must be at least 8 characters long</li><li>Include an uppercase letter</li><li>Include an lower letter</li><li>Include an lower number</li><li>Include an special character</li></ul>",
                        icon: "info",
                        timer: 3500
                    });
                </script>
                <?php
            } else {

                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $update_user = "UPDATE users SET full_name='$full_name', email='$email', user_password='$hash_password' WHERE id='$user_id'";
                if (mysqli_query($connection, $update_user)) {

                    $_SESSION['message'] = "User " . $full_name . " data updated successfully !!";
                    header("Location: ../front-end/show_users.php");
                    exit();
                } else {
                 ?>
                    <script>
                        Swal.fire({
                            title:'Error: '${mysqli_error($connection)}'';,
                            icon: "warning",
                            timer: 3500
                        });
                    </script>
                    <?php
                    exit();

                }
            }
        }
        ?>

        <body class="body">
            <br><br>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"
                class="was-validated w-50 mx-auto shadow-lg p-5 bg-body-tertiary rounded">
                <div class="text-center mb-4">
                    <h3>Edit user</h3>
                </div>

                <div class="mb-3">
                    <input type="text" name="full_name" value="<?php echo $user_data['full_name']; ?>"
                        placeholder="Enter your full name" class="form-control" required />
                    <div class="invalid-feedback">Please enter your real name.</div>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" value="<?php echo $user_data['email']; ?>" placeholder="Enter your email"
                        class="form-control" required />
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

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="terms" required />
                    <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                </div>
                <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>" />
                <button type="submit" name="update_user" class="btn btn-primary w-100">Save</button>
            </form>

            <br><br>
        <?php
    }
    require_once "./footer.html";
    ?>

        <?php
} else {
    header("location:./login_page.php");
}
?>
</body>

</html>