<?php namespace Firestarter\Thunder4\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Tasks extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Firestarter.Thunder4', 'main-thunder4-item', 'side-menu-item6');
    }
}