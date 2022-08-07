@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class=" row mt-5">
             <a href="{{route('blog-index')}}"><button type="button" class="btn btn-primary ">Blogs List</button></a>
             <a href="{{route('blogs.create')}}"><button type="button" class="btn btn-primary mt-5">Create A Blog</button></a>
        </div>
    </div>
</div>

@endsection
