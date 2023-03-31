@extends('layouts.app')

@section('content')

    <section class="content">
        <h2>Posts list</h2>

        @foreach($posts as $post)

            <article class="mb-5">
                <div>
                    <h3>{{  $post->title }}</h3>
                </div>
                <div>
                    <p>{{  Str::limit($post->content, 20) }}</p>
                    <div>
                        Author: {{ $post->user->name }}
                    </div>
                </div>
                <a class="button is-primary is-small" href="{{ route('posts.show', $post->id) }}">See post</a>
            </article>

        @endforeach
    </section>
@endsection

