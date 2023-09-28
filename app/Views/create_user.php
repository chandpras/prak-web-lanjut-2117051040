<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/create_style.css') ?>">
    <title>Create Profile</title>
</head>
<body>
        <div class="container">
            <div class="login">
                <form action="<?= base_url('/user/store') ?>" method="post">
                    <h1>CREATE PROFILE</h1>
                    <hr>
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Nama" name="nama" value="<?= old('nama'); ?>">
                    <label for="kelas">Kelas</label>
                    <!-- <input type="text" placeholder="Kelas" name="kelas" required> -->
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
                    <input type="text" placeholder="NPM" name="npm" value="<?= old('npm'); ?>">
                    <label>
                        <?php if (session()->getFlashdata('_ci_validation_errors')) : ?>
                            <ul>
                                <?php foreach (session()->getFlashdata('_ci_validation_errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </label>
                    <button class="btn" type="submit">CREATE</button>
                </form>
            </div>
        </div>
</body>
</html>