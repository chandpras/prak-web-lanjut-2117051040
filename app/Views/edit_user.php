<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/create_style.css') ?>">

        <div class="container">
            <div class="img">
                <img src="<?= base_url('assets/img/logo_mainblack.png') ?>" alt="">
            </div>
            <div class="login">
                <form action="<?= base_url('user/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
                    <h1>EDIT USER</h1>
                    <hr>
                    <label for="nama">Nama</label>
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <input type="text" name="nama" id="nama" value="<?= $user['nama'] ?>">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <?php
                            foreach ($kelas as $item) {
                        ?>
                                <option value="<?= $item['id'] ?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?>>
                                    <?= $item['nama_kelas'] ?>
                                </option>
                            <?php
                            }
                        ?>
                    </select>
                    <label for="npm">NPM</label>
                    <input type="number" name="npm" id="npm" value="<?= $user['npm'] ?>">
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
                    <img src="<?= $user['foto'] ?? base_url('assets/img/defaultimg.jpg') ?>" alt="" style="width: 100px;">
                    <input type="file" name="foto" id="foto">
                    <button class="btn" type="submit">EDIT</button>
                    <button class="btn-sec"><a href="<?= base_url('/user') ?>">CANCEL</a></button>
                </form>
            </div>
        </div>
<?= $this->endSection() ?>