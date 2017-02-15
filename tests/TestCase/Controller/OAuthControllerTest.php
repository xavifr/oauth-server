<?php

namespace OAuthServer\Test\TestCase\Controller;

use Cake\TestSuite\TestCase;
use OAuthServer\Controller\OAuthController;
use TestApp\Controller\TestAppController;

class OAuthControllerTest extends TestCase
{
    public function testInstanceOfClassFromConfig()
    {
        $controller = new OAuthController();
        $this->assertInstanceOf(TestAppController::class, $controller);
    }
}
