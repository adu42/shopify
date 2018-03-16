<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-3-16
 * Time: 11:28
 */

namespace Ado\Shopify;
use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

class Shopify
{
    /**
     * @var SessionManager
     */
    protected $session;
    /**
     * @var Repository
     */
    protected $config;
    /**
     * Packagetest constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

}