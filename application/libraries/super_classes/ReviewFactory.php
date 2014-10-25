<?php
namespace super_classes;

class ReviewFactory implements ISingleton{

    /**
     * @var
     */
    private static $instance;
    /**
     * @var
     */
    private $model_review;

    /**
     * Private constructor so nobody else can instance it
     */
    private function __construct()
    {
        $CI  = &get_instance();
        $CI->load->model('reviewer/Model_review');
        $this ->model_review = $CI->Model_review;
    }

    /**
     * Call this method to get singleton
     *
     * @return ImageFactory
     */
    public static function get_instance()
    {
        try {
            if (!self::$instance) {
                self::$instance = new ReviewFactory();

            }

        } catch (Exception $e) {
            echo 'error: ' . $e->getMessage();
        }
        return self::$instance;
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone() {

    }

    public function load_order($id = NULL){
        if($id != null){
            $required_fields = '
                irbs.order.id,
                order_detail.file_id,
                order_detail.worker_id,
                order_detail.file_status,
                order_detail.file_changed_path';
            $data = $this->model_review->read_order_detail(array('irbs.order.id' => $id), $required_fields, 'all');
            return $data;
        }
        return $this->model_review->read_order();
    }



    /**
     * Load information of a file by its id
     * @param $id
     * @return array
     */
    public function load_file_detail($id = NULL) {
        $required_fields = '
        file.id,
        file.name,
        file.path,
        file.size,
        file.type,
        order_detail.order_id,
        order_detail.worker_id,
        order_detail.file_status,
        order_detail.file_changed_path';
        if ($id != NULL) {
            $data = $this->model_review->read_file_details(array('file.id' => $id), $required_fields, 'one');
            return $data;
        }
        return $this->model_review->read();
    }


    public function filter($info)
    {
        return $this->model_review->filter($info);
    }
}

