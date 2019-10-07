@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @foreach ($books as $book)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $book->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{$book->db_color}}
                    </p>
                    <a class="card-link" href="{{ route('color.show', ['book' => $book]) }}">
                        続きを読む
                    </a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $book->created_at->format('Y.m.d') }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
</script>

    

