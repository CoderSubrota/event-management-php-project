<!DOCTYPE html>
<html lang="en">
<head>
    <?php  require_once "./cdn.html" ; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
<?php
session_start() ;
if( !isset($_SESSION['email']) || $_SESSION['email'] !='subrota12@gmail.com' ) {
    require_once "../back-end/logout.php" ;
}
require_once "../back-end/config.php" ;

$get_users = "SELECT * FROM users ORDER BY id ASC" ; 
$users = mysqli_query($connection, $get_users) ;

if( isset($_SESSION['message']) && $_SESSION['message']!='' ){
    ?>
    <script>
        Swal.fire({
            html: "<div class='text-white'> <?php echo $_SESSION['message']; ?></div>",
            icon: "success",
            timer: 3500
        });
    </script>

    <?php
    $_SESSION['message'] ="" ;

}
?>
    <?php 
    
    require_once "./navbar.php" ;
    if(isset($_SESSION['email'])) {
    ?>

    <div class="mt-4 mx-2">
     <h2 class="fs-1 fw-bold text-center my-5 text-primary"> Users Data </h2>
     <a href="./add-user.php" class="btn btn-primary mx-auto my-5 fs-5 fw-bold"> Add User<i class="fa-solid fa-plus mx-2"></i> </a>
        <table id="usersTable"  class="table table-bordered my-5 table-hover display text-center  table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> Edit </th>
                    <th> Delete </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $serial= 0; 
                foreach ($users as $user):    $serial +=1 ; ?>
                    <tr>
                        <td><?= htmlspecialchars($serial) ?></td>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['full_name']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td> <a href="./update-user.php?user_id=<?php echo $user['id'] ;?>"> <i class="fa-solid fa-edit text-success"></i> </a>  </td>
                        <td> <a href="../back-end/delete_user.php?user_id=<?php echo $user['id'] ;?>" onclick="return confirm('Are you want to delete this data ?')"> <i class="fa-solid fa-trash text-danger"></i> </a>  </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>

    <?php require_once "./footer.html" ; ?>

    <script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true
        });
    });
</script>
<?php
    }else{
        header("location:./login_page.php") ;
    }
?>
</body>
</html>