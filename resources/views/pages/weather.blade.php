@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Температура в Брянске:</div>
                <div class="panel-body">
                    @if (isset($weather->status))
                        Key Error
                    @else
                        {{$weather->fact->temp}} градусов
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
