@extends('layouts.app')



@section('content')
<div class="container text-center">
    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" placeholder="Inserisci il titolo">
            @error('title')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="cover">Inserisci una copertina</label>
            <input type="file" name ='cover' class="form-control-file" id="cover">
           
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="content" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{old('content')}}" placeholder="Inserisci il content">
            @error('content')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary d-block m-auto">Salva</button>

    </form>
</div>
@endsection