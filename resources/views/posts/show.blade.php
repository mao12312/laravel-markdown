@extends('layouts.app')

@section('head')
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">--}}
    {{--<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="border p-4">

            <form method="POST" style="display: inline-block" action="{{route('posts.destroy', ['post'=> $post])}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">削除する</button>
            </form>

            <h1 class="h5 mb-4">
                {{ $post->title }}
            </h1>
            <div class="wordbreak">
                <p class="mb-5">
                    {!! $post->mark_text !!}
                </p>
            </div>
            <like
                    :post-id="{{ json_encode($post->id) }}"
                    :user-id="{{ json_encode($userAuth->id) }}"
                    :default-Liked="{{ json_encode($defaultLiked) }}"
                    :default-Count="{{ json_encode($defaultCount) }}"

            ></like>
            @forelse($post->images as $post_image)
                <img src="{{'/storage/post_img/'.$post_image->path}}" alt="">
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                    @csrf

                    <input
                            name="post_id"
                            type="hidden"
                            value="{{ $post->id }}"
                    >

                    <div class="form-group">
                        <label for="body">
                            投稿文
                        </label>

                        <textarea
                                type="text"
                                id="text"
                                name="text"
                                class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"
                                rows="4"
                        >{{ old('text') }}</textarea>
                        @if ($errors->has('text'))
                            <div class="invalid-feedback">
                                {{ $errors->first('text') }}
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>
                @forelse($post->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->text)) !!}
                            {{--                            {!! $comment->mark_text !!}--}}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse

            </section>
        </div>
    </div>
@endsection