<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/5b69d558cb.js" crossorigin="anonymous"></script>
        <title>todo</title>
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <div class="header">
            <div class="header_inner">
                <h1>ToDoリスト</h1>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn icon submit-icon">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('main') }}" class="search-form-005" method="GET">
                @csrf
                <label>
                    <input type="text" name="keyword" placeholder="キーワードを入力">
                </label>
                <button type="submit" aria-label="検索"></button>
            </form>
            <div class="task_add">
                <a href="{{ route('add') }}"><button class="btn btn-primary">追加</button></a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">記事ID</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">本文</th>
                    <th scope="col">作成日</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->text }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td><a href="{{ route('edit', ['id' => $post->id]) }}" class="btn btn-success">編集</a></td>
                        <td><form action="{{ route('delete', ['id' => $post->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary">削除</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>