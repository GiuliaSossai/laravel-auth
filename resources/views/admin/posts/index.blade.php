@extends('layouts.admin')

@section('content')
<div class="container">
   <h1>Lista dei post</h1>

    <table class="table my-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">titolo</th>
                <th scope="col" colspan="4">testo</th>
                <!-- <th scope="col">slug</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <!-- <td>{{ $post->slug }}</td> -->
                    <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary">show</a></td>
                    <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">edit</a></td>
                    <td><a href="" class="btn btn-danger">delete</a></td>
                </tr>
            @endforeach    
        </tbody>
    </table>

    <div>
        {{ $posts->links() }}
    </div>
        
    
</div>
@endsection

@section('title')
    Lista dei post
@endsection
