<?php
/**
 * Created by PhpStorm.
 * User: manh
 * Date: 10/22/14
 * Time: 9:29 PM
 */

namespace super_classes;


/**
 * Class RestfulRequestMaker
 * @package super_classes
 */
/**
 * Class RestfulRequestMaker
 * @package super_classes
 */
class RestfulRequestMaker
{
    /**
     * @var \CI_Controller
     */
    private $ci;

    /**
     * @var string
     */
    private $server;

    /**
     * @var
     */
    private $api_key;

    /**
     * @var
     */
    private $api_name;

    /**
     * @var
     */
    private $http_user;

    /**
     * @var
     */
    private $http_pass;

    /**
     * @var
     */
    private $http_auth;

    /**
     * @var
     */
    private $ssl_verify_peer;

    /**
     * @var
     */
    private $ssl_cainfo;

    /**
     * @param string $server
     */
    function __construct($server = 'http://localhost/irbs-ams/index.php/api/api_controller/')
    {
        $this->ci = &get_instance();
        $this->server = $server;
        $this->ci->load->library('rest');
        $config = array(
            'server' => $this->server
            //'api_key'         => 'Setec_Astronomy'
            //'api_name'        => 'X-API-KEY'
            //'http_user'       => 'admin',
            //'http_pass'       => '123456',
            //'http_auth'       => 'basic',
            //'ssl_verify_peer' => TRUE,
            //'ssl_cainfo'      => '/certs/cert.pem'
        );
        $this->ci->rest->initialize($config);
    }

    /**
     * Make an restful request
     * @param string $method {'get', 'delete', 'put', 'post'}
     * @param string $uri    The action need to perform
     * @param array  $params The parameters needed to send along the action request
     * @param string $format {'json', 'xml', 'serialize'}
     * @return mixed
     */
    public function make_request($method, $uri, $params = null, $format = 'serialize')
    {
        $result = $this->ci->rest->{$method}($uri, $params, $format);
        return $result;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @param mixed $api_key
     */
    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @return mixed
     */
    public function getApiName()
    {
        return $this->api_name;
    }

    /**
     * @param mixed $api_name
     */
    public function setApiName($api_name)
    {
        $this->api_name = $api_name;
    }

    /**
     * @return \CI_Controller
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * @param \CI_Controller $ci
     */
    public function setCi($ci)
    {
        $this->ci = $ci;
    }

    /**
     * @return mixed
     */
    public function getHttpAuth()
    {
        return $this->http_auth;
    }

    /**
     * @param mixed $http_auth
     */
    public function setHttpAuth($http_auth)
    {
        $this->http_auth = $http_auth;
    }

    /**
     * @return mixed
     */
    public function getHttpPass()
    {
        return $this->http_pass;
    }

    /**
     * @param mixed $http_pass
     */
    public function setHttpPass($http_pass)
    {
        $this->http_pass = $http_pass;
    }

    /**
     * @return mixed
     */
    public function getHttpUser()
    {
        return $this->http_user;
    }

    /**
     * @param mixed $http_user
     */
    public function setHttpUser($http_user)
    {
        $this->http_user = $http_user;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }

    /**
     * @return mixed
     */
    public function getSslCainfo()
    {
        return $this->ssl_cainfo;
    }

    /**
     * @param mixed $ssl_cainfo
     */
    public function setSslCainfo($ssl_cainfo)
    {
        $this->ssl_cainfo = $ssl_cainfo;
    }

    /**
     * @return mixed
     */
    public function getSslVerifyPeer()
    {
        return $this->ssl_verify_peer;
    }

    /**
     * @param mixed $ssl_verify_peer
     */
    public function setSslVerifyPeer($ssl_verify_peer)
    {
        $this->ssl_verify_peer = $ssl_verify_peer;
    }
}