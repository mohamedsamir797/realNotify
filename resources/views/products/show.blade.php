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
                            <p id="price">{{ $product->price }}</p>
                        </div>
                </div>
        </div>
            <div class="col col-4">
                <a id="checkout" href="{{ route('products.checkout',$product->price) }}" class="btn btn-primary">Checkout</a>
                 <br>
                <br>
                <div id="showPayForm"></div>

                @if(isset($success))
                    <div class="alert alert-success text-center">
                        تم الدفع بنجاح
                    </div>
                @endif


                @if(isset($fail))
                    <div class="alert alert-danger text-center">
                        فشلت عملية الدفع
                    </div>
                @endif
            </div>
        </div>

    </div>

@endsection
{{--  ===================  step 1 ================       --}}
@section('scripts')
    <script>
        $(document).on('click', '#checkout', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: "{{route('products.checkout')}}",
                data: {
                    price: $('#price').text(),
                    product_id: '{{$product ->id}}',
                },
                success: function (data) {
                    if (data.status == true) {
                        $('#showPayForm').empty().html(data.content);
                    } else {
                    }
                }, error: function (reject) {
                }
            });
        });
    </script>
    @endsection
