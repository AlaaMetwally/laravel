@extends('layouts.master')
@section('content')

<!-- <h1>Posts Index</h1> -->

<div class="container">
        <div class="table-wrapper">         
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                                            
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('posts.create')}}" class="btn btn-success" data-toggle="modal"> <span>Add New Post</span></a>
                    </div>
                    
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>  
                        <th>Title</th>
                        <th>Posted By</th>
                        <th>Created at</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
@php
$count=0
@endphp
        @foreach ($posts as $post)
                    <tr>
                    @php $count++ @endphp
                        <td>{{$page*4+$count}}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->created_at->toDateString() }}</td>
                        <td>{{$post->slug}}</td>
                        <td>
                        <form method="post" action="/posts/{{$post->id}}" >
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button onclick="return confirm('are you sure')" type="submit" class="btn btn-danger" > Delete </button>
    <a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm active" role="button">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm active" role="button">Edit</a>
</form>

                        </td>
                    </tr>
        @endforeach           
                </tbody>
            </table>
           {{$posts->links()}}
        </div>
    </div>


@endsection