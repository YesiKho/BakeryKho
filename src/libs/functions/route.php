<?php
function view($page, $data = [])
{
    extract($data);
    $page = str_replace('.', '/', $page);
    include './src/views/' . $page . '.php';
}

class Route
{
    public static $urls = [];

    function __construct()
    {

        $uri = strtolower(implode(
            "/",
            array_filter(
                explode(
                    "/",
                    str_replace(
                        $_ENV['BASEURL'],
                        "",
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ),
                'strlen'
            )
        ));

        if (!in_array($uri, self::$urls['routes'])) {
            header('Location: ' . BASEURL);
        }

        $call = self::$urls[$_SERVER['REQUEST_METHOD']][$uri];
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

        self::$urls[strtoupper('GET')]['bakerykho/' . $url] = $controller . '::index';
        self::$urls['routes'][] = 'bakerykho/' . $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')]['bakerykho/' . $url . '/create'] = $controller . '::create';
        self::$urls['routes'][] = 'bakerykho/' . $url . '/create';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('POST')]['bakerykho/' . $url . '/store'] = $controller . '::store';
        self::$urls['routes'][] = 'bakerykho/' . $url . '/store';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')]['bakerykho/' . $url . '/edit'] = $controller . '::edit';
        self::$urls['routes'][] = 'bakerykho/' . $url . '/edit';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('POST')]['bakerykho/' . $url . '/update'] = $controller . '::update';
        self::$urls['routes'][] = 'bakerykho/' . $url . '/update';
        self::$urls['routes'] = array_unique(self::$urls['routes']);

        self::$urls[strtoupper('GET')]['bakerykho/' . $url . '/destroy'] = $controller . '::destroy';
        self::$urls['routes'][] = 'bakerykho/' . $url . '/destroy';
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
}

function route($path)
{
    require_once 'src/libs/config/env.php';
    $path = str_replace('.', '/', $path);
    return BASEURL . $path;
}
