<?php

class Double extends Controller {

    public function __construct() {
        $this->load('image');
    }

    public function index() {
    }

    public function penggabungan() {
        $this->render('template/header');
        $this->render('double/penggabungan');
        $this->render('template/footer');
    }

    public function hasilpenggabungan() {
        if (isset($_FILES) && $_FILES['image1']['error'] == 0 && $_FILES['image2']['error'] == 0) {
            $image = new Image();
            move_uploaded_file($_FILES["image1"]["tmp_name"], "public/upload/double/penggabungan/" . $_FILES["image1"]["name"]);
            move_uploaded_file($_FILES["image2"]["tmp_name"], "public/upload/double/penggabungan/" . $_FILES["image2"]["name"]);

            $im1 = imagecreatefromjpeg("public/upload/double/penggabungan/" . $_FILES["image1"]["name"]);
            $im2 = imagecreatefromjpeg("public/upload/double/penggabungan/" . $_FILES["image2"]["name"]);
            if ($im1 && $image->gabung($im1, $im2)) {
                imagejpeg($im1, "public/upload/double/penggabungan/gabung" . $_FILES["image1"]["name"], 100);
                imagedestroy($im1);
			}
            $asli1 = URL . "public/upload/double/penggabungan/" . $_FILES["image1"]["name"];
            $asli2 = URL . "public/upload/double/penggabungan/" . $_FILES["image2"]["name"];
            $hasil = URL . "public/upload/double/penggabungan/gabung" . $_FILES["image1"]["name"];
            $this->render('template/header');
            $this->render('double/hasilpenggabungan', array('asli1' => $asli1, 'asli2' => $asli2, 'hasil' => $hasil));
            $this->render('template/footer');
        } else {
            $this->redir('double/penggabungan');
        }
    }

    public function pengurangan() {
        $this->render('template/header');
        $this->render('double/pengurangan');
        $this->render('template/footer');
    }

    public function hasilpengurangan() {
        if (isset($_FILES) && $_FILES['image'] != NULL) {
            $image = new Image();
            $image->mean($im);
//            move_uploaded_file($_FILES["image"]["tmp_name"], "public/upload/single/negatif/" . $_FILES["image"]["name"]);
//            $im = imagecreatefromjpeg("public/upload/single/negatif/" . $_FILES["image"]["name"]);
//            if ($im && $image->pisah($im)) {
//                imagejpeg($im, "public/upload/single/negatif/negatif" . $_FILES["image"]["name"], 100);
//                imagedestroy($im);
//            }
//            $asli = URL . "public/upload/single/negatif/" . $_FILES["image"]["name"];
//            $hasil = URL . "public/upload/single/negatif/negatif" . $_FILES["image"]["name"];
//            $this->render('template/header');
//            $this->render('double/hasilpengurangan', array('asli' => $asli, 'hasil' => $hasil));
//            $this->render('template/footer');
//        } else {
//            $this->redir('double/pengurangan');
        }
    }

}
