<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProdukKategoriController extends BaseController
{
    protected $product;
    protected $validation;

    function __construct()
    {
        $this->product = new ProductCategoryModel();
    }

    public function index()
    {
        $product = $this->product->findAll();
        $data['productcategory'] = $product;

        return view('v_produk_kategori', $data);
    }

    public function create()
    {
    $dataForm = [
        'category_name' => $this->request->getPost('category_name'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'created_at' => date("Y-m-d H:i:s")
    ];

    $this->product->insert($dataForm);

    return redirect('produk_kategori')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
    $dataProduk = $this->product->find($id);

    $dataForm = [
        'category_name' => $this->request->getPost('category_name'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'created_at' => date("Y-m-d H:i:s")
    ];


    $this->product->update($id, $dataForm);

    return redirect('produk_kategori')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
    $dataProduk = $this->product->find($id);

    $this->product->delete($id);

    return redirect('produk_kategori')->with('success', 'Data Berhasil Dihapus');
    }
}