@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title">Список заказов</h1>

        @if(session('success'))
            <div class="metro-alert metro-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="metro-table-container">
            <table class="metro-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Дата создания</th>
                        <th>ФИО покупателя</th>
                        <th>Статус</th>
                        <th>Итоговая цена (₽)</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                <span class="metro-status-badge {{ $order->status == 'new' ? 'metro-status-new' : 'metro-status-completed' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="metro-price">{{ number_format($order->quantity * $order->product->price, 2, ',', ' ') }}</td>
                            <td class="metro-actions">
                                <a href="{{ route('orders.show', $order->id) }}" class="metro-btn metro-btn-sm metro-btn-view">
                                    <i class="metro-icon">👁️</i> Просмотр
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection