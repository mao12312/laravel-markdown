@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endsection

@section('content')
    <div class="container">
        <h2>投稿フォーム</h2>
        <textarea>
### 前提・実現したいこと

ここに質問の内容を詳しく書いてください。

### 発生している問題

### 試したこと

ここに問題に対して試したことを記載してください。

### ここにより詳細な情報を記載してください。
        </textarea>
    </div>
    <script>
        var simplemde = new SimpleMDE({

        });
    </script>
@endsection