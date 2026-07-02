<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワードの再設定</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center py-5 px-3">
        <div class="w-100" style="max-width: 440px;">
            
            <div class="text-center mb-5">
                <h1 class="h3 fw-bold text-dark mb-3">パスワード再設定</h1>
                <p class="text-secondary small mb-0 lh-base">
                    ご登録のメールアドレスを入力してください。<br>新しいパスワードを設定するためのリンクをお送りします。
                </p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-sm-5">
                    
                    @if (session('status'))
                        <div class="alert alert-success border-0 small mb-4 py-2 px-3 lh-base" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="email" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                メールアドレス
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                   class="form-control form-control-lg fs-6 border-light-subtle @error('email') is-invalid @enderror" 
                                   required autofocus placeholder="name@example.com">
                            
                            @error('email')
                                <div class="invalid-feedback small mt-2 lh-base">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fs-6 fw-medium py-2 shadow-sm">
                                リセットリンクを送信
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold small">
                    &larr; ログイン画面へ戻る
                </a>
            </div>

        </div>
    </div>

</body>
</html>