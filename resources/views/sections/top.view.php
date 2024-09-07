<!DOCTYPE html>
<html lang="en">

<?php view('components/head') ?>

<body>

<?php view('components/spinner') ?>

<?php view('components/topbar') ?>

<?php view('components/navbar') ?>

<?php if (strtoupper(View::$page) !== 'INDEX'): ?>
    <?php view('components/breadcrumb') ?>
<?php endif; ?>

<?php if (strtoupper(View::$page) === 'INDEX'): ?>
    <?php view('components/carousel') ?>
<?php endif; ?>
