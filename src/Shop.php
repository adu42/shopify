<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-3-16
 * Time: 12:00
 */

namespace Ado\Shopify;

use Ado\Shopify\Helper\Shopify;
class Shop
{
    protected $shopify;

    public function __construct(Shopify $shopify)
    {
        $this->shopify = $shopify;
    }

    public function get()
    {
        return $this->shopify->get('shop.json')->extract('shop');
    }

    public function setAccessToken($accessToken)
    {
        $this->shopify->setAccessToken($accessToken);

        return $this;
    }
}