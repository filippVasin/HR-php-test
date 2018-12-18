@extends('app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Партнер</th>
                        <th>Стоимость заказа</th>
                        <th>Наименование заказа</th>
                        <th>Статус заказа</th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td><a href="{{ route('order', $order->id) }}">{{ $order->id }}</a></td>
                            <td>{{ $order->partner->name }}</td>
                            <td>{{$order->sum}}<br>
                            </td>
                            <td>
                                @foreach ($order->products as $product)
                                    {{ $product->name }} - {{$product->pivot->quantity}} шт. <br>
                                @endforeach
                            </td>
                            <td>{{ $order->status_str }}</td>
                        </tr>
                    @endforeach
                </table>
                {{ $orders->render() }}
            </div>
        </div>
    </div>
@endsection