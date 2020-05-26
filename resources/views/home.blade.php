@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach( $posts as $post)
            <div class="card">
                <div class="card-header">
                     {{ $post->title }} By <strong>{{ $post->user->name }} - @if(auth()->id() == $post->user->id) The Owner @endif</strong>
                </div>
                <div class="card-body">

                    {{$post->content}}
                </div>
                <div>

                </div>
                @if($post->user->id != auth()->id())
                <form action="{{ route('comments.save',$post->id ) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" style="width: 600px;margin-left: 50px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary ml-4 mb-4">Add reply</button>
                </form>
                    @endif
            </div>
                <br>
                <br>
                @endforeach
        </div>
    </div>
</div>
@endsection
