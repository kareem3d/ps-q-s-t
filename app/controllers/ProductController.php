<?php

use ECommerce\Product;

class ProductController extends BaseController {

    /**
     * @param Product $products
     */
    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    /**
     * @param $ids
     */
    public function getMultiple($ids = '')
    {
        $products = $this->products->byIds($ids)->get();

        $array = array();

        foreach($products as $product)
        {
            $array[] = $this->getProductArray($product);
        }

        return Response::json($array);
    }

    /**
     * @param $id
     */
    public function getOne($id)
    {
        $product = $this->products->findOrFail($id);

        return Response::json($this->getProductArray($product));
    }

    /**
     * @param Product $product
     * @return array
     */
    protected function getProductArray(Product $product)
    {
        return array(
            'id'    => $product->id,
            'title' => $product->title,
            'image' => $product->getImage('main')->getSmallest()->url,
            'url'   => URL::product($product),
            'brand' => $product->brand->name,
            'category' => $product->category->name,
            'model' => $product->model,
            'price' => $product->getOfferPrice()->value()
        );
    }
}