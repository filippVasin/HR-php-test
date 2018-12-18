@extends('app')

@section('content')
    <div class="container">
            @include('layouts.errors')
            <div class="col-md-12">
                    {!! Form::open(['route' => ['save']])!!}
                        <div class="form-group">
                            {!! Form::label('client_email', 'E-Mail Address:', ['class' => 'awesome'])!!}
                            {!! Form::text('client_email', $order->client_email,['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('client_email', 'Partner:', ['class' => 'awesome'])!!}
                            {!! Form::select('partner_id', $partners_list, $order->partner_id, ['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('client_email', 'Status:', ['class' => 'awesome'])!!}
                            {!! Form::select('status', $status_list, $order->status, ['class' => 'form-control'])!!}
                        </div>
                        <div class="form-group">
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
                            <h5>Общая стоимость <span class="badge badge-secondary">{{$order->sum}}</span></h5>
                        </div>
                            {!! Form::hidden('order_id', $order->id) !!}
                            {!! Form::token()!!}
                        <div class="form-group">
                            {!! Form::submit('Save',['class' => 'btn btn-primary'])!!}
                            <a href="{{ route('orders') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection