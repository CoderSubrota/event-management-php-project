<nav class="navbar navbar-expand-lg py-3 mb-3" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="./home.php">
      <img src="https://i.ibb.co.com/C36T3NWw/myld-removebg-preview.png" alt="log" id="logo"/>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars text-white fs-2 fw-bold"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./home.php"> <i class="fa-solid fa-house me-1"></i> Home</a>
        </li>
        <li class="nav-item"><a class="nav-link" href="#about"><i class="fa-regular fa-address-card me-1"></i>About</a></li>
        <li class="nav-item"><a class="nav-link" href="./search_events.php"><i class="fa-regular fa-calendar-check me-1"></i>Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#services"><i class="fa-brands fa-servicestack me-1"></i>Services</a></li>
        <li class="nav-item"><a class="nav-link" href="./contact.php"><i class="fa-regular fa-id-card me-1"></i>Contact</a></li>
        <?php
        if (isset($_SESSION['email'])) {
          ?>
          <li class="nav-item">
            <a class="nav-link fw-bolder btn btn-danger " href="../back-end/logout.php"> <i class="fa-solid fa-right-from-bracket me-1"></i> Log Out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold " href="../front-end/dashboard.php">
            <i class="fa-solid fa-gauge"></i>
           Dashboard
           </a>
          </li>
        <?php
        } else {
          ?>
          <li class="nav-item"><a class="nav-link" href="./register_page.php"><i class="fa-solid fa-right-to-bracket mx-2"></i>Register</a></li>
          <li class="nav-item"><a class="nav-link" href="./login_page.php"><i class="fa-solid fa-right-to-bracket  mx-2"></i>Login</a></li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>