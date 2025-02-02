<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "./cdn.html"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php
    session_start();
    require_once "./navbar.php";

    require_once "../back-end/config.php";
    ?>
    <!-- Hero Section -->
    <section class="hero" style="background-image:url(https://i.ibb.co.com/G4TZrgpN/Edi-o-2023.jpg);">
        <div class="container h-100 w-full text-center"
            style="background-color:rgba(120,45,78,0.5); padding-top:250px;">
            <h1>Welcome to Event</h1>
            <p>We make your events unforgettable</p>
            <a href="#services" class="btn btn-primary btn-lg mt-3">Explore Services</a>
        </div>
    </section>
    <!-- Carousel section  -->
    <section>
        <div class="container mt-5">
            <h1 class="fs-2 fw-bold text-center text-primary my-5">  Our Events </h1>

            <div id="eventCarousel" class="carousel slide shadow-lg rounded overflow-hidden" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="4"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://i.ibb.co.com/R4ks3wjd/Cooking-event-with-Manufactum-II-Krautkopf.jpg"
                            class="d-block w-100" alt="Restaurant Branding">
                        <div class="carousel-caption">
                            <h5>Restaurant Branding Event</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co.com/bMhfrPdY/Restaurant-Branding.jpg" class="d-block w-100"
                            alt="Wine Festival">
                        <div class="carousel-caption">
                            <h5>Wine Festival Experience</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co.com/ZzVxM9z5/10-vinos-mexicanos-que-debes-conocer-para-quedar-bien-con-tus-invitados-Gourmet-de-M-xico.jpg"
                            class="d-block w-100" alt="Mexican Wine">
                        <div class="carousel-caption">
                            <h5>Mexican Wine Showcase</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co.com/60WMG0yp/Twisted-Tree-Limited.jpg" class="d-block w-100"
                            alt="Twisted Tree Event">
                        <div class="carousel-caption">
                            <h5>Twisted Tree Limited Gathering</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.ibb.co.com/Qj94R7Ps/Blog-Storytelling-Humility-and-Keeping-it-Weird-How-Conference-Curators-Select-Speakers.jpg"
                            class="d-block w-100" alt="Conference">
                        <div class="carousel-caption">
                            <h5>Inspirational Conference</h5>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel"
                    data-bs-slide="prev">
                    <i class="fa-solid fa-angles-left fs-1 fw-bold text-white"></i>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel"
                    data-bs-slide="next">
                    <i class="fa-solid fa-angles-right fs-1 fw-bold text-white"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="text-primary fw-bold"> About Us </h2>
            <p class="mt-3">
                We specialize in organizing weddings, corporate events, and private parties, ensuring a seamless and
                memorable experience for our clients. Our dedicated team takes care of every detail, from venue
                selection and décor to catering, entertainment, and logistics. Whether you're planning an intimate
                gathering or a grand celebration, we tailor our services to meet your specific needs and vision.
                <br> <br>
            <h2> **Weddings**</h2>
            We bring dream weddings to life with elegant themes, breathtaking floral arrangements, and exquisite
            catering. From traditional ceremonies to modern destination weddings, our planners handle everything,
            including guest accommodations, photography, and music.
            <br> <br>
            **Corporate Events**
            Our expertise extends to corporate gatherings such as conferences, product launches, and award
            ceremonies. We manage event branding, audiovisual setups, keynote speaker coordination, and seamless
            execution to leave a lasting impression on attendees.
            <br> <br>
            <h2> **Private Parties**</h2>
            From birthdays and anniversaries to themed parties, we create personalized experiences with customized
            décor, gourmet menus, and engaging entertainment. Whether it’s a formal gala or a casual backyard event,
            we ensure a stress-free and enjoyable experience.
            <br>
            With meticulous attention to detail, innovative ideas, and a passion for excellence, we guarantee events
            that exceed expectations. Let us turn your special occasion into an unforgettable experience. Contact us
            today to start planning your next event!
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 text-primary fw-bold">Our Services</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVpakjLBkEt-2FNGk-9CBOyHoChY9O3IhxvTHA8aYcVCh_oVZAPvnDVzA9D1a-8iVG1PI&usqp=CAU"
                            alt="Service 1" class="card-img-top" style="height:210px;">
                        <div class="card-body">
                            <h5 class="card-title">Wedding Planning</h5>
                            <p class="card-text">Create magical moments for your special day.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIYfj4Go_Y2g8QfVB-_LJd_1MiRYWJy3Cfw4sLvpdPsqup_L6ZncBazWM2vFj5iOLg0hQ&usqp=CAU"
                            alt="Service 2" class="card-img-top" style="height:210px;">
                        <div class="card-body">
                            <h5 class="card-title">Corporate Events</h5>
                            <p class="card-text">Professional planning for impactful events.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKF_YlFFlKS6AQ8no0Qs_xM6AkjvwFwP61og&s"
                            alt="Service 3" class="card-img-top" style="height:210px;">
                        <div class="card-body">
                            <h5 class="card-title">Private Parties</h5>
                            <p class="card-text">Personalized parties for every occasion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php require_once "./footer.html"; ?>

</body>

</html>