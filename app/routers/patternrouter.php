<?php
namespace Routers;
use Exception;
class PatternRouter {
    private function stripParameters($uri) {
        if(str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
    public function route($uri) {

        $defaultController = 'food';
        $defaultMethod = 'index';

        $uri = $this->stripParameters($uri);
        $explodedUri = explode('/', $uri);
        if(!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultController;
        }
        $controllerName = "Controllers\\" . $explodedUri[0] . "controller";
        if(!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultMethod;
        }
        $methodName = $explodedUri[1];
        try {         
            $controllerObj = new $controllerName();
            $controllerObj->$methodName();
        } catch (Exception $e) {
            http_response_code(404);
        }
    }
}