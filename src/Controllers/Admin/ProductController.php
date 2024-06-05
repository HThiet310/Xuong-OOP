<?php

namespace Hthiet\Xuongoop\Controllers\Admin;

use Hthiet\Xuongoop\Commons\Controller;
use Hthiet\Xuongoop\Commons\Helper;
use Hthiet\Xuongoop\Models\Category;
use Hthiet\Xuongoop\Models\Product;
use Hthiet\Xuongoop\Models\User;
use Rakit\Validation\Validator;

class ProductController extends Controller
{
    private Product $product;
    private Category $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new Category();
    }

    public function index()
    {
        [$products, $totalPage] = $this->product->paginate($_GET['page'] ?? 1);
        
        $this->renderViewAdmin('products.index', [
            'products' => $products,
            'totalPage' => $totalPage
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.create', [
            'categories' => $categoryPluck
        ]);
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'price'                 => 'required|numeric',
            'id_category'           => 'required|numeric',
            'quantity'              => 'required|numeric',
            'img_thumbnail'         => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/create'));
            exit;
        } else {
            $data = [
                'name'          => $_POST['name'],
                'price'         => $_POST['price'],
                'id_category'   => $_POST['id_category'],
                'quantity'      => $_POST['quantity'],
                'description'   => $_POST['description'],
            ];

            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }
        }

        $this->product->insert($data);

        header('Location: ' . url('admin/products'));
        exit;
    }

    public function show($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewAdmin('products.show', [
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = $this->product->findByID($id);
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('products.edit', [
            'product' => $product,
            'categories' => $categoryPluck
        ]);
    }

    public function update($id)
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'price'                 => 'required|numeric',
            'id_category'           => 'required|numeric',
            'quantity'              => 'required|numeric',
            'img_thumbnail'         => 'uploaded_file:0,2M,png,jpg,jpeg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/products/' . $id . '/edit'));
            exit;
        } else {
            $data = [
                'name'          => $_POST['name'],
                'price'         => $_POST['price'],
                'id_category'   => $_POST['id_category'],
                'quantity'      => $_POST['quantity'],
                'description'   => $_POST['description'],
            ];

            if (isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

                $from = $_FILES['img_thumbnail']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['img_thumbnail'] = $to;
                } else {
                    $_SESSION['errors']['img_thumbnail'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/products/create'));
                    exit;
                }
            }
        }

        $this->product->update($id, $data);

        header('Location: ' . url('admin/products'));
        exit;
    }

    public function delete($id)
    {
        try {
            $product = $this->product->findByID($id);

            $this->product->delete($id);

            if (
                $product['img_thumbnail']
                && file_exists(PATH_ROOT . $product['img_thumbnail'])
            ) {
                unlink(PATH_ROOT . $product['img_thumbnail']);
            }
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác không thành công';
        }

        header('Location: ' . url('admin/products'));
        exit();
    }
}
