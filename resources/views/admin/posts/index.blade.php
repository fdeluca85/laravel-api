@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Posts List</div>

                <div class="card-body">
                    <div class="mb-3"><a href="{{route("posts.create")}}"><button type="button" class="btn btn-success">Crea post</button></a></div>
                    
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo  </th>
                            <th scope="col">Slug</th>
                            <th scope="col">Categoria</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                          <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>
                              @if ($post->category)
                              <span class="badge badge-pill badge-info">{{$post->category->name}}</span>                           
                                @else
                                <span class="badge badge-pill badge-secondary">Nessuna categoria</span>                                
                                @endif</td>
                            <td><a href="{{route("posts.show", $post->id)}}"><button type="button" class="btn btn-primary">Vai</button></a></td>
                            
                            <td><a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a></td>
                            <td><form action="{{route("posts.destroy", $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                            </td>
                            
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection