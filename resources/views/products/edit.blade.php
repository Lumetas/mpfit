@extends('layouts.app')

@section('title', 'Редактировать товар')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title">Редактировать товар</h1>
        
        @if ($errors->any())
            <div class="metro-alert metro-alert-danger">
                <strong>Ошибка!</strong>
                <ul class="metro-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" class="metro-form">
            @csrf
            @method('PUT')
            
            <div class="metro-form-group">
                <label class="metro-form-label">Название товара</label>
                <input type="text" name="name" class="metro-form-control" 
                       value="{{ $product->name }}" required>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Категория</label>
                <select name="category_id" class="metro-form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                                @if($category->id == $product->category_id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Описание</label>
                <textarea name="description" class="metro-form-control" 
                          rows="4">{{ $product->description }}</textarea>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Цена (₽)</label>
                <input type="number" name="price" class="metro-form-control" 
                       step="0.01" value="{{ $product->price }}" required>
            </div>
            
            <div class="metro-form-actions">
                <button type="submit" class="metro-btn metro-btn-accent">
                    Обновить
                </button>
            </div>
        </form>
    </div>
@endsection