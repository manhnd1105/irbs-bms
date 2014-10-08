<?php
namespace super_classes;


class PriceListFactory implements ISingleton
{
    /**
     * @var
     */
    private static $instance;

    private $model_price;

    /**
     * Private constructor so nobody else can instance it
     *
     */
    private function __construct()
    {
        get_instance()->load->model('price_list/Model_price');
        $this->model_price=get_instance()->Model_price;

    }


    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Call this method to get singleton
     * @return PriceListFactory
     */
    public static function get_instance()
    {
        try {
            if (!self::$instance) {
                self::$instance = new  PriceListFactory();
            }
            return self::$instance;
        } catch (\Exception $e) {
            echo 'error: ' . $e->getMessage();
        }

    }


    public function load_prices(){
        return $this->model_price->get_price();
    }


}