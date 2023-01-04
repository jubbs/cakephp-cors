<?php
namespace Cors\Error;


use Cake\Controller\Controller;
use Cors\Routing\Middleware\CorsMiddleware;
use Cake\Error\Renderer\WebExceptionRenderer;


class AppExceptionRenderer extends WebExceptionRenderer
{
    /**
     * Returns the current controller.
     *
     * @return \Cake\Controller\Controller
     */
    protected function _getController(): Controller
    {
        $controller = parent::_getController();
        $cors = new CorsMiddleware();
        $controller->response = $cors->addHeaders(
            $controller->getRequest(),
            $controller->getResponse()
        );
        return $controller;
    }
}
