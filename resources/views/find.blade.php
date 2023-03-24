<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-widthz, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ asset('/css/style.css')  }}">
  <link rel="recetsheet" href="{{ asset('/css/reset.css') }}">
</head>

<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="title mb-15">タスク検索</p>
        <div class="auth mb-15">
          @if (Auth::check())
          <p class="detail">「{{$user->name}}」でログイン中</p>
          @endif
          <input class="btn btn-logout" type="submit" value="ログアウト">
        </div>
      </div>
      @if(count($errors) > 0)
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="todo">
        <form action="{{route('todo.search')}}" method="get" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="content">
          <select name="tag_id" class="select-tag">
            <option value="" selected disabled></option>
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
          </select>
          <input class="btn btn-add" type="submit" value="検索">
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
            </form>
            <td>
              <select name="tag_id" class="select-tag">
                <option value="1" @if($todo->tag_id === 1) selected @endif>家事</option>
                <option value="2" @if($todo->tag_id === 2) selected @endif>勉強</option>
                <option value="3" @if($todo->tag_id === 3) selected @endif>運動</option>
                <option value="4" @if($todo->tag_id === 4) selected @endif>食事</option>
                <option value="5" @if($todo->tag_id === 5) selected @endif>移動</option>
              </select>
              </form>
            </td>
            <td>
              <button class="btn btn-update">更新</button>
            </td>
            <td>
              <form action="{{ route('todos.delete', ['id' => $todo->id]) }}" method="post">
                @csrf
                <button class="btn btn-delete">削除</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <a class="btn btn-back" href="{{route('todos.index')}}">戻る</a>
    </div>
  </div>
</body>

</html>