<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/22/14
 * Time: 9:29 PM
 */

namespace super_classes;


class RestfulRequestMaker
{
    private $ci;
    private $server;
    private $api_key;
    private $api_name;
    private $http_user;
    private $http_pass;
    private $http_auth;
    private $ssl_verify_peer;
    private $ssl_cainfo;

    function __construct($server = 'http://localhost/irbs-ams/index.php/api/api_controller/')
    {
        $this->ci = &get_instance();
        $this->server = $server;
        $this->ci->load->library('rest');
        $config = array(
            'server' => $this->server
        );
        $this->ci->rest->initialize($config);
    }
    public function make_request($method, $uri, $params = null, $format = 'serialize')
    {
        $result = $this->ci->rest->{$method}($uri, $params, $format);
        return $result;
    }
} 