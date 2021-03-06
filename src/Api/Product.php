<?php

namespace zaporylie\Tripletex\Api;

use zaporylie\Tripletex\Model\Product\RequestProductDetails;
use zaporylie\Tripletex\Model\Product\RequestProductList;
use zaporylie\Tripletex\Resource\Product\ProductDetails;
use zaporylie\Tripletex\Resource\Product\ProductList;
use zaporylie\Tripletex\Tripletex;

class Product extends ApiBase
{

    /**
     * @param array $options
     *
     * @return \zaporylie\Tripletex\Model\Product\ResponseProductList
     */
    public function getList($options = [])
    {
        $request = new RequestProductList();
        // @todo: Pass options.
        $resource = new ProductList($this->app);
        return $resource->call($request);
    }

    /**
     * @param $id
     * @param array $options
     *
     * @return \zaporylie\Tripletex\Model\Product\ResponseProductWrapper
     */
    public function getProduct($id, $options = [])
    {
        $request = new RequestProductDetails();
        $request->setId($id);
        // @todo: Pass options.
        $resource = new ProductDetails($this->app);
        return $resource->call($request);
    }
}
