<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインページ</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body class="login_body">
    <div class="title-area">
        <h1>ログインページ</h1>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input id="name" type="text" class="input-area form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your Name" required autocomplete="name" autofocus> <br>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input id ="password" type="password" class="input-area form-control @error('password') is-invalid @enderror" name="password" placeholder="Your Password" required autocomplete="current-password"> <br>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="submit" class="input-area submit" name="submit" value="Log in">
    </form>
</body>

</html>