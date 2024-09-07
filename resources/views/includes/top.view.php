<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title><?= APP_NAME ?> | <?= View::$title ?></title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?= RESOURCE_ROOT ?>/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= RESOURCE_ROOT ?>/assets/images/logo2.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Sniglet:wght@400;800&display=swap" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MBTYW657RH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MBTYW657RH');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MP5BLMTR');
    </script>
    <!-- End Google Tag Manager -->

    <?php if (View::$page === "index") : ?>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-MBTYW657RH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-MBTYW657RH');
        </script>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MP5BLMTR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>

    <!-- ** CSS ** -->

    <!-- Variables -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/css/variables.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/bootstrap/bootstrap.min.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/themify-icons/themify-icons.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/slick/slick.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/Venobox/venobox.css">
    <!-- aos -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/aos/aos.css">
    <!-- Template Main Stylesheet -->
    <link href="<?= RESOURCE_ROOT ?>/assets/dtox/css/style.css" rel="stylesheet">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/css/style.css">

    <?php if (file_exists(APP_ROOT . "/public/assets/css/" . strtolower(View::$page) . ".css")) : ?>
        <!-- Page Stylesheet -->
        <link rel="stylesheet" href="<?= RESOURCE_ROOT ?>/assets/css/<?= strtolower(View::$page) ?>.css">
    <?php endif; ?>

    <!-- ** /CSS ** -->


    <!-- ** JS ** -->

    <!-- Global variables -->
    <script defer type="text/javascript">
        const APP_URL = '<?= APP_URL ?>'
        const RESOURCE_ROOT = '<?= APP_URL ?>/public'
    </script>

    <!-- jQuery -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/slick/slick.min.js"></script>
    <!-- venobox -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/Venobox/venobox.min.js"></script>
    <!-- aos -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/plugins/aos/aos.js"></script>
    <!-- Template Main Script -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/dtox/js/script.js"></script>
    <!-- Main Script -->
    <script defer src="<?= RESOURCE_ROOT ?>/assets/js/script.js"></script>

    <?php if (file_exists(APP_ROOT . "/public/assets/js/" . strtolower(View::$page) . ".js")) : ?>
        <!-- Page Script -->
        <script defer src="<?= RESOURCE_ROOT ?>/assets/js/<?= strtolower(View::$page) ?>.js"></script>
    <?php endif; ?>

    <!-- ** /JS ** -->
</head>

<body>
    <!-- navigation -->
    <section class="fixed-top navigation">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="<?= APP_URL ?>"><img class="logo" src="<?= RESOURCE_ROOT ?>/assets/images/logo2.png" alt="logo"></a>
                <button class="navbar-toggler border-0 collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- navbar -->
                <div class="collapse navbar-collapse text-center" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APP_URL ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="<?= APP_URL ?>/#feature">Feature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APP_URL ?>/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APP_URL ?>/service">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="<?= APP_URL ?>/projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= APP_URL ?>/blog">Blog</a>
                        </li>
                    </ul>
                    <a href="<?= APP_URL ?>/contact" class="btn btn-primary ml-lg-3 primary-shadow">Contact Us</a>
                </div>
            </nav>
        </div>
    </section>
    <!-- /navigation -->

    <!-- header -->
    <?php if (View::$page !== "index") : ?>
        <?php view('components/header') ?>
    <?php endif; ?>
    <!-- /header -->
