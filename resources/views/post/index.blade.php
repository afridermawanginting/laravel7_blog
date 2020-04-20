@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a> | {{ $post->category->name }} - {{ $post->created_at->diffForHumans() }}

                            <div class="float-right">
                                <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('post.delete', $post)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <p>{{ Str::limit($post->content, 100, '...') }}</p>
                        </div>
                    </div>
                    <br>
                @endforeach

                {!! $posts->render() !!}

            </div>
        </div>
    </div>
@endsection