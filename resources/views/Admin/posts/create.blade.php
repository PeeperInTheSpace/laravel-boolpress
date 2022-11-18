@extends('layouts.dashboard')

@section('content')

@if ($errors->any())
    <div class="row">
        <div class="col-12 bg-danger">
            Ci sono errori...
        </div>
    </div>
@endif


    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div @error('title') class="is-invalid" @enderror>
            <label for="title">Titolo:</label>
            <input type="text" required minlength="5" maxlength="255" name="title" value="{{ old('title', '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Categories -->

        <div>
            <label for="category_id">Categoria:</label>
            <select name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('$category_id', -1) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tags -->

        <div>
            <label>Tags:</label>
            @foreach ($tags as $tag) {

                <label>
                    {{ $tag->name }}
                </label>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
            }

            @endforeach
        </div>

        <div>
            <label for="tags_id">Categoria:</label>
            <select name="tags_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $tags)
                    <option value="{{ $tags->id }}"
                        {{ $tags->id == old('$tags_id', -1) ? 'selected' : '' }}>
                        {{ $tags->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div @error('content') class="is-invalid" @enderror>
            <label for="content">Descrizione:</label>
            <textarea name="content" required cols="30" rows="10">{{ old('content', '') }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="CREA">
        </div>
    </form>

@endsection
