<?php

class Enhancement extends Controller {

    public function __construct() {
        $this->load('image');
    }

    public function index() {
        echo 'Perbaikan';
    }

    public function median() {
        $this->render('template/header');
        $this->render('enhancement/median');
        $this->render('template/footer');
    }

    public function hasilmedian() {
        if (isset($_FILES) && $_FILES['image']['error'] == 0) {
            $image = new Image();
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/upload/enhancement/median/" . $_FILES["image"]["name"]);
            $im = imagecreatefromjpeg("public/upload/enhancement/median/" . $_FILES["image"]["name"]);
            if ($im && $image->median($im)) {
                imagejpeg($im, "public/upload/enhancement/median/median" . $_FILES["image"]["name"], 100);
                imagedestroy($im);
            }
            $asli = URL . "public/upload/enhancement/median/" . $_FILES["image"]["name"];
            $hasil = URL . "public/upload/enhancement/median/median" . $_FILES["image"]["name"];
            $this->render('template/header');
            $this->render('enhancement/hasilmedian', array('asli' => $asli, 'hasil' => $hasil));
            $this->render('template/footer');
        } else {
            $this->redir('enhancement/median');
        }
    }

    public function mean() {
        $this->render('template/header');
        $this->render('enhancement/mean');
        $this->render('template/footer');
    }

    public function hasilmean() {
        if (isset($_FILES) && $_FILES['image']['error'] == 0) {
            $image = new Image();
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/upload/enhancement/mean/" . $_FILES["image"]["name"]);
            $im = imagecreatefromjpeg("public/upload/enhancement/mean/" . $_FILES["image"]["name"]);
            if ($im && $image->mean($im)) {
                imagejpeg($im, "public/upload/enhancement/mean/mean" . $_FILES["image"]["name"], 100);
                imagedestroy($im);
            }
            $asli = URL . "public/upload/enhancement/mean/" . $_FILES["image"]["name"];
            $hasil = URL . "public/upload/enhancement/mean/mean" . $_FILES["image"]["name"];
            $this->render('template/header');
            $this->render('enhancement/hasilmean', array('asli' => $asli, 'hasil' => $hasil));
            $this->render('template/footer');
        } else {
            $this->redir('enhancement/mean');
        }
    }

}
