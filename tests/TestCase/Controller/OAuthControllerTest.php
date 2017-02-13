<?php

namespace OAuthServer\Test\TestCase\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;
use OAuthServer\Controller\OAuthController;

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

Configure::write('OAuthServer.appController', TestAppController::class);

class OAuthControllerTest extends IntegrationTestCase
{
    public function setUp()
    {
        // class Router needs to be loaded in order for TestCase to automatically include routes
        // not really sure how to do it properly, this hotfix seems good enough
        Router::defaultRouteClass();
        parent::setUp();
    }

    public function testInstanceOfClassFromConfig()
    {
        $controller = new OAuthController();
        $this->assertInstanceOf(TestAppController::class, $controller);
    }

    public function extensions()
    {
        return [
            [null],
            ['json']
        ];
    }

    /**
     * @dataProvider extensions
     */
    public function testOauthRedirectsToAuthorize($ext)
    {
        $extension = $ext ? ".$ext" : '';
        $this->get("/oauth$extension?client_id=CID&anything=at_all");
        $this->assertRedirect(['controller' => 'OAuth', 'action' => 'authorize', '_ext' => $ext, '?' => ['client_id' => 'CID', 'anything' => 'at_all']]);
    }
}
