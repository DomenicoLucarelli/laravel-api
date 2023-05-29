@extends('layouts/admin')

@section('content')
    
<div class="container text-center my-5">

    <form class="d-flex flex-column align-items-center gap-2" action="{{route('admin.technologies.update', $technology)}}" method="post">
        @csrf
        @method('PUT')

        <label for="name">Inserisci nome Tecnologia</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name',$technology->name)}}">

        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <label for="color">Inserisci colore in HEX</label>
        <input class="form-control @error('color') is-invalid @enderror" type="text" id="color" name="color" value="{{old('color', $technology->color)}}">

        @error('color')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror

        <button class="btn btn-primary" type="submit">Modifica</button>

    </form>
</div>

@endsection