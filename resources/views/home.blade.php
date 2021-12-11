{{-- versione di home utilizzata --}}
@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
        {{ session('message') }}
        </div>
    @endif
    @if (session('message-danger'))
        <div class="alert alert-danger">
            {{ session('message-danger') }}
        </div>
    @endif
    {{-- @if (session('status'))
        <div class="alert alert-danger mb-4">
        {{ session('status') }}
        </div>
    @endif --}}
    
<div class="container">
   
        <a href="{{route('posts.create')}}">
            vuoi fare un bel post?
        </a>
        
        <div id="root">

       
            @foreach ($posts as $item)
             
                <post :post='{{$item}}' :comments='{{$item->comments}}' commenta='{{route('comment.create', ['postCliccato' => $item->id])}}' postdate='{{facebook_time_ago($item->created_at)}}' > </post>
            @endforeach
        </div>
</div>
@endsection
