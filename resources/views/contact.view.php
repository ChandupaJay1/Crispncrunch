<?php view('includes/top') ?>

<!-- contact -->
<section class="section-lg contact" style="padding-top: 2em;">
    <div class="container">
        <div class="row p-5 rounded mb-5">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <form action="#" method="post">
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
                    <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your Email">
                    <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
                    <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
                    <button id="btn-send" class="btn btn-secondary">SEND MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-5">
                <p class="mb-5">If you'll like to know more about our experience designing and delivering cloud solutions, or get advice on your own technology challenges get in touch. With dedicated engineers on-hand 24/7, we’re set up to become an extension of your team.</p>
                <a href="tel:<?= APP_TELEPHONE ?>" class="text-color h5 d-block"><?= APP_TELEPHONE ?></a>
                <br>
                <a href="mailto:<?= APP_EMAIL ?>" class="mb-5 text-color h5 d-block"><?= APP_EMAIL ?></a>
                <p><?= APP_ADDRESS ?></p>
            </div>
        </div>
    </div>
    <!-- background shapes -->
    <img class="contact-bg-1 up-down-animation" src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/feature-bg-2.png" alt="background-shape">
    <img class="contact-bg-2 left-right-animation" src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/green-half-cycle.png" alt="background-shape">
    <img class="contact-bg-3 up-down-animation" src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/green-dot.png" alt="background-shape">
    <img class="contact-bg-4 left-right-animation" src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/service-half-cycle.png" alt="background-shape">
    <img class="contact-bg-5 up-down-animation" src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/feature-bg-2.png" alt="background-shape">
</section>
<!-- /contact -->

<?php view('includes/bottom') ?>
