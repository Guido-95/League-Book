@extends('layouts.app')



@section('content')
<div class="container text-center">
    <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- {{$prova}} --}}
        <div class="form-group">
            <label for="comment">Content</label>
            <input type="content" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{old('content')}}" placeholder="Inserisci il commento">
            @error('content')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <input type="hidden" name="postCommento" id="hiddenField" value="{{$postCommento}}" />
        <button type="submit" class="btn btn-primary d-block m-auto">Salva</button>

    </form>
</div>
@endsection