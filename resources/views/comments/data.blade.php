@extends('layouts.app')

@section('content')

    <section class="content">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Post</th>
                <th>Number of comments</th>
                <th>Posted comments</th>
                <th>Deleted comments</th>
            </tr>
            </thead>
            <tbody>
            @forelse($commentsData as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td class="has-text-info"><a href="{{ route('posts.show', $data->id) }}">{{ Str::limit($data->title, 5) }}</a></td>
                <td>{{ $data->comments_count }}</td>
                <td>{{ $data->posted_comments_count }}</td>
                <td>{{ $data->deleted_comments_count }}</td>
            </tr>
            @empty
                No data
            @endforelse
            </tbody>
        </table>
    </section>

@endsection
