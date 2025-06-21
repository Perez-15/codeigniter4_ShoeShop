<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\PurchaseModel;

class ShoesController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();

        return view('shoes', $data);
    }

    public function buy($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }

        return view('buy_confirmation', ['product' => $product]);
    }

    public function confirmPurchase()
    {
        $session = session();

        $productId = $this->request->getPost('product_id');

        // Fetch image from product
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        $data = [
            'product_id'      => $productId,
            'product_name'    => $this->request->getPost('product_name'),
            'product_price'   => $this->request->getPost('product_price'),
            'product_image'           => $product['image'] ?? '',
            'customer_name'   => $this->request->getPost('name'),
            'address'         => $this->request->getPost('address'),
            'phone'           => $this->request->getPost('phone'),
            'payment_method'  => $this->request->getPost('payment'),
        ];

        // Save to database
        $purchaseModel = new PurchaseModel();
        $purchaseModel->insert($data);

        // Store in session for display
        $session->set('purchase_details', $data);

        return redirect()->to('/purchase-details');
    }

    public function purchaseDetails()
    {
        $session = session();
        $data['purchase'] = $session->get('purchase_details');

        if (!$data['purchase']) {
            return redirect()->to('/shoes')->with('msg', 'No purchase found.');
        }

        return view('purchase_details', $data);
    }
}
