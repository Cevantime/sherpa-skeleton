<?php

namespace App;

use Sherpa\App\App;
use Sherpa\Declaration\DeclarationInterface;
use Zend\Diactoros\Response\HtmlResponse;

class Declarations implements DeclarationInterface
{
    
    public function register(App $app)
    {
        
        /* connect a module by simply requiring the module declaration php file */

        // $app->addDeclaration(My\Declaration\Class::class);

        /* declare middlewares in delayed function : */

        //$app->delayed(function($app) {
        //    // declare middlewares here
        //
        //    $app->add(new MyAwesomeMiddleware(), 75);
        //});


        /* use aura router to declare routes : see https://github.com/auraphp/aura.router */

        $map = $app->getRouterMap();

        $map->get('home', '/', function () {
            return new HtmlResponse("Welcome on the Sherpa skeleton !");
        });
        
        //
        //$map->get('hello', '/hello/{name}', function($name){
        //    return new HtmlResponse("Hello, $name !");
        //});

        /* use di container to declare dependencies to inject. See http://php-di.org */

        //$builder = $app->getContainerBuilder();
        //
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

}
