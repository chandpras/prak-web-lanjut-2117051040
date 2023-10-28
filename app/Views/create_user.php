<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/create_style.css') ?>">

        <div class="container">
            <div class="img">
                <img src="<?= base_url('assets/img/logo_mainblack.png') ?>" alt="">
            </div>
            <div class="login">
                <form action="<?= base_url('/user/store') ?>" method="post" enctype="multipart/form-data">
                    <h1>CREATE USER</h1>
                    <hr>
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Nama" name="nama" value="<?= old('nama'); ?>">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" value="<?= old('kelas'); ?>">
                        <?php
                            foreach ($kelas as $item) {
                        ?>
                                <option value="<?= $item['id'] ?>">
                                    <?= $item['nama_kelas'] ?>
                                </option>
                            <?php
                            }
                        ?>
                    </select>
                    <label for="npm">NPM</label>
                    <input type="number" placeholder="NPM" name="npm" value="<?= old('npm'); ?>">
                    <label>
                        <?php if (session()->getFlashdata('_ci_validation_errors')) : ?>
                            <ul>
                                <?php foreach (session()->getFlashdata('_ci_validation_errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </label>
                    <label for="foto">Upload Foto</label>
                    <input type="file" name="foto" id="foto">
                    <button class="btn" type="submit">CREATE</button>
                    <button class="btn-sec"><a href="<?= base_url('/user') ?>">CANCEL</a></button>
                    
                </form>
            </div>
        </div>
<?= $this->endSection() ?>