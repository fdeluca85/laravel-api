@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>{{$category->name}}</h2></div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{route("categories.edit", $category->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                        <form action="{{route("categories.destroy", $category->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>                               
                    <div class="mb-3">
                        Slug: {{$category->slug}}
                    </div>
                    @if (count($category->posts) >0)
                        <div class="mb-3">
                            <h3>Lista posti associati</h3>
                            <ul>
                                @foreach ($category->posts as $post)
                                    <li>
                                        {{$post->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection