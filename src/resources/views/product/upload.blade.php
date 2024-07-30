@extends('layouts.product')

@section('content')


    <div class="container mt-16 w-25">

        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Add products</label>
                <input type="file" class="form-control" name="excel">
                @error('excel')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
