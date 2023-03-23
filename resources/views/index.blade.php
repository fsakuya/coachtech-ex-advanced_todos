<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-widthz, initial-scale=1.0">
  <title>Todo</title>
  <!-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('/css/recet.css') }}">
  <style>
    html,
    body,
    div,
    span,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    abbr,
    address,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    samp,
    small,
    strong,
    sub,
    sup,
    var,
    b,
    i,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section,
    summary,
    time,
    mark,
    audio,
    video {
      margin: 0;
      padding: 0;
      border: 0;
      outline: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
      display: block;
    }

    nav ul {
      list-style: none;
    }

    blockquote,
    q {
      quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
      content: "";
      content: none;
    }

    a {
      margin: 0;
      padding: 0;
      font-size: 100%;
      vertical-align: baseline;
      background: transparent;
    }

    /* change colours to suit your needs */
    ins {
      background-color: #ff9;
      color: #000;
      text-decoration: none;
    }

    /* change colours to suit your needs */
    mark {
      background-color: #ff9;
      color: #000;
      font-style: italic;
      font-weight: bold;
    }

    del {
      text-decoration: line-through;
    }

    abbr[title],
    dfn[title] {
      border-bottom: 1px dotted;
      cursor: help;
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
    }

    /* change border colour to suit your needs */
    hr {
      display: block;
      height: 1px;
      border: 0;
      border-top: 1px solid #cccccc;
      margin: 1em 0;
      padding: 0;
    }

    input,
    select {
      vertical-align: middle;
    }

    .flex {
      display: flex;
    }

    .between {
      justify-content: space-between;
    }

    .mb-15 {
      margin-bottom: 15px;
    }

    .mb-30 {
      margin-bottom: 30px;
    }

    .container {
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    .card {
      background-color: #fff;
      width: 50vw;
      padding: 30px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-radius: 10px;
    }

    .card__header {
      display: flex;
      justify-content: space-between;
    }

    .title {
      font-weight: bold;
      font-size: 24px;
    }

    .auth {
      display: flex;
      align-items: center;
      font-size: 16px;
    }

    .auth>.detail {
      margin-right: 1rem;
    }

    .btn {
      text-align: left;
      font-size: 12px;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .btn-logout {
      border: 2px solid #FF0000;
      color: #FF0000;
    }

    .btn-logout:hover {
      background-color: #FF0000;
      border-color: #FF0000;
      color: #fff;
    }

    .select-tag {
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      outline: none;
    }

    .input-add {
      width: 75%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }

    table {
      text-align: center;
      width: 100%
    }

    tr {
      height: 50px;
    }

    .input-update {
      width: 90%;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      appearance: none;
      font-size: 14px;
      outline: none;
    }

    .btn-add {
      border: 2px solid #dc70fa;
      color: #dc70fa;
    }

    .btn-add:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

    .btn-update {
      border: 2px solid #fa9770;
      color: #fa9770;
    }

    .btn-update:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .btn-update:disabled {
      background-color: rgba(19, 1, 1, 0.3);
      color: rgba(255, 255, 255, 0.3);
      border-color: rgba(195, 195, 195, 0.3);
    }

    .btn-delete {
      border: 2px solid #71fadc;
      color: #71fadc;
    }

    .btn-delete:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }

    .btn-search {
      display: inline-block;
      border: 2px solid #cdf119;
      color: #cdf119;
      text-decoration: none;
      margin-bottom: 10px;
    }

    .btn-search:hover {
      background-color: #cdf119;
      border-color: #cdf119;
      color: #fff;
    }

    .btn-back {
      border: 2px solid #6d7170;
      color: #6d7170;
      background-color: #fff;
      text-decoration: none;
    }

    .btn-back:hover {
      background-color: #6d7170;
      border-color: #6d7170;
      color: #fff;
    }
  </style>

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