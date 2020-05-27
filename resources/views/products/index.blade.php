@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach( $products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                           {{ $product->title }}
                        </div>
                        <div class="card-body">
                            {{ $product->description }}
                        </div>
                        <img src="/mob.jpg" style="height: 300px;" class="mb-3">

                        <div class="card-footer">
                                <span class="bg-warning btn ">{{ $product->price }}</span>
                                <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
