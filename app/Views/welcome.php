<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/welcome_style.css') ?>">

<section class="header">
    <header class="header">
        <nav class="navbar">
            <a href="<?= base_url('/user/create') ?>">create user</a>
            <a href="<?= base_url('/user') ?>">list user</a>
            <a href="<?= base_url('/kelas/create') ?>">create kelas</a>
            <a href="<?= base_url('/kelas') ?>">list kelas</a>
        </nav>
    </header>
</section>
    
<section class="title">
    <div class="container">
        <h1 class="heading">welcome to </h1>
        <div class="image">
            <img src="<?= base_url('/assets/img/logo_mainblack.png') ?>" alt="">
        </div>
    </div>
</section>

<?= $this->endSection() ?>