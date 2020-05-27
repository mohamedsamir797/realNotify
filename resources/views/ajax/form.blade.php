@section('main')
    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$responseData['id']}}"></script>
    <form action="{{route('products.show', $id )}}" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
@stop