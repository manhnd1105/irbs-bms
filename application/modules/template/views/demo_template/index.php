<?php $this->load->view('header'); ?>
    <div class="Table">
        <div class="Title">
            <p>Banner here</p>
        </div>
        <div class="Title">
            <div class="Cell">
                <p>Main menu here</p>
            </div>
        </div>
        <div class='Row'>
            <div class='Cell'>Side menu here</div>
            <div class='Cell'>
                <?php
                /** @var $module_name string */
                /** @var $file_uri string */
                $this->load->view($module_name . '/' . $file_uri); //TODO extend to multi module views like Joomla
                ?>
            </div>
        </div>

    </div>
<?php $this->load->view('footer'); ?>