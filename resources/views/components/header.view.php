<!-- Theme Switch -->
<header class="header">
    <div class="container">
        <?php if (View::$page !== "index") : ?>
            <h1 class="title"><?= View::$title ?></h1>
        <?php endif; ?>
        <div class="search-box">
            <input type="text" name="keyword" id="search-field">
        </div>
        <label for="dark-btn" class="theme-switch">
            <div class="wrapper">
                <input type="checkbox" id="dark-btn">
                <span class="slider round"></span>
            </div>
        </label>
    </div>
</header>
<!-- Theme Switch -->
