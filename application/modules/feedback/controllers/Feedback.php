<?php

class Feedback extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function maklum_balas()
    {
        $this->template->render();
    }

}