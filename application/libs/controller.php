<?php

/**
 * This is the "base controller class". All other "real" controllers extend this class.
 */
class Controller {

    public function loadModel($model_name) {
        require 'application/models/' . strtolower($model_name) . '.php';
        return new $model_name();
    }

    protected function render($template, $data = array()) {
        $templatePathname = 'application/views/' . strtolower($template) . '.php';
        if (!is_file($templatePathname)) {
            echo "View cannot render `$template` because the template does not exist";
        }
        extract($data);
        ob_start();
        include $templatePathname;
        $renderedView = ob_get_clean();
        echo $renderedView;
    }

    protected function redir($url) {
        header('Location: ' . URL . $url);
    }

    protected function load($lib) {
        require 'application/libs/' . strtolower($lib) . '.php';
    }

}
