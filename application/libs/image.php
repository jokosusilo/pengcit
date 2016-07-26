<?php

class Image {

    function negate($im) {
        for ($x = 0; $x < imagesx($im); ++$x) {
            for ($y = 0; $y < imagesy($im); ++$y) {
                $index = imagecolorat($im, $x, $y);
                $rgb = imagecolorsforindex($im, $index);
                $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);

                imagesetpixel($im, $x, $y, $color);
            }
        }
        return(true);
    }

    function median($im) {
        for ($x = 1; $x < imagesx($im) - 1; $x++) {
            for ($y = 1; $y < imagesy($im) - 1; $y++) {
                $a = 0;
                for ($i = $x - 1; $i < $x + 2; $i++) {
                    for ($j = $y - 1; $j < $y + 2; $j++) {
                        $index = imagecolorat($im, $i, $j);
                        $rgb = imagecolorsforindex($im, $index);
                        $dred[$a] = $rgb['red'];
                        $dgreen[$a] = $rgb['green'];
                        $dblue[$a] = $rgb['blue'];
                        $a++;
                    }
                }
                $red = $this->nilaitengah($dred);
                $green = $this->nilaitengah($dgreen);
                $blue = $this->nilaitengah($dblue);
                $color = imagecolorallocate($im, $red, $green, $blue);
                imagesetpixel($im, $x, $y, $color);
            }
        }
        return (TRUE);
    }

    function mean($im) {
        for ($x = 1; $x < imagesx($im) - 1; $x++) {
            for ($y = 1; $y < imagesy($im) - 1; $y++) {
                $jumlahr = 0;
                $jumlahg = 0;
                $jumlahb = 0;
                for ($i = $x - 1; $i < $x + 2; $i++) {
                    for ($j = $y - 1; $j < $y + 2; $j++) {
                        $index = imagecolorat($im, $i, $j);
                        $rgb = imagecolorsforindex($im, $index);
                        $jumlahr = $jumlahr + $rgb['red'];
                        $jumlahg = $jumlahg + $rgb['green'];
                        $jumlahb = $jumlahb + $rgb['blue'];
                    }
                }
                $red = $jumlahr / 9;
                $green = $jumlahg / 9;
                $blue = $jumlahb / 9;
                $color = imagecolorallocate($im, $red, $green, $blue);
                imagesetpixel($im, $x, $y, $color);
            }
        }
        return (TRUE);
    }

    public function gabung($image1, $image2) {
        $w = (imagesx($image1) - imagesx($image2)) / 2;
        $h = (imagesy($image1) - imagesy($image2)) / 2;
        for ($i = 0; $i < imagesx($image1); $i++) {
            for ($j = 0; $j < imagesy($image1); $j++) {
                if (($i > $w) && $i < ($w + imagesx($image2))) {
                    if (($j > $h) && $j < ($h + imagesy($image2))) {
                        $index = imagecolorat($image2, $i-$w, $j-$h);
                        $rgb = imagecolorsforindex($image2, $index);
                        $color = imagecolorallocate($image2, $rgb['red'], $rgb['green'], $rgb['blue']);
                        imagesetpixel($image1, $i, $j, $color);
                    }
                }
            }
        }
        return(true);
    }

    public function pisah($im) {
        $pojok = imagecolorat($im, 0, 0);
        $rgb = imagecolorsforindex($im, $pojok);
        for ($x = 0; $x < imagesx($im); ++$x) {
            for ($y = 0; $y < imagesy($im); ++$y) {
                $index = imagecolorat($im, $x, $y);
                $rgb = imagecolorsforindex($im, $index);
                if ($rgb['blue'] > 50) {
                    $color = imagecolorallocatealpha($im, $rgb['red'], $rgb['green'], $rgb['blue'], 0);
                } else {
                    $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);
                }
                imagesetpixel($im, $x, $y, $color);
            }
        }
        return(true);
    }

    private function nilaitengah($data) {
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 1; $j < count($data); $j++) {
                if ($data[$j - 1] > $data[$j]) {
                    $data[$j] = $data[$j - 1] + $data[$j];
                    $data[$j - 1] = $data[$j] - $data[$j - 1];
                    $data[$j] = $data[$j] - $data[$j - 1];
                }
            }
        }
        return $data[4];
    }

}

?>