@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
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

                        <textarea id="editor" name="text" rows="8" cols="40">{{ old('text') }}</textarea>

                        <script>
                            var simplemde = new SimpleMDE({element: document.getElementById("editor")});
                        </script>


                        @if ($errors->has('text'))
                            <div class="invalid-feedback">
                                {{ $errors->first('text') }}
                            </div>
                        @endif
                    </div>

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