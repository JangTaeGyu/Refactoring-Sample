<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="imagetoolbar" content="no">
        <title>Refactoring Sample :: 경고 메시지</title>

        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function() {

                alert('<?= $message ?>');

                <?php if (isset($target)): ?>
                location.href = '<?= $target ?>';
                <?php endif; ?>
            });
        </script>
    </body>
</html>
