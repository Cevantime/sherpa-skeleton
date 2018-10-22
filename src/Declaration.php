<?php

namespace App;

use DI\ContainerBuilder;
use Sherpa\App\App;
use Sherpa\Declaration\DeclarationInterface;
use Sherpa\Routing\Map;
use Zend\Diactoros\Response\HtmlResponse;

class Declaration extends \Sherpa\Declaration\Declaration
{
    public function definitions(ContainerBuilder $builder)
    {
        /* use di container to declare dependencies to inject. See http://php-di.org */

        //$builder->addDefinitions([
        //    'renderer.engine' => function($container) {
        //        return (new League\Plates\Engine($container->get('renderer.dir'), $container->get('renderer.ext')));
        //    },
        //    'renderer.dir' => 'templates',
        //    'renderer.ext' => 'php',
        //    My\Awesome\Injectable\Dependency::class => function() {
        //        return new My\Awesome\Injectable\Dependency();
        //    }
        //]);
    }

    public function routes(Map $map)
    {
        /* use aura router to declare routes : see https://github.com/auraphp/aura.router */

        $map->get('home', '/', function () {
            return new HtmlResponse("Welcome on the Sherpa skeleton !");
        });
        //
        //$map->get('hello', '/hello/{name}', function($name){
        //    return new HtmlResponse("Hello, $name !");
        //});
    }

    public function custom(App $app)
    {
        // here can go more custom declaration code
    }

    public function delayed(App $app)
    {
        /* you can use delayed function to write code that needs to be declared when container is ready : */

        //$app->delayed(function($app) {
        //    // declare middlewares here
        //
        //    $app->add(new MyAwesomeMiddleware($app->getContainer()), 75);
        //});
    }
}
