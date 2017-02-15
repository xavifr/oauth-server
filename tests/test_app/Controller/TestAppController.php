<?php

namespace TestApp\Controller;

use Cake\Controller\Controller;

class TestAppController extends Controller
{
    public function initialize()
    {
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            ]
        ]);
    }
}
