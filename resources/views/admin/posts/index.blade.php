@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Lista dei post</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">titolo</th>
                <th scope="col">testo</th>
                <th scope="col">slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->slug }}</td>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>
        
    
</div>
@endsection
