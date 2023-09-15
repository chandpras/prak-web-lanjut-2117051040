<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        *{
        margin: 0;
        padding: 0;
        font-family: 'Josefin Sans', sans-serif;
        box-sizing: border-box;
        text-decoration: none;
        }

        body{
            background: url(<?php echo base_url('bg2.jpg'); ?>);
            background-size: cover;
        }

        .profile-card{
            width: 350px;
            text-align: center;
            margin: 10% auto;
            overflow: hidden;
        }

        .card-header{
            background: #383421;
            padding: 20px 10px;
            border-radius: 20px;
            margin-top: 5%;
        }

        .pic{
            display: inline-block;
            padding: 8px;
            background: linear-gradient(130deg,#b9bb75,#473b17);
            margin: auto;
            border-radius: 50%;
        }

        .pic img{
            display: block;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .name{
            color: #f2f2f2;
            font-size: 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="profile-card">
            <div class="pic">
                <img src="<?php echo base_url('PROFPIC2.jpg'); ?>" alt="">
            </div>
            <div class="card-header">
                <div class="name"><?= $nama ?></div>
            </div>
            <div class="card-header">
                <div class="name"><?= $kelas ?></div>
            </div>
            <div class="card-header">
                <div class="name"><?= $npm ?></div>
            </div>
    </div>
</body>
</html>