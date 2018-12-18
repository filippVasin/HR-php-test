@extends('app')

@section('content')
    <div class="container">
            @include('layouts.errors')
            <div class="col-md-12">
                    {!! Form::open(['route' => ['save']])!!}
                        <div class="form-group">
                            {!! Form::label('inputEmail', 'E-Mail Address:', ['class' => 'awesome'])!!}
                            {!! Form::text('client_email', $order->client_email,['class' => 'form-control'])!!}
                        </div>
                         <div class="form-group">
                            {!! Form::select('partner_id', $partners_list, $order->partner_id, ['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::select('status', $status_list, $order->status, ['class' => 'form-control'])!!}
                        </div>
                            {!! Form::hidden('order_id', $order->id) !!}
                            {!! Form::token()!!}
                        <div class="form-group">
                            {!! Form::submit('Save')!!}
                        </div>
                    {!! Form::close() !!}

                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                    </tr>
                    @foreach ($order->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }} </td>
                            <td>{{ $product->price }} / шт.<br>
                            <td>{{ $product->pivot->quantity }} шт.</td>
                        </tr>
                    @endforeach
                </table>
               Общая стоимость - {{$order->sum}}
            </div>
        </div>
    </div>
@endsection