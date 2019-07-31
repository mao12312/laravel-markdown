@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

        {{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--<title>Laravel 5.7 Multiple Image Upload Example - Tutsmake.com</title>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}

    {{--<style>--}}
        {{--.container{--}}
            {{--padding: 10%;--}}
            {{--text-align: center;--}}
        {{--}--}}

    {{--</style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}
    {{--<h2 style="margin-left: -48px;">Laravel 5.7 Multiple Image Upload Example - Tutsmake.com</h2>--}}
    {{--<br>--}}

    {{--<br>--}}
    {{--@if ($message = Session::get('success'))--}}

        {{--<div class="alert alert-success alert-block">--}}

            {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}

            {{--<strong>{{ $message }}</strong>--}}

        {{--</div>--}}
        {{--<br>--}}
    {{--@endif--}}

    {{--@if (count($errors) > 0)--}}

        {{--<div class="alert alert-danger">--}}

            {{--<strong>Opps!</strong> There were something went wrong with your input.--}}

            {{--<ul>--}}

                {{--@foreach ($errors->all() as $error)--}}

                    {{--<li>{{ $error }}</li>--}}

                {{--@endforeach--}}

            {{--</ul>--}}

        {{--</div>--}}
        {{--<br>--}}
    {{--@endif--}}
    {{--<form action="{{ url('save') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">--}}
        {{--@csrf--}}
        {{--<div class="avatar-upload col-6">--}}

            {{--<div class=" form-group avatar-edit">--}}
                {{--<input type='file' id="image" name="image[]" accept=".png, .jpg, .jpeg" />--}}
                {{--<label for="imageUpload"></label>--}}

            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="form-group col-3">--}}
            {{--<button type="submit" class="btn btn-success">Submit</button>--}}
        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}

{{--</body>--}}
{{--</html>--}}