<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        /* use later to implement permission
            $router = service('router');
            $controller = $router->controllerName();
            $controller = explode("\\", $controller);
            $controller = end($controller);
            $method = $router->methodName();
            $cm = $controller."/".$method;
            echo "<pre>";
            echo $controller;
            echo "<br>";
            echo $method;
        */
        if (!session()->get('logged_in'))
        {
            return redirect()->to('login');
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}