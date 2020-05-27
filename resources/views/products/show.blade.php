@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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
                            {{ $product->price }}
                        </div>

                </div>
        </div>
        </div>
    </div>

@endsection
