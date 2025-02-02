<!DOCTYPE html>
<html lang="en">
<head>
    <?php
     session_start() ;
     require_once "./cdn.html"  ;
     ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
<?php require_once "./navbar.php"  ;?>
    <!-- Contact Section -->
    <section id="contact" class="py-5 my-5">
        <div class="container">
           <form class="w-50 shadow-lg rounded p-4 mx-auto" action="https://formsubmit.co/subrotachandra6@gmail.com" method="post">
           <h2 class="text-primary text-center">Contact Us</h2>
           <p class="mt-3 text-center">Have questions? Reach out to us anytime.</p>
           <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" required/>
            </div>
           <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required/>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="3">

                </textarea>
            </div>
            <button class="btn my-2 w-100 mx-auto btn-primary px-2" type="submit">Send</button>
           </form>
        </div>
    </section> 
    <?php require_once "./footer.html"  ;?>
</body>
</html>