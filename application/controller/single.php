<?php

class single extends Controller {

    public function __construct() {
        $this->load('image');
    }

    public function index() {
        $this->redir('single/negatif');
    }

    public function negatif() {
        $this->render('template/header');
        $this->render('single/negatif');
        $this->render('template/footer');
    }

    public function hasilnegatif() {
        if (isset($_FILES) && $_FILES['image']['error'] == 0) {
            $image = new Image();
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/upload/single/negatif/" . $_FILES["image"]["name"]);
            $im = imagecreatefromjpeg("public/upload/single/negatif/" . $_FILES["image"]["name"]);
            if ($im && $image->negate($im)) {
                imagejpeg($im, "public/upload/single/negatif/negatif" . $_FILES["image"]["name"], 100);
                imagedestroy($im);
            }
            $asli = URL . "public/upload/single/negatif/" . $_FILES["image"]["name"];
            $hasil = URL . "public/upload/single/negatif/negatif" . $_FILES["image"]["name"];
            $this->render('template/header');
            $this->render('single/hasilnegatif', array('asli' => $asli, 'hasil' => $hasil));
            $this->render('template/footer');
        } else {
            $this->redir('single/negatif');
        }
    }

}
