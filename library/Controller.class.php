<?php

namespace AdmBereich;
use eftec\bladeone;

class Controller{

    const VIEWS = ROOT.DS.'app'.DS.'views',
          CACHE = ROOT.DS.'tmp'.DS.'cache',
          DEFAULT_ROUTE = '';
    /**
     * @var bladeone\BladeOne $blade
     * @var Model $_model
     * @var bool $_redirect
     */
    protected $blade;

    function __construct(){
        $this->blade  = new bladeone\BladeOne(Controller::VIEWS, Controller::CACHE);
    }

    /**
     * @param array $params
     * @throws \Exception Se o parâmetro não for array
     */
    function run($params = array()){
        $this->render(get_class($this),$params);
    }

    /**
     * @param $view
     * @param array $params
     * @throws \Exception Se o parâmetro não for array
     */
    function render($view, $params = array()){
        if(!is_array($params))
            throw new \Exception('Parâmetro não é array');
        $params['_page'] = $view;
        echo $this->blade->run($view,$params);
    }

    /**
     * @param string $msg
     * @return false
     * @throws \Exception
     */
    function errorHandler($msg){
        throw new \Exception($msg);
        return false;
    }

    function getPath(){
        $retorno = (!empty(static::DEFAULT_ROUTE))?static::DEFAULT_ROUTE:'';
        return $retorno.($this->name()).'/';
    }

    static function name(){
        return (new \ReflectionClass(get_called_class()))->getShortName();
    }

}