@extends('layouts.dashboard')

@section('content')

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12">
                <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
            </div>
        @endforeach

        <div class="row mb-5">
            <div class="col-12">
                <a href="{{ route('admin.posts.create') }}">NUOVO</a>
            </div>
        </div>

    </div>

@endsection
