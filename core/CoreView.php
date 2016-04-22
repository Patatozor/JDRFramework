<?php

/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 22/04/2016
 * Time: 23:11
 */
class CoreView extends Core
{
    const TEMPLATES_DIR = TEMPLATES_DIR;
    const LAYOUTS_DIR = LAYOUTS_DIR;

    protected $_data;
    protected $_header;
    protected $_footer;
    protected $_title;

    public function __construct()
    {
        try{
            $this->setHeader(self::LAYOUTS_DIR.'header.php');
            $this->setFooter(self::LAYOUTS_DIR.'footer.php');
        }catch (Exception $e){
            if(MODE_DEBUG == true)
                throw new CustomException($e->getMessage());
            else
                die();
        }
    }

    public function load($view, $data = null, $dir = self::TEMPLATES_DIR){
        $this->_data = $data;
        $file = $dir.$view;
        if(file_exists($file))
            require_once $file;
        else
            throw new CustomException('le fichier n\'existe pas');
    }

    public function setFooter($footer){
        if(file_exists($footer))
            $this->_footer = $footer;
        else
            throw new CustomException('fichier pour le footer incorrect');
    }

    public function setHeader($header)
    {
        if(file_exists($header))
            $this->_header = $header;
        else
            throw new CustomException('fichier pour le header incorrect');
    }

    public function loadPage($view, $data = null, $dir = self::TEMPLATES_DIR){
        $this->_data = $data;
        $file = $dir.$view;
        if(file_exists($file)){
            require_once $this->_header;
            require_once $file;
            require_once $this->_footer;
        }else
            throw new CustomException('le fichier n\'existe pas');
    }

    public function setTitle($title){
        $this->_title = $title;
    }
}