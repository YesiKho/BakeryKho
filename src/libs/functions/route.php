<?php
function view($page, $data = [])
{
    extract($data);
    $page = str_replace('.', '/', $page);
    include 'src/views/' . $page . '.php';
}

class Route
{
    public static $urls = [];

    function __construct()
    {
        $url = implode(
            "/",
            array_filter(
                explode(
                    "/",
                    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                ),
            )
        );



        if (!in_array($url, self::$urls['routes'])) {
            header('Location: ' . BASEURL);
        }

        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
        $call();
    }
    public static function url($url, $method, $controller)
    {
        if ($url == '/') {
            $url = '';
        }
        self::$urls[strtoupper($method)][$url] = $controller;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
    public static function get($url, $controller)
    {
        if ($url == '/') {
            $url = '';
        }
        self::$urls[strtoupper('GET')][$url] = $controller;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
    public static function resource($url, $controller)
    {
        if ($url == '/') {
            $url = '';
        }


        self::$urls[strtoupper('GET')][$url] = $controller . '::index';
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')][$url . '/create'] = $controller . '::create';
        self::$urls['routes'][] = $url . '/create';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('POST')][$url . '/store'] = $controller . '::store';
        self::$urls['routes'][] = $url . '/store';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')][$url . '/edit'] = $controller . '::edit';
        self::$urls['routes'][] = $url . '/edit';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('POST')][$url . '/update'] = $controller . '::update';
        self::$urls['routes'][] = $url . '/update';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')][$url . '/destroy'] = $controller . '::destroy';
        self::$urls['routes'][] = $url . '/destroy';
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
}

function route($path)
{
    require_once 'src/libs/config/env.php';
    Route::class;
    $path = str_replace('.', '/', $path);
    return BASEURL . $path;
}
