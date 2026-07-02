<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center py-5 px-3">
        
        <div class="w-100" style="max-width: 440px;">
            
            <div class="text-center mb-5">
                <h1 class="h3 fw-bold text-dark mb-3">アカウント作成</h1>
                <p class="text-secondary small mb-0 lh-base">必要な情報を入力して、新しくアカウントを登録してください</p>
            </div>

            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-sm-5">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-5">
                            <label for="name" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                お名前
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                   class="form-control form-control-lg fs-6 border-light-subtle @error('name') is-invalid @enderror" 
                                   required autofocus autocomplete="name" placeholder="山田 太郎">
                            
                            @error('name')
                                <div class="invalid-feedback small mt-2 lh-base">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="email" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                メールアドレス
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                   class="form-control form-control-lg fs-6 border-light-subtle @error('email') is-invalid @enderror" 
                                   required autocomplete="username" placeholder="name@example.com">
                            
                            @error('email')
                                <div class="invalid-feedback small mt-2 lh-base">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                パスワード
                            </label>
                            <input id="password" type="password" name="password" 
                                   class="form-control form-control-lg fs-6 border-light-subtle @error('password') is-invalid @enderror" 
                                   required autocomplete="new-password" placeholder="••••••••">
                            
                            @error('password')
                                <div class="invalid-feedback small mt-2 lh-base">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="password_confirmation" class="form-label text-uppercase text-secondary fw-semibold small mb-2" style="letter-spacing: 0.05em;">
                                パスワード（確認用）
                            </label>
                            <input id="password_confirmation" type="password" name="password_confirmation" 
                                   class="form-control form-control-lg fs-6 border-light-subtle @error('password_confirmation') is-invalid @enderror" 
                                   required autocomplete="new-password" placeholder="••••••••">
                            
                            @error('password_confirmation')
                                <div class="invalid-feedback small mt-2 lh-base">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary btn-lg fs-6 fw-medium py-2 shadow-sm">
                                新しく登録する
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="text-center mt-5">
                <p class="text-secondary small lh-base">
                    すでにアカウントをお持ちですか？ 
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold ms-1">ログインする</a>
                </p>
            </div>

        </div>
    </div>

</body>
</html>