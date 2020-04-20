@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">Avatar</label>
                            <img src="" alt="">
                            <div class="col-md-6">
                                <img src="{{ auth()->user()->getAvatar() }}" alt="" height="128">
                                {{-- <img src="{{ asset('storage/'.auth()->user()->avatar) }}" alt="" height="128"> --}}
                                {{-- <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" height="128"> --}}

                                @if (auth()->user()->avatar !== null)
                                    <a href="{{ route('avatar.delete') }}"
                                        class="btn btn-danger"

                                        onclick="event.preventDefault();
                                            document.getElementById('remove-avatar').submit();
                                        ">Delete Avatar</a>
                                @endif

                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required>

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('avatar.delete') }}" id="remove-avatar" method="POST">
                        {{ csrf_field () }}
                        {{ method_field('DELETE') }}
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
