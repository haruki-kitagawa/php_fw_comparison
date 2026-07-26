<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインイン</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center py-5 px-3">
        
        <div class="w-100" style="max-width: 440px;">
            
            <div class="text-center mb-5"> 
                <h1 class="h3 fw-bold text-dark mb-3">サインイン</h1>
                <p class="text-secondary small mb-0 lh-base">アカウント情報を入力してログインしてください</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-sm-5">
                    
                    <?php if (session('error')) : ?>
                        <div class="alert alert-danger border-0 small mb-4 py-2 px-3 lh-base" role="alert">
                            <?= session('error') ?>
                        </div>
                    <?php elseif (session('errors')) : ?>
                        <div class="alert alert-danger border-0 small mb-4 py-2 px-3 lh-base" role="alert">
                            <?php foreach (session('errors') as $error) : ?>
                                <?= $error ?><br>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <?php if (session('message')) : ?>
                        <div class="alert alert-success border-0 small mb-4 py-2 px-3 lh-base" role="alert">
                            <?= session('message') ?>
                        </div>
                    <?php endif ?>

                    <form method="POST" action="<?= url_to('login') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-5"> 
                            <label for="email" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                メールアドレス
                            </label>
                            <input id="email" type="email" name="email" value="<?= old('email') ?>" 
                                   class="form-control form-control-lg fs-6 border-light-subtle" 
                                   required autofocus autocomplete="username" placeholder="name@example.com">
                        </div>

                        <div class="mb-5"> 
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label text-uppercase text-secondary fw-semibold small m-0" style="letter-spacing: 0.05em;">
                                    パスワード
                                </label>
                            </div>
                            <input id="password" type="password" name="password" 
                                   class="form-control form-control-lg fs-6 border-light-subtle" 
                                   required autocomplete="current-password" placeholder="••••••••">
                        </div>

                        <?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
                            <div class="form-check mb-5"> 
                                <input id="remember_me" type="checkbox" name="remember" class="form-check-input border-secondary-subtle shadow-sm" <?php if (old('remember')): ?> checked <?php endif ?>>
                                <label for="remember_me" class="form-check-label text-secondary small align-middle lh-base ms-1">
                                    ログイン状態を保持する
                                </label>
                            </div>
                        <?php endif ?>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fs-6 fw-medium py-2 shadow-sm">
                                ログイン
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <?php if (setting('Auth.allowRegistration')) : ?>
                <div class="text-center mt-5"> 
                    <p class="text-secondary small lh-base">
                        アカウントをお持ちでないですか？ 
                        <a href="<?= url_to('register') ?>" class="text-decoration-none text-primary fw-semibold ms-1">新しく登録する</a>
                    </p>
                </div>
            <?php endif ?>

        </div>
    </div>

</body>
</html>