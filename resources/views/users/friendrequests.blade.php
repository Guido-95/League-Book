@extends('layouts.app')

@section('content')
        @if (session('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
        @endif
        @if (session('message-danger'))
        <div class="alert alert-danger mb-4">
            {{ session('message-danger') }}
        </div>
        @endif
    <div class="container text-center">
        <h1>Richieste d'amicizia</h1>
        @if(count($friendRequests) >= 1)
            @foreach ($friendRequests as $request)
                <div class="single-request">
                    <div>
                        <img class="img" src="{{asset('storage/' . $request->img_profile)}}" alt="">
                    
                        {{$request->name}} {{$request->surname}}
                    </div>
                    <div class="icons">
                        <form action="{{route('friend-request-success')}}" method="POST">
                            @csrf
                            <input type="text" name="mandanteRichiesta" value="{{$request->id}}" hidden>
                            <button class="btn btn-success" type="submit" >Accetta</button>
                        </form>
                        
                        <form action="{{route('friend-request-failed')}}" method="POST">
                            @csrf
                            <input type="text" name="mandanteRichiesta" value="{{$request->id}}" hidden>
                            <button class="btn btn-danger" type="submit" >Rifiuta</button>
                        </form>
                    
                    
                    </div>
                </div>
                
            @endforeach
           
                
            @else
                <h2>non hai richieste</h2>
            
        @endif
    </div>
  
@endsection