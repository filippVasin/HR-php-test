<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use App\Status;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(15);

        foreach ($orders as $order){
            $sum = 0;
            foreach ($order->products as $product){
                $sum += $product->pivot->quantity*$product->pivot->price;
            }
            $order->sum = $sum;
            $order->status_str = Status::getStr($order->status);
        }
        return view('pages.orders',['orders'=> $orders]);
    }

    public function order($id)
    {
       $order = Order::find($id);
       $sum = 0;
       foreach ($order->products as $product){
           $sum += $product->pivot->quantity*$product->pivot->price;
       }
        $order->sum = $sum;

       $partners_list = Partner::pluck('name', 'id');
       $status_list = Status::selectList();

       return view('pages.order',[
           'order' => $order,
           'partners_list' => $partners_list,
           'status_list' => $status_list,
           ]);
    }

    public function save(Request $request)
    {

        $this->validate($request, [
            'client_email' => 'required|email',
            'partner_id' => 'required',
            'status' => 'required',
        ]);

        $order = Order::find($request->input('order_id'));
        $order->client_email = $request->input('client_email');
        $order->partner_id = $request->input('partner_id');
        $order->status = $request->input('status');
        $order->save();
        return redirect()->route('orders')->with('message', 'Изменения сохранены!');;
    }

}
