<?php http_response_code($code) ?>
<?php view('includes/top') ?>
<div class="error-container">
    <div class="space-fill"></div>
    <div class="error-content">
        <span class="error-code"><?= $code ?></span>
        <span class="error-msg"><?= $msg ?></span>
    </div>
</div>
<?php view('includes/bottom') ?>