<?php
/**
 * Created by PhpStorm.
 * User: Tuan Long
 * Date: 10/22/2014
 * Time: 10:41 AM
 */
namespace super_classes;

interface IEmail{
    public static function get_instance();
    public static function send_email($msg);
}