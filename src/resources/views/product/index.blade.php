@extends('layouts.product')

@section('content')
    <div class="d-flex">
        <div class="overflow-auto" style="height: 800px; width: 1500px">
            @foreach($products as $product)

                <div class="card m-2" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4"><a href="{{ route('products.show', $product->id) }}">
                                <img src="{{asset('/storage/' . $product->image->image_1)}}"
                                     class="img-fluid rounded-start"/>
                            </a> </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">
                                    {{$product->description}}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Price: {{$product->price}}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    <div class="mt-5">
        {{ $products->links() }}
    </div>

@endsection
