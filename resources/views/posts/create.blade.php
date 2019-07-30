@extends('layouts.app')

@section('head')

    {{--simplemde--}}
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">--}}
    {{--<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>--}}

    {{--codemirror--}}
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- UI Kit -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.5/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.5/js/uikit.min.js"></script>

    <!-- Codemirror and marked dependencies -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/codemirror.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/codemirror.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/mode/markdown/markdown.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/addon/mode/overlay.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/mode/xml/xml.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.38.0/mode/gfm/gfm.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.js'></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML editor CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.5/css/components/htmleditor.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.27.5/js/components/htmleditor.js"></script>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿作成
            </h1>

            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                                id="title"
                                name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('title') }}"
                                type="text"
                        >
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="text">
                            投稿文
                        </label>


                        {{--<textarea--}}
                        {{--id="text"--}}
                        {{--name="text"--}}
                        {{--class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"--}}
                        {{--rows="4"--}}
                        {{-->{{ old('text') }}</textarea>--}}

                        {{--simplemde--}}
                        {{--<textarea id="editor" name="text" rows="8" cols="40">{{ old('text') }}--}}
{{--### 前提・実現したいこと--}}

{{--ここに質問の内容を詳しく書いてください。--}}

{{--### 発生している問題--}}

{{--### 試したこと--}}

{{--ここに問題に対して試したことを記載してください。--}}

{{--### ここにより詳細な情報を記載してください。--}}
                        {{--</textarea>--}}

                        {{--codemirror--}}
                        <textarea data-uk-htmleditor="{markdown:true}"  name="text">
### 前提・実現したいこと

ここに質問の内容を詳しく書いてください。

### 発生している問題

### 試したこと

ここに問題に対して試したことを記載してください。

### ここにより詳細な情報を記載してください。</textarea>

                        {{--<script>--}}
                            {{--var simplemde = new SimpleMDE({element: document.getElementById("editor")});--}}
                        {{--</script>--}}


                        {{--@if ($errors->has('text'))--}}
                            {{--<div class="invalid-feedback">--}}
                                {{--{{ $errors->first('text') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('top') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection