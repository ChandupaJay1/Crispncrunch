<?php view('includes/top') ?>

<!-- background shapes -->
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/green-dot.png" alt="background-shape" class="about-bg-1 up-down-animation">
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/blue-dot.png" alt="background-shape" class="about-bg-2 left-right-animation">
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/green-half-cycle.png" alt="background-shape" class="about-bg-3 up-down-animation">
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/seo-ball-1.png" alt="background-shape" class="about-bg-4 left-right-animation">
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/team-bg-triangle.png" alt="background-shape" class="about-bg-5 up-down-animation">
<img src="<?= RESOURCE_ROOT ?>/assets/dtox/images/background-shape/service-half-cycle.png" alt="background-shape" class="about-bg-6 left-right-animation">

<main class="blog-container">
  <section class="latest-blogs">
    <div class="container">
      <h2 class="title">Hot Topics</h2>
      <div class="blog-grid">
        <?php for ($i = 0; $i < 5; $i++) : ?>
          <?php view('components/blog-card') ?>
        <?php endfor; ?>
      </div>
    </div>
  </section>
</main>

<?php view('includes/bottom') ?>
