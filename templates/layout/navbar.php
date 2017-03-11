
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Refactoring Sample</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?= APP_URL ?>">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

            <?php if (isLogin()): ?>

                <li class="dropdown">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">안녕하세요 <?= session('email') ?>님 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/login/logout.php">로그아웃</a></li>
                    </ul>
                </li>

            <?php else: ?>

                <li><a href="<?= APP_URL ?>/join/">회원가입</a></li>
                <li><a href="<?= APP_URL ?>/login/">로그인</a></li>

            <?php endif; ?>

            </ul>

        </div>
    </div>
</nav>
