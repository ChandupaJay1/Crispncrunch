<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="<?= APP_URL ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <i>
            <img style="width: 60px;" id="logo" src="<?= RESOURCE_ROOT ?>/assets/img/fav-ion-lg6.ico" alt="LOGO" />
        </i>
        <h1 class="m-0"><?= APP_NAME ?></h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?= APP_URL ?>" class="nav-item nav-link<?= strtoupper(View::$page) === 'INDEX' ? ' active' : '' ?>">Home</a>
            <a href="<?= APP_URL ?>/about" class="nav-item nav-link<?= strtoupper(View::$page) === 'ABOUT' ? ' active' : '' ?>">About</a>
            <a href="<?= APP_URL ?>/packages" class="nav-item nav-link<?= strtoupper(View::$page) === 'PACKAGES' ? ' active' : '' ?>">Services</a>
            <!-- <a href="<?= APP_URL ?>/projects" class="nav-item nav-link<?= strtoupper(View::$page) === 'PROJECTS' ? ' active' : '' ?>">Projects</a> -->
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="<?= APP_URL ?>/features" class="dropdown-item">Features</a>
                    <a href="<?= APP_URL ?>/quote" class="dropdown-item">Free Quote</a>
                    <a href="<?= APP_URL ?>/team" class="dropdown-item">Our Team</a>
                    <a href="<?= APP_URL ?>/testimonial" class="dropdown-item">Testimonial</a>
                    <a href="<?= APP_URL ?>/_404" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
            <a href="<?= APP_URL ?>/contact" class="nav-item nav-link<?= strtoupper(View::$page) === 'CONTACT' ? ' active' : '' ?>">Contact</a>
        </div>
        <!-- <a href="" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Get A Quote<i
                    class="fa fa-arrow-right ms-3"></i></a> -->
    </div>
</nav>
<!-- Navbar End -->