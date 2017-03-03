<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="imagetoolbar" content="no">
        <title>Refactoring Sample</title>
    </head>
    <body>

        <ul>

        <?php foreach ($database['localhost'] as $key => $value): ?>
            <li><?= $key ?> : <?= $value ?></li>
        <?php endforeach; ?>

        </ul>

    </body>
</html>
