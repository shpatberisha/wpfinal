<?php
/**
 * Template Name: Contact Page
 *
 * @package Hrc_Sallon
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-info">
                <h2><?php esc_html_e('Get In Touch', 'wp-devs'); ?></h2>
                <p><?php esc_html_e('Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.', 'wp-devs'); ?></p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <strong><?php esc_html_e('Address:', 'wp-devs'); ?></strong>
                        <p>123 Car Street, Auto City, AC 12345</p>
                    </div>
                    <div class="contact-item">
                        <strong><?php esc_html_e('Phone:', 'wp-devs'); ?></strong>
                        <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                    </div>
                    <div class="contact-item">
                        <strong><?php esc_html_e('Email:', 'wp-devs'); ?></strong>
                        <p><a href="mailto:info@hrcsallon.com">info@hrcsallon.com</a></p>
                    </div>
                    <div class="contact-item">
                        <strong><?php esc_html_e('Hours:', 'wp-devs'); ?></strong>
                        <p><?php esc_html_e('Mon - Fri: 9:00 AM - 6:00 PM', 'wp-devs'); ?><br>
                        <?php esc_html_e('Sat: 10:00 AM - 4:00 PM', 'wp-devs'); ?><br>
                        <?php esc_html_e('Sun: Closed', 'wp-devs'); ?></p>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper">
                <?php
                // Display success message
                if (isset($_GET['contact']) && $_GET['contact'] == 'success') {
                    echo '<div class="contact-success">' . esc_html__('Thank you for your message! We will get back to you soon.', 'wp-devs') . '</div>';
                }

                // Display error message
                if (isset($_GET['contact']) && $_GET['contact'] == 'error') {
                    echo '<div class="contact-error">' . esc_html__('Sorry, there was an error sending your message. Please try again.', 'wp-devs') . '</div>';
                }
                ?>

                <form id="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="contact-form">
                    <input type="hidden" name="action" value="hrc_sallon_contact_form">
                    <?php wp_nonce_field('hrc_sallon_contact_form', 'contact_nonce'); ?>

                    <div class="form-group">
                        <label for="contact_name"><?php esc_html_e('Name', 'wp-devs'); ?> <span class="required">*</span></label>
                        <input type="text" id="contact_name" name="contact_name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_email"><?php esc_html_e('Email', 'wp-devs'); ?> <span class="required">*</span></label>
                        <input type="email" id="contact_email" name="contact_email" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_phone"><?php esc_html_e('Phone', 'wp-devs'); ?></label>
                        <input type="tel" id="contact_phone" name="contact_phone">
                    </div>

                    <div class="form-group">
                        <label for="contact_subject"><?php esc_html_e('Subject', 'wp-devs'); ?> <span class="required">*</span></label>
                        <input type="text" id="contact_subject" name="contact_subject" required>
                    </div>

                    <div class="form-group">
                        <label for="contact_message"><?php esc_html_e('Message', 'wp-devs'); ?> <span class="required">*</span></label>
                        <textarea id="contact_message" name="contact_message" rows="6" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?php esc_html_e('Send Message', 'wp-devs'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
