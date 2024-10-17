<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Jobs\ProductExcelImportJob;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('product.index', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        try {
            $file = Storage::put('/', $data['excel']);
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

        ProductExcelImportJob::dispatchSync($file);

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function create()
    {
        return view('product.upload');
    }
}
