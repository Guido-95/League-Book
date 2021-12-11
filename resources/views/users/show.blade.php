@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2>Dettagli profilo</h2>
        <div class="dettagli-profilo">
            <img src="{{asset('storage/' . $user->img_profile)}}" alt="">
            <div>
                Nome: <strong>  {{$user->name}} </strong>
            </div>
            <div>
                Soprannome:<strong> {{$user->surname}}</strong>
            </div>
            <div>
                Email: <strong>{{$user->email}}</strong>
            </div>
            <div>
                Data di nascita: <strong>{{$user->birthday}}</strong>
            </div>
            <div>
                Sesso: <strong>{{$user->sex}}</strong>
            </div>
            @if (Auth::user()->id == $user->id)
                <a class="btn btn-info" href="{{route('users.edit',$user->id)}}"> Modifica profilo</a>

                <form action="{{route('users.destroy',$user->id)}}" 
                    method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" onClick="return confirm('Confermi di voler cancellare ?');" class="btn btn-danger">Elimina profilo</button> </td>
                </form> 
            @endif
           
            
        </div>
        
       
        
    </div>
    
@endsection