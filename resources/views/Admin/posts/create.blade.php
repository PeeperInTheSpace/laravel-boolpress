@extends('layouts.dashboard')

@section('content')

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titolo:</label>
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{ old('title', '') }}">
        </div>
        <div>
            <label for="content">Descrizione:</label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
        </div>
        <div>
            <input type="submit" value="CREA">
        </div>
    </form>

@endsection
