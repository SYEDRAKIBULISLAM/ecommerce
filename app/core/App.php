<?php
/**
 * Created by PhpStorm.
 * User: Romeo
 * Full Name: Syed Rakibul Islam
 * Email: romeomyname@gmail.com
 * Contact: +880-1737094969
 * Date: 01-Nov-16
 * Time: 5:33 PM
 */


class App
{
    protected $path = '/home';

    protected $controller = 'home';

    protected $method = 'index';

    protected $url = [];

    protected $params = [];



    public function __construct()
    {


        $this->url = $this->parseUrl();
        $parseNewUrl = $this->parsePath($this->url);

        require_once (__DIR__. '/../controllers'. $this->path .'.php');

        $this->controller = new $this->controller;
        if(isset($parseNewUrl[0]))
        {
            if(method_exists($this->controller, $parseNewUrl[0]))
            {
                $this->method = $parseNewUrl[0];
                unset($parseNewUrl[0]);
            }
        }
        $this->params = $parseNewUrl ? array_values($parseNewUrl) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * @return array
     */
    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
    public function parsePath($url)
    {
        $urlIndex = sizeof($url) - 1;
        for($i = $urlIndex; $i >= 0; $i--)
        {
            $pathSecond = '';
            for($j = 0; $j <= $i; $j++)
            {
                $pathSecond = $pathSecond . '/' . $url[$j];
            }
            if (file_exists((__DIR__. '/../controllers'. $pathSecond .'.php')))
            {
                $this->path = $pathSecond;
                $this->controller = $this->url[$i];
                for ($k = 0; $k <= $i; $k++)
                {
                    unset($this->url[$k]);
                }
                $parse = $this->url ? array_values($this->url) : [];
                return $parse;
            }

        }
        return $this->url ? array_values($this->url) : [];
    }

}