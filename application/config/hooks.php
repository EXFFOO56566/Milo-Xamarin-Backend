<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$hook['post_controller'][] = array(
        'class'    => 'Loginchecking',
        'function' => 'ipchecking',
        'filename' => 'Loginchecking.php',
        'filepath' => 'hooks'
);