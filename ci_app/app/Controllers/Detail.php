<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Detail extends BaseController
{
    public function index($id)
    {
        $model = model('Product');
        $product = $model->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('detail', ['product' => $product]);
    }
}
