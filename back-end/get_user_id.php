
<?php

 $select = "SELECT id, email FROM users WHERE email='" . $_SESSION['email'] . "'";
 $query = mysqli_query($connection, $select);
 $row = mysqli_fetch_assoc($query) ;
 $user_id = $row['id'];
  ?>