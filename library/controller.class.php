<?php

class Controller
{

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;

    //TODO: Replace with dependency injection

    /**
     * Controller constructor.
     * @param $model
     * @param $controller
     * @param $action
     */
    function __construct($model, $controller, $action)
    {

        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;

        $this->$model =& new $model;
        $this->_template =& new Template($controller, $action);

    }

    /**
     * @param $name
     * @param $value
     */
    function set($name, $value)
    {
        $this->_template->set($name, $value);
    }

    /**
     * Render template on destruct
     */
    function __destruct()
    {
        $this->_template->render();
    }

}
