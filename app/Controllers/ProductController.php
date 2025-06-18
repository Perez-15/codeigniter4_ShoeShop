<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    // Web methods (same as before)

    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();

        return view('products/index', $data);
    }

    public function add()
    {
        return view('products/add');
    }

    public function create()
    {
        $model = new ProductModel();

        // Handle file upload
        $img = $this->request->getFile('image'); 
        $imgName = '';
        if ($img->isValid() && !$img->hasMoved()) {
            if ($img->getMimeType() == 'image/jpeg' ||
                $img->getMimeType() == 'image/png') {

                $imgName = $img->getRandomName();
                $img->move(FCPATH . 'public/uploads/products/', $imgName);
            } else {
                return redirect()->back()->with('msg', 'Invalid image format.');
            }
        }

        $data = [
            'name'  => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $imgName
        ];

        $model->insert($data);
        return redirect()->to('/products')->with('msg', 'Product successfully added.');
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();

        // Handle file upload
        $img = $this->request->getFile('image'); 
        $imgName = '';
        if ($img->isValid() && !$img->hasMoved()) {
            if ($img->getMimeType() == 'image/jpeg' ||
                $img->getMimeType() == 'image/png') {

                $imgName = $img->getRandomName();
                $img->move(FCPATH . 'public/uploads/products/', $imgName);
            } else {
                return redirect()->back()->with('msg', 'Invalid image format.');
            }
        }

        $data = [
            'name'  => $this->request->getPost('name'),
            'brand' => $this->request->getPost('brand'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ];

        if ($imgName) {
            $data['image'] = $imgName;
        }

        $model->update($id, $data);
        return redirect()->to('/products')->with('msg', 'Product successfully updated.');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products')->with('msg', 'Product successfully deleted.');
    }

    // API methods (JSON)

    public function apiIndex()
    {
        $model = new ProductModel();
        $products = $model->findAll();

        return $this->response->setJSON($products);
    }

    public function apiCreate()
{
    $data = $this->request->getJSON(true); // Get as associative array

    if (empty($data)) {
        return $this->response->setJSON(['error' => 'No data received'])->setStatusCode(400);
    }

    $model = new ProductModel();
    $model->insert($data);

    return $this->response->setJSON(['status' => 'Product successfully created.']);
}


    public function apiUpdate($id)
    {
        $model = new ProductModel();

        $data = $this->request->getJSON(true);
        $model->update($id, $data);

        return $this->response->setJSON(['status' => 'Product successfully updated.']);
    }

    public function apiDelete($id)
    {
        $model = new ProductModel();

        $model->delete($id);

        return $this->response->setJSON(['status' => 'Product successfully deleted.']);
    }
}
