<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile_style.css') ?>">
    <title>Profile</title>
</head>
<body>
    <div class="profile-card">
            <div class="pic">
                <img src="<?= $user['foto'] ?? base_url('assets/img/defaultimg.jpg'); ?>" alt="">
            </div>
            <div class="card-header">
                <div class="name"><?= $user['nama'] ?></div>
            </div>
            <div class="card-header">
                <div class="name"><?= $user['nama_kelas'] ?></div>
            </div>
            <div class="card-header">
                <div class="name"><?= $user['npm'] ?></div>
            </div>
    </div>
</body>
</html>