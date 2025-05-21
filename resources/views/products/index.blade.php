@extends('layouts.app')

@section('title', 'Список товаров')

@section('content')
    <div class="metro-container">
        <div class="metro-header">
            <h1 class="metro-title">Список товаров</h1>
            <a href="{{ route('products.create') }}" class="metro-btn metro-btn-accent">
                + Добавить товар
            </a>
        </div>

        <div class="metro-table-container">
            <table class="metro-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена (₽)</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td class="metro-price">{{ number_format($product->price, 2, ',', ' ') }}</td>
                            <td class="metro-actions">
                                <a href="{{ route('products.show', $product->id) }}" class="metro-btn metro-btn-sm metro-btn-view">
                                    <i class="metro-icon">👁️</i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="metro-btn metro-btn-sm metro-btn-edit">
                                    <i class="metro-icon">✏️</i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="metro-form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="metro-btn metro-btn-sm metro-btn-delete" onclick="return confirm('Удалить товар?')">
                                        <i class="metro-icon">🗑️</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection