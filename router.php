<?php
/**
 * Router
 * This script routes url requests to the views that will handle them.
 */
$view = $_GET['view'];

if(strstr($view, "/")){
    $replace_name = preg_replace('/^\/+|\/+$/', '', $view);
    $path_name = strstr($replace_name, "/") ?  explode("/", $replace_name) : $replace_name;
}else{
    $path_name = $view;
}
$page = is_array($path_name) ? $path_name[1] : $path_name;

$category = [

];
$controller = [
    'dashboard',
    'course',
    'reset-my-password'
];
if(is_array($path_name)){
    if(in_array($path_name[0], $controller)){
        require_once 'scripts/php/functions.php';
        if($path_name[0] === 'course'){
            if($path_name[1] != ''){
                $slug = $path_name[1];
                $courseDetails = fetchCourseDetails($slug);
                if(mysqli_num_rows($courseDetails) === 0){
                    require_once 'views/404.php';
                }else{
                    require_once 'views/_Singlecourse.php';
                }
            }else{
                require_once 'views/404.php';
            }
        }elseif($path_name[0] === 'dashboard' && $path_name[1] === ''){
            require_once 'dashboard/index.php';
        }elseif($path_name[0] === 'dashboard' && $path_name[1] === 'index'){
            if(@$path_name[2] != ''){
                require_once 'views/404.php';
            }else{
                require_once 'dashboard/index.php';
            }
        }elseif($path_name[0] === 'dashboard' && $path_name[1] === 'profile'){
            if(@$path_name[2] != ''){
                require_once 'views/404.php';
            }else{
                require_once 'dashboard/profile.php';
            }
        }elseif($path_name[0] === 'dashboard' && $path_name[1] === 'orders'){
            if(@$path_name[2] != ''){
                require_once 'views/404.php';
            }else{
                require_once 'dashboard/orders.php';
            }
        }elseif($path_name[0] === 'reset-my-password'){
            if($path_name[1] != ""){
                $resetPin = $path_name[1];
                $checkPin = checkPwdPin($resetPin);
                if(mysqli_num_rows($checkPin) === 0){
                    require_once 'views/404.php';
                }else{
                    require_once 'views/_reset-password.php';
                }
            }else{
                require_once "views/404.php";
            }
        }else{
            require_once 'views/404.php';
        }
    }else{
        require_once 'views/404.php';
    }
    
}

else{
    // require isset($pages[$page]) ? $pages[$page] : $pages['404'];
    if($page === 'index'){
        header('Location: ./');
    }else{
    require file_exists('views/'.$page. '.php') ? 'views/'.$page. '.php' : 'views/404.php';
    }
}

