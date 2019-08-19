@extends('layouts.app')

@section('content')
     <div class="container mt-4">
         <div class="mb-4">
             <a href="{{route('posts.create')}}" class="btn btn-primary">
                 投稿の作成
             </a>
         </div>
{{--         <img src="{{asset('/storage/post_img/gopher.png')}}" alt="img">--}}
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header">
                    {{$post->user->name}} <br>
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

                    @if(Auth::user())
                    <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>|
                    <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
                    @endif

                    @if ($post->comments->count())
                        <span class="badge badge-primary">
                            コメント {{ $post->comments->count() }}件
                        </span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
</script>

    

