@extends('layouts.app')

@section('content')
    <h1 class=" text-center">chat con {{$friendChat->name}}</h1>
    <div class="container text-center">
        
        <div class="chat">
            <div class="messages" id="data">
                @if(count($messages)>= 1)
                    @foreach ($messages as $message)
                        @if($message->user1 == $user1->id)
                        <div class="message1">
                            <div class="single-message">
                            
                                <div class="text">
                                    {{$message->message}}
                                    <div class="date1">
                                        {{$message->created_at}}
                                    </div>
                                </div>
                                <div class="name">
                                    <img src="{{asset('storage/' . $user1->img_profile)}}" alt="">
                                    {{-- {{$user1->img_profile}} --}}
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        @else
                        <div class="message2">
                            <div class="single-message">
                                <div class="name">
                                    <img src="{{asset('storage/' . $user2->img_profile)}}" alt="">
                                </div>
                                <div class="text">
                                    {{$message->message}}
                                </div>
                                
                                <div class="date2">
                            
                                    {{$message->created_at}}
                                </div>
                            </div>
                        
                        </div>
                        
                        @endif
                    @endforeach
                @else
                    no messaggi dude
                @endif
            </div>
            <div class="button-message">
                <form class="prova" action="{{route('send-message')}}" method="POST">
                    @csrf
                    <input hidden type="text" name='id' value='{{$friendChat->id}}'>
                    <input type="text" name='message' autofocus>
                    <button type="submit">invia</button>
                </form>
            </div>
            
        </div>
        <script>
            
            window.onload = function(){
                var elem = document.getElementById('data');
                elem.scrollTop = elem.scrollHeight;
            }
          
            
            
        </script>
    </div>

@endsection