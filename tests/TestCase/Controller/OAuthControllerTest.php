<?php

namespace OAuthServer\Test\TestCase\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\TestSuite\TestCase;
use OAuthServer\Controller\OAuthController;

class TestAppController extends Controller
{
}

Configure::write('OAuthServer.appController', TestAppController::class);

class OAuthControllerTest extends TestCase
{
    public function testInstanceOfClassFromConfig()
    {
        $controller = new OAuthController();
        $this->assertInstanceOf(TestAppController::class, $controller);
    }
}
