<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
declare(strict_types=1);

namespace App\Bootloader;

use App\Controller\MediaController;
use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Router\Route;
use Spiral\Router\RouteInterface;
use Spiral\Router\RouterInterface;
use Spiral\Router\Target\Action;
use Spiral\Router\Target\Namespaced;

class RoutesBootloader extends Bootloader
{
    /**
     * @param RouterInterface $router
     */
    public function boot(RouterInterface $router)
    {
        // named route
        $router->addRoute(
            'play',
            new Route('/play', new Action(MediaController::class, 'play'))
        );

        // named route
        $router->addRoute(
            'watch',
            new Route('/watch/<id>', new Action(MediaController::class, 'watch'))
        );

        // fallback (default) route
        $router->setDefault($this->defaultRoute());
    }

    /**
     * Default route points to namespace of controllers.
     *
     * @return RouteInterface
     */
    protected function defaultRoute(): RouteInterface
    {
        // handle all /controller/action like urls
        $route = new Route(
            '/[<controller>[/<action>]]',
            new Namespaced('App\\Controller')
        );

        return $route->withDefaults([
            'controller' => 'media',
            'action'     => 'index'
        ]);
    }
}