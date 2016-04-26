<?php

/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 23/04/2016
 * Time: 18:50
 */
class SpellsController extends AdminController
{
    public function liste(){
        $this->_view->setTitle('Liste des sorts');
        $this->_view->loadPage('admin/spells/list.php');
    }
}