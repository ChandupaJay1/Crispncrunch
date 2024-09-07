<?php view("includes/top") ?>

<!-- projects -->
<section class="section product" style="padding-top: 2em; background-image: url(<?= RESOURCE_ROOT ?>/assets/dtox/images/backgrounds/product-bg/light.png);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="project-wrapper">
                <!-- load projects -->
                <?php /** @var array $projects */
                foreach ($projects as $project) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 project-card" id="project-<?= $project->id ?>">
                        <a target="_blank" href="<?= $project->url ?>"><img src="<?= RESOURCE_ROOT ?>/assets/images/projects/<?= $project->logo ?>" alt="product-img" class="rounded w-100 img-fluid"></a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-12 text-center">
                <a href="#" class="btn btn-primary">Explore More Projects</a>
            </div>
        </div>
    </div>
</section>
<!-- /projects -->

<?php view("includes/bottom") ?>
