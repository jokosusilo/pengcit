<?php

class Home extends Controller {

    public function index() {
        $this->render('template/header');
        $this->render('home/index');
        $this->render('template/footer');
    }

}
