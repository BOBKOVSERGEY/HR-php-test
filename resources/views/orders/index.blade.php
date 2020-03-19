@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a href="/">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>
                    {{$pageTitle}}
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ид_заказа</th>
                        <th>название_партнера</th>
                        <th>стоимость_заказа</th>
                        <th>наименование_состав_заказа</th>
                        <th>статус_заказа</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>
                                <a href="{{route('order.edit', $order->id)}}" target="_blank">
                                    {{$order->id}}
                                </a>
                            </td>
                            <td>
                                {{$order->partner->name}}
                            </td>
                            <td>
                                {{$order->fullPrice()}}
                            </td>
                            <td>
                                {{$order->productsString()}}
                            </td>
                            <td>
                                {{$order->statusString()}}
                            </td>
                            <td>

                                <a href="{{route('order.edit', $order->id)}}" target="_blank">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {{$orders->links('paginate')}}
            </div>
        </div>

    </div>

@endsection