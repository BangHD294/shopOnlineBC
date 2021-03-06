<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;

    public function __construct(Category $category, Product $product, ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
    }

    public function index()
    {
        return view('admin.product.index');
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public  function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    //upload file anh
    public  function store(Request $request){
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,

        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');

        if (!empty($dataProductCreate)){
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];


        }
        $product = $this->product->create($dataProductCreate);
        //insert data to product_image
        if($request->hasFile('image_path')){
            foreach ($request->image_path as $fileItem){
                $dataProductImageDerail = $this->storageTraitUploadMutiple($fileItem, 'product');
                $product->images()->create([
                    'image_path' => $dataProductImageDerail['file_path'],
                    'image_name' => $dataProductImageDerail['file_name'],
                ]);
//                $this->productImage->create([
//                    'product_id' => $product->id,
//                    'image_path' => $dataProductImageDerail['file_path'],
//                    'image_name' => $dataProductImageDerail['file_name'],
//                ]);
            }
        }

    }
}
