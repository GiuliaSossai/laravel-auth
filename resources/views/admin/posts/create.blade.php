@extends('layouts.admin')

@section('content')
<div class="container">
   <h1>Inserisci un nuovo post</h1>

   @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="post">
        @csrf
        <div class="my-5">
            <label for="title" class="form-label">Titolo</label>
            <input 
                type="text" class="form-control @error('title') is-invalid @enderror" 
                id="title" name="title"
                value="{{ old('title') }}"
            >
            @error('title')
                <p class="gs-error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="content" class="form-label">Testo</label>
            <textarea class="form-control @error('content') is-invalid @enderror" 
                id="content" name="content" rows="7"
            >{{ old('content') }}
            </textarea>
            @error('content')
                <p class="gs-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-4">submit</button>
        <button type="reset" class="btn btn-secondary mt-4">reset</button>
    </form>

    
        
    
</div>
@endsection

@section('title')
    Nuovo post
@endsection