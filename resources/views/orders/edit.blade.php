@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$pageTitle}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="{{route('order.index')}}">Список заказов</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('form.errors')
                @include('form.session-info')
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{$actionSave}}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                    {!! csrf_field() !!}

                    @if(!empty($_method))
                        <input type="hidden" name="_method" value="{{$_method}}">
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>

                                <div class="form-group">
                                    <label for="email-input" class="control-label">Email</label>
                                    <input id="email-input" type="text" class="form-control" name="order[client_email]" value="{{ $order->client_email or '' }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="partner-input" class="control-label">Партнер</label>
                                    <select name="order[partner_id]" id="partner-input" class="form-control">
                                        @foreach($partners as $partner)
                                            <option value="{{$partner->id}}" @if($partner->id == $order->partner_id) selected @endif>{{$partner->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </fieldset>
                            <fieldset>
                                <h3>Продукты</h3>
                                <div class="form-group">
                                    <ul class="list-group">
                                        @foreach($order->items as $item)
                                            <li class="list-group-item">
                                                <span class="badge">{{$item->quantity}}</span>
                                                {{$item->product->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="form-group">
                                    <label for="status-input" class="control-label">Статус заказа</label>

                                    <select name="order[status]" id="status-input" class="form-control">
                                        <option value="0" @if($order->status === 0) selected @endif>Новый</option>
                                        <option value="10" @if($order->status === 10) selected @endif>Подтвержден</option>
                                        <option value="20" @if($order->status === 20) selected @endif>Завершен</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Общая сумма заказа</label>
                                    <b>{{$order->fullPrice()}}</b>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>


                </form>

            </div>

        </div>

    </div>

@endsection