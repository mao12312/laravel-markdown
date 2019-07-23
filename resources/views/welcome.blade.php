@extends('layouts.app')

@section('content')
    <div class="container">
        <textarea>
### 前提・実現したいこと

ここに質問の内容を詳しく書いてください。
（例）PHP(CakePHP)で●●なシステムを作っています。
■■な機能を実装中に以下のエラーメッセージが発生しました。

### 発生している問題・エラーメッセージ

```
エラーメッセージ
```

### 該当のソースコード

```ここに言語名を入力
ソースコード
```

### 試したこと

ここに問題に対して試したことを記載してください。

### 補足情報（FW/ツールのバージョンなど）

ここにより詳細な情報を記載してください。
        </textarea>
    </div>
    <script>
        var simplemde = new SimpleMDE({

        });
    </script>
@endsection