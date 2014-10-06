<?php $this->load->view('header'); ?>
<?php //$this->load->view('banner'); ?>
<?php //$this->load->view('main_menu'); ?>
    <div class='container-fluid'>
        <div class="row">
            <div class='col-sm-3 col-md-2 sidebar'>
                <?php $this->load->view('side_menu'); ?>
            </div>
            <div class='col-sm-9 col-md-10'>
                <div id="event_result"></div>
                <?php
                /** @var string $module_name name of module need to load */
                /** @var string $file_uri URI that need to load */
                $this->load->view($module_name . '/' . $file_uri); //TODO extend to multi module views like Joomla
                ?>
            </div>
        </div>
    </div>
<?php $this->load->view('footer'); ?>