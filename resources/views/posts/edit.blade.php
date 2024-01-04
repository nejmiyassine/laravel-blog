@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
    <form method="POST" action="{{ route('posts.update', $post->id) }}" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" id="title" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea rows="4" type="text" name="description" id="description" class="form-control">{{ $post->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label" for="post_creator">Post Creator</label>
            <select type="text" name="post_creator" id="post_creator" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
