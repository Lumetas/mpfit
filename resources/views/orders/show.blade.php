@extends('layouts.app')

@section('title', 'Детали заказа')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title">Детали заказа #{{ $order->id }}</h1>

        @if(session('success'))
            <div class="metro-alert metro-alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="metro-alert metro-alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="metro-detail-card">
            <div class="metro-detail-row">
                <span class="metro-detail-label">Дата создания:</span>
                <span class="metro-detail-value">{{ $order->created_at->format('d.m.Y H:i') }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">ФИО покупателя:</span>
                <span class="metro-detail-value">{{ $order->customer_name }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Товар:</span>
                <span class="metro-detail-value">{{ $order->product->name }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Количество:</span>
                <span class="metro-detail-value">{{ $order->quantity }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Цена за единицу:</span>
                <span class="metro-detail-value accent">{{ number_format($order->product->price, 2, ',', ' ') }} ₽</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Итоговая цена:</span>
                <span class="metro-detail-value accent">{{ number_format($order->quantity * $order->product->price, 2, ',', ' ') }} ₽</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Комментарий:</span>
                <span class="metro-detail-value">{{ $order->comment ?? 'Нет' }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Статус:</span>
                <span class="metro-status-badge {{ $order->status == 'new' ? 'metro-status-new' : 'metro-status-completed' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>

        <form action="{{ route('orders.update', $order->id) }}" method="POST" class="metro-form">
            @csrf
            @method('PUT')
            
            <div class="metro-form-group">
                <label class="metro-form-label">Обновить статус:</label>
                <select name="status" class="metro-form-control">
                    <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
                </select>
            </div>
            
            <div class="metro-form-actions">
                <button type="submit" class="metro-btn metro-btn-accent">Сохранить</button>
                <a href="{{ route('orders.index') }}" class="metro-btn metro-btn-secondary">Назад</a>
            </div>
        </form>
    </div>
@endsection