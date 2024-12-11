@extends('admin.layouts.app')

@section('content')

   <div class="container">
        <div class="blog-detail">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-header">
                        <h1>{{ $blog->title }}</h1>
                        <p><small>Được viết bởi: {{ $blog->user->name }}</small></p>
                        <p><small>	</small></p>
                    </div>
                    <div class="blog-content">
                        <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-3">
                        <p>{!! nl2br(e($blog->content)) !!}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="related-blogs">
                        <h3>Bài viết liên quan</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection