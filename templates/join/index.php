
<?= view('layout/top.php', ['title' => '회원가입']); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Refactoring Sample 회원가입</div>

                <div class="panel-body">
                    <form method="POST" accept-charset="utf-8" action="process.php">
                        <input type="hidden" name="_token" value="<?= token() ?>">
                        <div class="form-group">
                            <label for="name">이름</label>
                            <input type="text" name="name" class="form-control" placeholder="이름을 입력해 주세요.">
                        </div>
                        <div class="form-group">
                            <label for="email">이메일</label>
                            <input type="email" name="email" class="form-control" placeholder="이메일을 입력해 주세요.">
                        </div>
                        <div class="form-group">
                            <label for="password">비밀번호</label>
                            <input type="password" name="password" class="form-control" placeholder="비밀번호를 입력해 주세요.">
                        </div>
                        <div class="form-group">
                            <label for="password">비밀번호 확인</label>
                            <input type="password" name="password_match" class="form-control" placeholder="비밀번호 확인을 위하여 한번더 입력해 주세요.">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">가입하기</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/bottom.php'); ?>
