@extends('layouts.dashboard')

@section('content')

@if ($errors->any())

        <div class="col-12 bg-danger">
            Ci sono errori...
        </div>

@endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="title">Titolo:</label>
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="content">Descrizione:</label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tags -->

        @if ($errors->any())
            <div class="row">
                <div class="col-12 bg-danger">
                    Ci sono errori...
                </div>
            </div>
        @else
            <div>
                <label>TAGS:</label>
                @foreach ($tags as $tag)
                    <label>{{ $tag->name }}</label>
                    <input {{ $post->tags->contains($tag) ? 'checked' : ""}}
                    type="checkbox" name="tags[]" value="{{ $tag->id }}">
                @endforeach
            </div>
        @endif

        <div>
            <input type="submit" value="AGGIORNA">
        </div>
    </form>

@endsection
