@extends('layouts.product')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid" src="{{ asset('storage/'. $product->image->image_1) }} " alt="ProductS">
                    <div class="row my-3 previews">
                        <div class="col-md-3">
                            <img class="w-100" src="{{ asset('storage/'. $product->image->image_2) }} " alt="Sale">
                        </div>
                        @if(!empty($product->image->image_3))
                        <div class="col-md-3">
                            <img class="w-100" src="{{ asset('storage/'. $product->image->image_3) }} " alt="Sale">
                        </div>
                        @endif
                        @if(!empty($product->image->image_4))
                        <div class="col-md-3">
                            <img class="w-100" src="{{ asset('storage/'. $product->image->image_4) }} " alt="Sale">
                        </div>
                        @endif
                        <div class="col-md-3">
                            <img class="w-100" src="{{ asset('storage/'. $product->image->image_box) }} " alt="Sale">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description px-2">
                    <div class="category text-bold">
                        <b> {{$product->name}}</b>
                    </div>
                    <div class="product-title text-bold my-3">
                        {{$product->description}}
                    </div>
                    <div class="delivery my-4">
                        <p class="font-weight-bold mb-0">
                            <span><i class="fa-solid fa-truck"></i></span>
                            <b>Категория товара</b></p>
                        <p class="text-secondary">{{ $product->keyvalue->product_category }}</p>
                    </div>

                    <div class="price-area my-4">
                        <p class="new-price text-bold mb-1">Цена: {{$product->price}} руб.</p>
                        <p class="text-secondary mb-1">Код товара: {{$product->external_code}}</p>
                        <p class="text-secondary mb-1">
                            Запрет на розничную продажу: {{$product->discount==0? 'Нет':'Да'}}
                        </p>
                    </div>

                </div>

                <div class="product-details my-4">
                    <p class="details-title text-color mb-1"><b>Product Details</b></p>
                    <p class="description">Бренд: {{$product->keyvalue->brand}} </p>
                    <p class="description">Размер: {{$product->keyvalue->size}} </p>
                    <p class="description">Цвет: {{$product->keyvalue->color}} </p>
                    <p class="description">Количество в упаковке: {{$product->keyvalue->quantity}} </p>
                    <p class="description">Состав: {{$product->keyvalue->composition}} </p>
                    <p class="description">seo_title: {{$product->keyvalue->seo_title}} </p>
                    <p class="description">seo_h1: {{$product->keyvalue->seo_h1}} </p>
                    <p class="description">seo_decription: {{$product->keyvalue->seo_decription}} </p>
                    <p class="description">Вес товара: {{$product->keyvalue->product_weight}} </p>
                    <p class="description">Ширина: {{$product->keyvalue->product_width}} </p>
                    <p class="description">Высота: {{$product->keyvalue->product_height}} </p>
                    <p class="description">Длина: {{$product->keyvalue->product_length}} </p>
                    <p class="description">Вес упаковки: {{$product->keyvalue->package_weight}} </p>
                    <p class="description">Ширина упаковки: {{$product->keyvalue->package_width}} </p>
                    <p class="description">Высота упаковки: {{$product->keyvalue->package_height}} </p>
                    <p class="description">Длина упаковки: {{$product->keyvalue->package_length}} </p>

                </div>
            </div>
        </div>
    </div>

@endsection
