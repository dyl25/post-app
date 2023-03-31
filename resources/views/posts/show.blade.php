@extends('layouts.app')

@section('content')

    <section class="content">
        <article>
            <div class="columns">
                <h2>{{ $post->title  }}</h2>
            </div>
            <div class="columns">
                <p>{{  $post->content }}</p>
            </div>
        </article>

        @livewire('comment-form', ['postId' => $post->id])
    </section>

@endsection
