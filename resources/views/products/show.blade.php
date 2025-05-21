@extends('layouts.app')

@section('title', 'Детали товара')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title">Детали товара</h1>

        <div class="metro-detail-card">
            <div class="metro-detail-row">
                <span class="metro-detail-label">Название:</span>
                <span class="metro-detail-value">{{ $product->name }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Категория:</span>
                <span class="metro-detail-value">{{ $product->category->name }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Описание:</span>
                <span class="metro-detail-value">{{ $product->description ?? 'Нет описания' }}</span>
            </div>
            <div class="metro-detail-row">
                <span class="metro-detail-label">Цена:</span>
                <span class="metro-detail-value accent">{{ number_format($product->price, 2, ',', ' ') }} ₽</span>
            </div>
        </div>

        <a href="{{ url()->previous() }}" class="metro-btn metro-btn-accent metro-btn-back">
            ← Назад
        </a>
    </div>
@endsection