@extends('layouts.app')

@section('content')
@if (session('message'))
<div class="alert alert-success mb-4">
    {{ session('message') }}
</div>
@endif

<div class="container text-center">
    <h1>Lista amici ({{count($friends)}})</h1>
    @if(count($friends) >= 1)
        @foreach ($friends as $friend)

        <div class="friend">
            <div>
                <img class="img" src="{{asset('storage/' . $friend->img_profile)}}" alt="">
            
                {{$friend->name}} {{$friend->surname}}
            </div>
            <div class="icons">
                {{-- <form action="{{route('friend-request-success')}}" method="POST">
                    @csrf
                    <input type="text" name="prova" value="{{$friend->id}}" hidden>
                    <button class="btn btn-success" type="submit" >Accetta</button>
                </form> --}}
                <form action="{{route('messages')}}" method="POST" >
                    @csrf
                    <input type="text" name="friend-id" value="{{$friend->id}}" hidden >
                    <button class="btn btn-success">
                        <i class="fas fa-comment-alt"></i>
                    </button>
                </form>
                {{-- <a class="btn btn-success mx-3" href="{{route('messages')}}" >
                    <i class="fas fa-comment-alt"></i>
                </a> --}}
                <a class="btn btn-success mx-3" href="{{ route('users.show', $friend->id) }}">
                    <i class="fas fa-user"></i>
                </a>
                <form action="{{route('remove-friend')}}" method="POST">
                    @csrf
                    <input type="text" name="id-remove-friend" value="{{$friend->id}}" hidden>
                    <button onClick="return confirm('Confermi di voler rimuovere ?');" class="btn btn-danger" type="submit" ><i class="fas fa-times-circle"></i></button>
                </form>
            
            
            </div>
        </div>
        @endforeach

            
        @else
        <h2>non hai amici, aggiungine qualcuno da  <a class="navbar-brand" href="{{ route('users.index') }}">
            qui
        </a> </h2>  
  
    @endif

</div>

@endsection