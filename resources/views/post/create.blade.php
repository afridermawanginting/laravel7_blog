@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Write a Post</div>

                    <div class="card-body">
                        <form action="{{ route('post.store') }}" class="" method="post">
                        {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="" class="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>                
                                </div> 

                                <div class="form-group col-md-10 has-error{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="" class="">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Post title..." value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                            <p>{{ $errors->first('title') }}</p>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group has-error{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="" class="">Content</label>
                                <textarea class="form-control" name="content" id="" cols="30" rows="10" placeholder="Post Content...">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('content') }}</p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 