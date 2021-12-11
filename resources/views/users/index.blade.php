@extends('layouts.app')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
        {{ session('message') }}
        </div>
    @endif
        
    <div class="container">
        @foreach ($users as $user)
        {{ $amici = false}}
            {{-- @dd(count($users)) --}}
            <div class="single-user">
                <div class="img-name">
                    <img src="{{asset('storage/' . $user->img_profile)}}" alt="">
                    {{$user->name}} {{$user->surname}}
                </div>
                <a class="btn btn-success mx-3" href="{{ route('users.show', $user->id) }}">
                    <i class="fas fa-user"></i>
                </a>
                
               
                @foreach ($friends as $item)
                
                    @if ($item->user_id == Auth::user()->id && $item->friend_id == $user->id)
                        {{-- {{$item}} --}}
                        <p hidden>{{$amici = true}}</p> 
                    
                        @if($item->accepted == 0)
                           <span class="badge badge-warning "> Richiesta inviata </span> 
                        @elseif($item->accepted == 1)
                            <span class="badge badge-success"> Già amici  </span> 
                      
                        @endif 
                    @endif   
                    {{-- @else --}}
                @endforeach  
                
                @if($amici == false)
                    <form action="{{route('request-friend')}}" method="POST">
                    @csrf
                        <input type="text" name="id_user" value="{{$user->id}}" hidden>
                        <button class="btn btn-info" type="submit" > aggiungi agli amici </button>
                    </form>
                @endif
                {{-- {{$friends}} --}}
   
                {{-- @foreach ($friends as $friend)
                    @if ($friend->user_id == Auth::user()->id && $friend->friend_id == $user->id)
                        @if( $friend->accepted == 1)
                            sono già amici
                            @dump($prova += 1)
                        @endif
                        @break
                    @else
                        
                        <form action="{{route('request-friend')}}" method="POST">
                        @csrf
                            <input type="text" name="id_user" value="{{$user->id}}" hidden>
                            <button class="btn btn-info" type="submit" > aggiungi agli amici </button>
                        </form>
                        @dump($prova += 1)
                        @break
                    @endif
                        
                @endforeach --}}
                

                {{-- <a class="" href="{{route('request-friend',['friendCliccato'=>$user->id])}}">Aggiungi agli amici</a>
          --}}
            </div>
        @endforeach
    </div>

@endsection