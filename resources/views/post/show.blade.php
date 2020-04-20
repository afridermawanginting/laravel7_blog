@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $post->title }} | {{ $post->category->name }} <small class="float-right">{{ $post->created_at }}</small></div>

                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">Tambahkan Komentar</div>

                    @foreach ($post->comments()->get() as $comment)
                        <div class="card-body">
                            <h3>{{ $comment->user->name }} <small class="float-right">{{ $comment->created_at->diffForHumans() }}</small></h3> 

                            <p>{{ $comment->message }}</p>
                        </div>
                    @endforeach

                    <div class="card-body has-error{{ $errors->has('message') ? ' has-error' : '' }}">
                        <form action="{{ route('post.comment.store', $post) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Berikan Komentar..">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="help-block">
                                    <p>{{ $errors->first('message') }}</p>
                                </span>
                            @endif
                            <input class="btn-primary" type="submit" value="Komentar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection