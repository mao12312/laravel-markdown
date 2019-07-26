@extends('layouts.app')

@section('content')
     <div class="container mt-4">
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->text, 200))) !!}
                    </p>
                <a href="{{route('posts.show',['post'=> $post])}}">
                    詳細
                </a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        {{-- 投稿日時 {{ $post->created_at->format('Y.m.d H:i') }} --}}
                        投稿日時 {{ $post->created_at->format('Y.m.d') }}
                    </span>

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="mb-4">
            <a href="{{route('posts.create')}}" class="btn btn-primary">
                投稿の作成
            </a>
        </div>
    </div>
@endsection
    
