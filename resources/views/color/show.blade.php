@extends('layouts.app')

@section('content')
    <div class="container mt-4 color">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                {{ $book->title }}
            </h1>
            <div class="mb-5">
                {{$book->db_color}}
            </div>
        </div>

        <div class="mb-4 text-right">
            <a class="btn btn-primary" href="{{ route('color.edit', ['book' => $book]) }}">
                編集する
            </a>
        </div>
    </div>

    <div class="container mt-4">
        <div class="border p-4 color" style="background-color: #{{$book->db_color}}">

        </div>
    </div>
@endsection