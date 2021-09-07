<?php

class Core
{
    protected $currentController = 'pages';//현재 컨트롤러
    protected $currentMethod = 'index';//현재 컨트롤러 메서드
    protected $params = [];///파라미터

    public function __construct()
    {
        $url = $this->getUrl();//현재 url

        if(isset($url[0])){
            $cont = ucwords($url[0]);//ex: Pages
        }else{
            $cont = '';
        }

        if(file_exists('../app/controllers/' . $cont . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);//값 삭제
        }

        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];//값을 배열로 리턴 //ex: pages/index/1  - 1
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
    
    public function getUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');//공백 제거

            $url = filter_var($url, FILTER_SANITIZE_URL);//url 필터링

            $url = explode('/', $url);
            return $url;
        }
    }
}