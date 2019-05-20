<?php

class App
{

    // Static variable to store the singleton instance
    private static $instance;

    // Variables to store the current controller, method and parameters
    private $controller;
    private $method;
    private $parameters;

    // Constants defining the default controller and method
    const defaultController = 'DefaultController';
    const defaultMethod = 'index';


    // To prevent direct instantiation
    private function __construct()
    {
        $this->controller = self::defaultController;
        $this->method = self::defaultMethod;
        $this->parameters = [];
    }

    // Method to ensure singleton property is preserved
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new App();
        }
        return self::$instance;
    }

    // Method to sanitize the url and split it into an array
    private function parseUrl($url)
    {
        return explode(
                '/',
                filter_var(trim($url, '/'), FILTER_SANITIZE_URL)
            );
    }

    // Method to get the desired controller with the given name
    public function getControllerPath($controllerName)
    {
        return CONTROLLER_PATH . "{$controllerName}.php";
    }


    // Method to respond to http request
    public function respond()
    {

        // Replace is used to remove the PUBLIC_URL part from the value returned by $_SERVER['REQUEST_URI']
        $url = str_replace('/smartist/public/', '', $_SERVER['REQUEST_URI']);

        // Extracting data from the url
        $requestData = $this->parseUrl($url);

        $requestControllerName = $requestData[0] . 'Controller';
        $requestControllerPath =  $this->getControllerPath($requestControllerName);

        // Check if a controller for the request exists
        if (file_exists($requestControllerPath)) {

            // Remove controller related information (first element) from the array for ease
            array_shift($requestData);

            // Paste the content in the selected controller here
            require_once $requestControllerPath ;

            
            $this->controller = new $requestControllerName;

            
            if (isset($requestData[0]) && method_exists($this->controller, $requestData[0])) {
                $this->method = $requestData[0];
                array_shift($requestData);
            }
            
            $this->parameters = $requestData ? array_values($requestData) : [];
        } else {
            require_once $this->getControllerPath(self::defaultController);
            $this->controller = new DefaultController;
            $this->parameters = $requestData;
        }
       
            
        call_user_func_array([$this->controller, $this->method], $this->parameters);
    }
}
