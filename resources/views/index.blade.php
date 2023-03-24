<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-widthz, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
</head>

<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="title mb-15">Todo List</p>
        <div class="auth mb-15">
          @if (Auth::check())
          <p class="detail">「{{$user->name}}」でログイン中</p>
          @endif
          <form method='post' action="{{ route('logout') }}">
            @csrf
            <input class="btn btn-logout" type="submit" value="ログアウト">
          </form>
        </div>
      </div>
      <a class="btn btn-search" href="{{ route('todo.find') }}">タスク検索</a>
      @if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="todo">
        <form action="{{ route('todos.create') }}" method="post" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="content">
          <select name="tag_id" class="select-tag">
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
          </select>
          <input class="btn btn-add" type="submit" value="追加">
        </form>
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>タグ</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach($todos as $todo)
          <tr>
            <td>
              {{ $todo->created_at }}
            </td>
            <form action="{{ route('todos.update', ['id' => $todo->id]) }}" method="post">
              @csrf
              <td>
                <input type="text" class="input-update" value="{{ $todo->content }}" name="content">
              </td>
              <td>
                <select name="tag_id" class="select-tag">
                  <option value="1" @if($todo->tag_id === 1) selected @endif>家事</option>
                  <option value="2" @if($todo->tag_id === 2) selected @endif>勉強</option>
                  <option value="3" @if($todo->tag_id === 3) selected @endif>運動</option>
                  <option value="4" @if($todo->tag_id === 4) selected @endif>食事</option>
                  <option value="5" @if($todo->tag_id === 5) selected @endif>移動</option>
                </select>
              </td>
              <td>
                <button type="submit" class="btn btn-update">更新</button>
              </td>
            </form>
            <form action="{{ route('todos.delete', ['id' => $todo->id]) }}" method="post">
              <td>
                @csrf
                <button type="submit" class="btn btn-delete">削除</button>
              </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>

</html>