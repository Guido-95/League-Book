
@extends('layouts.app')
        
    @section('content')
    
        <div id="root">
            <messages :userid='{{$user->id}}' :friendid={{$friend}}></messages>
        </div>

        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @endsection   
     
