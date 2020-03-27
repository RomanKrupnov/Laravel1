<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
</head>
<body style="height: 100%;">
<div class="wrapper" style=" min-height: 100%;flex-direction: column;">
    <div class="header" style="flex-grow: 1;">
        <?php
        include_once 'menu.php';
        ?>
    </div>
    <div style="display: flex;flex-direction: column;">
        <h1 style="margin-top: 15px; margin-bottom: 10%; margin-left: 30vw; font-size: 55px;">Категории новостей</h1>
        <h3><?=$category['title']?></h3>
                <a href="<?= route('newsOne', $news['id']) ?>"
                   style="text-decoration: none; color: black;margin-right: 20px; font-size: 20px">
                    <h3><?= $news['title']?></h3></a>
    </div>
    <div class="footer" style="list-style: none; display: flex; height: 80px; background-color: #adb5bd; text-align: center;"></div>
</div>
</body>
</html>



