<?php

/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 22/04/2016
 * Time: 23:10
 */
class CoreController extends Core
{
    const DEFAULT_ACTION = DEFAULT_ACTION;
    protected $_view;
    protected $_model;

    public function __construct()
    {
        try{
            $this->_view = new CoreView();
            if(isset($_GET['action'])){
                $action = $_GET['action'];
            }else{
                $action = self::DEFAULT_ACTION;
            }
            if(method_exists($this, $action)){
                $this->$action();
            }else{
                $this->_view->setTitle("Cette page n'existe pas");
                $this->_view->loadPage("missing_page.php",null,'default/');
            }
        }catch (CustomException $e){
            throw new CustomException($e->getMessage());
        }catch (Exception $e){
            if(MODE_DEBUG == true){
                throw new CustomException($e->getMessage());
            }else{
                throw new CustomException('Erreur inconnue');
            }
        }
    }
}