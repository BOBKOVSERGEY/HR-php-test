<?php


namespace App\Http\Controllers;


use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['partner', 'items', 'products'])->paginate(25);

        return view('orders.index', [
            'pageTitle' => 'Список заказов',
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'pageTitle' => 'Редактировать заказ',
            'order' => $order,
            'actionSave' => route('order.update', $order->id),
            '_method' => "PATCH",
            'partners' => Partner::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $dataSave = $this->validate($request, [
            'order.client_email' => 'required|email',
            'order.partner_id' => 'required|exists:partners,id',
            'order.status' => 'required|in:0,10,20'
        ]);

        $order->update($dataSave['order']);

        return redirect(route('order.edit', $order->id))->with([
            'server_message' => 'Запись успешно обновлена'
        ]);
    }

}