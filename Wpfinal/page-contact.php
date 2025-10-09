<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<div id="content" class="site-content carsallon-contact">
    <main id="main" class="site-main">

         Contact Hero Section 
        <section class="contact-hero">
            <div class="container">
                <h1>Get in Touch with CarsAllon</h1>
                <p>Looking to book a test drive, ask about a vehicle, or need help with financing? We're here to help — just send us a message and our team will get back to you promptly.</p>
            </div>
        </section>

         Contact Form 
        <section class="contact-form-section">
            <div class="container">
                <form action="" method="post" class="contact-form">
                    <p>
                        <label for="name">Full Name</label><br>
                        <input type="text" id="name" name="name" required>
                    </p>
                    <p>
                        <label for="email">Email Address</label><br>
                        <input type="email" id="email" name="email" required>
                    </p>
                    <p>
                        <label for="subject">Subject</label><br>
                        <input type="text" id="subject" name="subject" placeholder="e.g., Booking a Test Drive">
                    </p>
                    <p>
                        <label for="message">Your Message</label><br>
                        <textarea id="message" name="message" rows="6" required placeholder="Tell us how we can assist you..."></textarea>
                    </p>
                    <p>
                        <input type="submit" name="submit_contact" value="Send Message">
                    </p>
                </form>
            </div>
        </section>

         Optional Contact Info Section 
        <section class="contact-details">
            <div class="container">
                <h2>Visit or Call Us</h2>
                <p><strong>Address:</strong> 123 Auto Avenue, Motor City, CA 90210</p>
                <p><strong>Phone:</strong> <a href="tel:+18001234567">+1 (800) 123-4567</a></p>
                <p><strong>Email:</strong> <a href="mailto:info@carsallon.com">info@carsallon.com</a></p>
                <p><strong>Hours:</strong> Monday – Saturday, 9:00 AM – 6:00 PM</p>
            </div>
        </section>

        <?php get_footer(); ?>
    </main>
</div>
\