@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                @if($post->imagen)
                    <img src="{{ $post->get_imagen }}" class="card-img-top mb-4">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                        @if ($post->iframe )

                            <div class=" ratio ratio-16x9">
                                {!! $post->iframe !!}
                            </div>
                        @endif
                    
                    <p class="card-text">
                        {{$post->body}}
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{$post->user->name}}
                        </em>
                        {{$post->created_at->format('d M Y')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection