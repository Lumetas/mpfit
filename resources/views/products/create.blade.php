@extends('layouts.app')

@section('title', 'Добавить товар')

@section('content')
    <div class="metro-container">
        <h1 class="metro-title">Добавить товар</h1>
        
        <form action="{{ route('products.store') }}" method="POST" class="metro-form">
            @csrf
            
            <div class="metro-form-group">
                <label class="metro-form-label">Название товара</label>
                <input type="text" name="name" class="metro-form-control" required>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Категория</label>
                <select name="category_id" class="metro-form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Описание</label>
                <textarea name="description" class="metro-form-control" rows="4"></textarea>
            </div>
            
            <div class="metro-form-group">
                <label class="metro-form-label">Цена (₽)</label>
                <input type="number" name="price" class="metro-form-control" 
                       step="0.01" required>
            </div>
            
            <div class="metro-form-actions">
                <button type="submit" class="metro-btn metro-btn-accent">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
@endsection