@extends('layouts.app')

@section('title', 'Каталог товаров')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title mb-4">Каталог товаров</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="metro-alert metro-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="metro-alert metro-alert-danger">
                <strong>Ошибка!</strong> Пожалуйста, исправьте следующие ошибки:
                <ul class="metro-list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="metro-grid">
            @foreach($products as $product)
                <div class="metro-card">
                    <div class="metro-card-image-container">
                        <img src="{{ asset("image/image.jpg") }}" class="metro-card-image" alt="{{ $product->name }}">
                    </div>
                    <div class="metro-card-body">
                        <h3 class="metro-card-title">{{ $product->name }}</h3>
                        <p class="metro-card-text"><span class="metro-label">Категория:</span> {{ $product->category->name }}</p>
                        <p class="metro-card-text"><span class="metro-label">Цена:</span> {{ number_format($product->price, 2, ',', ' ') }} ₽</p>
                        <div class="metro-card-actions">
                            <a href="{{ route('products.show', $product->id) }}" class="metro-btn metro-btn-primary">Подробнее</a>
                            <button class="metro-btn metro-btn-accent" data-bs-toggle="modal" data-bs-target="#orderModal{{ $product->id }}">
                                Заказать
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Order Modal -->
                <div class="modal fade metro-modal" id="orderModal{{ $product->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $product->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content metro-modal-content">
                            <div class="modal-header metro-modal-header">
                                <h3 class="modal-title" id="orderModalLabel{{ $product->id }}">Оформить заказ: {{ $product->name }}</h3>
                                <button type="button" class="metro-btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('orders.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div class="metro-form-group">
                                        <label for="customer_name" class="metro-form-label">ФИО покупателя</label>
                                        <input type="text" name="customer_name" class="metro-form-control" required>
                                    </div>

                                    <div class="metro-form-group">
                                        <label for="quantity" class="metro-form-label">Количество</label>
                                        <input type="number" name="quantity" class="metro-form-control" min="1" value="1" required>
                                    </div>

                                    <div class="metro-form-group">
                                        <label for="comment" class="metro-form-label">Комментарий</label>
                                        <textarea name="comment" class="metro-form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer metro-modal-footer">
                                    <button type="button" class="metro-btn metro-btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="metro-btn metro-btn-accent">Оформить заказ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
            @endforeach
        </div>
    </div>
@endsection