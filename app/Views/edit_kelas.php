<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/create_style.css') ?>">

        <div class="container">
            <div class="login">
                <form action="<?= base_url('kelas/' . $kelas['id']) ?>" method="post">
                    <h1>EDIT KELAS</h1>
                    <hr>
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <input type="text" name="nama_kelas" id="nama_kelas" value="<?= $kelas['nama_kelas'] ?>">
                    <label for="kapasitas_kelas">Kapasitas</label>
                    <input type="number" name="kapasitas_kelas" id="kapasitas_kelas" max="999" value="<?= $kelas['kapasitas_kelas'] ?>">
                    <label>
                        <?php if (session()->getFlashdata('_ci_validation_errors')) : ?>
                            <ul>
                                <?php foreach (session()->getFlashdata('_ci_validation_errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </label>
                    <button class="btn" type="submit">EDIT</button>
                    <button class="btn-sec"><a href="<?= base_url('/kelas') ?>">CANCEL</a></button>
                </form>
            </div>
        </div>
<?= $this->endSection() ?>