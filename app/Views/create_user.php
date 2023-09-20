<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="<?= base_url('/user/store') ?>" method="post">
        <label for="nama">Nama: </label><br> <input type="text" name="nama" value=""><br><br>
        <label for="npm">NPM: </label><br> <input type="text" name="npm" value=""><br><br>
        <label for="kelas">Kelas: </label><br> <input type="text" name="kelas" value=""><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>