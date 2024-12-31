<?php
session_start();

require 'core/app.php';

class Router
{

    public function path()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public function get($url, $callback)
    {
        $njia = $this->path();

        if ($njia == 'logout') {
            session_destroy();
            $this->redirect($callback);
        }

        if ($njia === $url) {
            $this->view($callback);
        }
    }

    public function post($url, $controllerClass)
    {
        $controller = $controllerClass[0];
        
        $function = $controllerClass[1];
        $njia = $this->path();

        if ($njia === $url) {
            $controllerFile = "App/Controller/{$controller}.php";

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $request = $_POST;

                if (file_exists($controllerFile)) {
                    require $controllerFile;
    
                    $action = new $controller();
                    $response =  $action->$function($request);

                    if ($response['status'] == 'success') {
                        header('location: '.$response["redirect"]);
                    }
                    echo $response['message'];
                } else {
                    echo "No such Controller";
                }
            } else {
                echo "Invalid method!";
            }
        }
    }

    public function postrequest($url, $controllerClass, $callback)
    {
        $controller = $controllerClass[0];
        $function = $controllerClass[1];
        $controllerFile = "App/Controller/{$controller}.php";

        $njia = $this->path();

        if ($njia === $url) {
            $view = "views/{$callback}.sam.php";
    
            if (file_exists($view) === file_exists($view)) {
    
                require $controllerFile; 
                $action = new $controller();
                $function = $controllerClass[1];
                require $view;
                
            } else {
                echo"No such folder or your file don't have the following extension .sam.php";
            }
        }
    }

    public function getrequest($url, $controllerClass, $callback)
    {
        $controller = $controllerClass[0];
        $function = $controllerClass[1];
        $controllerFile = "App/Controller/{$controller}.php";
        $data = $_GET;
        $njia = $this->path();

        if ($njia === $url) {
            $view = "views/{$callback}.sam.php";
    
            if (file_exists($view) === file_exists($view)) {
    
                require $controllerFile; 
                $action = new $controller();
                $function = $controllerClass[1];
                $response = $action->$function($_GET);

                if ($response['status'] == 'success') {
                    $this->redirect($response['redirect']);
                }
                
            } else {
                echo"No such folder or your file don't have the following extension .sam.php";
            }
        }
    }
    
    public function view($callback) {
        
        $view = "views/{$callback}.sam.php";
    
        if (file_exists($view) === file_exists($view)) {
            require $view;
        } else {
            echo"No such folder or your file don't have the following extension .sam.php";
        }
    
    }

    public function redirect($direction) {
        header("location: ".$direction);
    }

    public function logout($callback)
    {
        session_destroy();
        session_abort();

        $this->redirect($callback);
    }
}





















// require 'config/app.php';

// class Router
// {

//     public function path()
//     {
//         return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
//     }

//     public function get($url, $callback)
//     {
//         $njia = $this->path();
//         if ($njia === $url) {
//             $this->view($callback);
//         }
//     }

//     public function post($url, $controllerClass)
//     {
//         $controller = $controllerClass[0];
        
//         $function = $controllerClass[1];
//         $njia = $this->path();

//         if ($njia === $url) {
//             $request = $_POST;
//             $controllerFile = "App/Controller/{$controller}.php";

//             if (file_exists($controllerFile)) {
//                 require $controllerFile;

//                 $action = new $controller();
//                 $response =  $action->$function($request);

//             } else {
//                 echo "No such Controller";
//             }
//         }
//     }
    
//     public function view($callback) {
        
//         $view = "views/{$callback}.sam.php";
    
//         if (file_exists($view) === file_exists($view)) {
//             require $view;
//         } else {
//             echo"No such folder or your file don't have the following extension .sam.php";
//         }
    
//     }

//     public function redirect($direction) {
//         $this->view($direction);
//     }

// }