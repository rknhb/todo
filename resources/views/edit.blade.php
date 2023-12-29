<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>todo編集</title>
    </head>
    <body>
        <h1>ToDo編集</h1>
        <div class="error">
            @foreach ($errors->all() as $error)
                <p class="error_message">{{$error}}</p>
            @endforeach
        </div>
        <form action="{{ route('update', ['id' => $post->id]) }}" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="name">タスク<span>(必須)</span></label><br>
                <input type="text" name="title" maxlength="30" placeholder="30文字以内" value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
                <label for="content">タスク内容<span>(必須)</span></label><br>
                <textarea rows="5" name="text" placeholder="内容を具体的に入力しましょう" value="">{{ old('text', $post->text) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">更新</button>
        </form>
    </body>
</html>