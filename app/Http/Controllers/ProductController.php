<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with(['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function postCreate(Request $request)
    {
        // nhận tất cả tham số vào mảng product
        $product = $request->all();
        // xử lý upload hình vào thư mục
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('product/create')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            $imageName = null;
        }
        $p = new Product($product);
        $p->image = $imageName;
        $p->save();
        return redirect()->action('ProductController@index');
    }

    public function update($id)
    {
        $p = Product::find($id);
        return view('product.update', ['p' => $p]);
    }

    public function postUpdate(Request $request, $id)
    {
        $product = $request->all();

        // $productID = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productDes = $request->input('description');

        // xử lý upload hình vào thư mục
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('product/update')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = Product::find($id);
            $imageName = $p->image;
        }
        $p = Product::find($id);
        $p->name = $productName;
        $p->price = $productPrice;
        $p->description = $productDes;
        $p->image = $imageName;
        $p->save();
        return redirect()->action('ProductController@index');
    }

    public function delete($id)
    {
        $p = Product::find($id);
        $p->delete();
        return redirect()->action('ProductController@index');
    }

}
