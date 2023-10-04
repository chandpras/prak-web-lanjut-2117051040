<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/list_style.css') ?>">

    <table id="listuser">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th colspan="2">Aksi</th>
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
                    <td>Edit</td>
                    <td>Hapus</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?= $this->endSection() ?>