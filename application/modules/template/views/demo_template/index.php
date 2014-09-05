<?php $this->load->view('header'); ?>
    <div class="Table">
        <div class='Row'>
            <div class="Cell">
                <?php $this->load->view('banner'); ?>
            </div>
            <div class="Cell">
                <?php $this->load->view('main_menu'); ?>
            </div>
        </div>
        <div class='Row'>
            <div class='Cell'>
                <?php $this->load->view('side_menu'); ?>
            </div>
            <div class='Cell'>
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