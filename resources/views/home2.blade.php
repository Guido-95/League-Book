{{-- versione di home non utilizzata --}}

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
        
        {{-- @dd($user->comments) --}}
        {{-- {{$posts->user}} --}}
       {{-- {{$user->comments}} --}}
        @foreach ($posts as $item)
        
            <div class="single-post">
                <div class="row container-img-nick">
                    <img class="img-post mr-4" src="{{asset('storage/' . $item->img_owner)}}" alt="">
                    <div class="row flex-column">
                        <h5 class="text-left">{{$item->owner}}</h5>
                        {{facebook_time_ago($item->created_at)}}   
                    </div>
             
                </div>
                
                <h2 class="title">{{$item->title}}</h2>
                <p class="content">{{$item->content}}</p>
                @if ($item->cover)
                    <div class="text-center cover">
                        <img class="img-fluid w-75" src="{{asset('storage/' . $item->cover)}}" alt="{{$item->title}}">
                        
                    </div>
                @else
                    {{-- <img class="img-fluid" src="{{asset('images/placeholder.png')}}" alt="immagine predefinita"> --}}
                    
                @endif
                <a href="{{route('comment.create', ['postCliccato' => $item->id])}}">
                    commenta
                </a>
                @if($item->comments)
                    @foreach($item->comments as $comment)
                    <div class="commento">
                        <div class="owner-name-img">
                            <img class="img-owner" src="{{asset('storage/' . $comment->img_owner)}}" alt="">
                            {{$comment->owner}}
                        </div>
                        <div class="text-created">
                            <div class="text">
                                {{$comment->content}}
                            </div>
                            <div class="created">
                                {{$comment->created_at}}
                            </div>
                        </div>
                    </div>
                    
                    @endforeach  
                @endif
                {{-- @if ($posts->comment)
                    <div class="single-comment">
                        {{$user->comment->content}}
                    </div>
                @endif --}}
                {{-- @foreach ($comments as $comment)
                    <div class="single-comment">
                        {{$comment->content}}
                    </div>
                @endforeach --}}
                {{-- @dd($item); --}}
            </div>
            
            {{-- @dd($item->user->name); --}}
        @endforeach
   
</div>
@endsection
