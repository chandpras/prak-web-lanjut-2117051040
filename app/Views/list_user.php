<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/list_style.css') ?>">

<section class="header">
    <header class="header">
        <a href="#" class="logo">
            <img src="<?= base_url('assets/img/logo_mainblack.png') ?>" alt="">
        </a>

        <nav class="navbar">
            <a href="<?= base_url('/user/create') ?>">create user</a>
            <a href="<?= base_url('/user') ?>">list user</a>
            <a href="<?= base_url('/kelas/create') ?>">create kelas</a>
            <a href="<?= base_url('/kelas') ?>">list kelas</a>
        </nav>
    </header>
</section>
    
<section class="title">
    <h1 class="heading">list <span>user</span> </h1>
</section>
    
<section class="list">
    <table id="list">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['npm'] ?></td>
                    <td><?= $user['nama_kelas'] ?></td>
                    <td>
                        <a href="<?= base_url('user/' . $user['id']) ?>">Detail</a>
                    </td>
                    <td><a href="<?= base_url('user/' . $user['id'] . '/edit') ?>">Edit</a>
                    </td>
                    <td>
                        <form action="<?= base_url('user/' . $user['id']) ?>" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?= $this->endSection() ?>