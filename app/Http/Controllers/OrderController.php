<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService) {}

    public function store(OrderRequest $request): RedirectResponse
    {
        $this->orderService->createOrder($request->validated());

        return back()->with('success', 'Заказ успешно оформлен!');
    }

    public function index(): View
    {
        $orders = $this->orderService->getAllOrders();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    public function update(Order $order, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,completed',
        ]);

        $order->update($validated);

        return to_route('orders.index')
            ->with('success', 'Статус заказа обновлён!');
    }
}