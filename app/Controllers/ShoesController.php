<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ShoesController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data ['products'] = $model->findAll();

        return view('shoes', $data);

    }

    public function buy($id)
{
    $model = new \App\Models\ProductModel();
    $product = $model->find($id);

    if (!$product) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
    }

    // You can redirect to a checkout page or just show confirmation for now
    return view('buy_confirmation', ['product' => $product]);
}

}
