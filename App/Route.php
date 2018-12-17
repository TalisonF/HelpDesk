<?php
  namespace App;

  use MF\Init\Bootstrap;
  class Route extends Bootstrap {
    
      protected function initRoutes(){
                 
          $routes['login'] = array(
            'route' => '/',
            'controller' => 'loginController',
            'action' => 'login'
          );
          $routes['autentica_usuario'] = array(
            'route' => '/autentica_usuario',
            'controller' => 'LoginController',
            'action' => 'autentica_usuario'
          );
          $routes['home'] = array(
            'route' => '/home',
            'controller' => 'indexController',
            'action' => 'home'
          );
          $routes['abrir_cadastro'] = array(
            'route' => '/abrir_cadastro',
            'controller' => 'indexController',
            'action' => 'abrir_cadastro'
          );
          $routes['consultar_chamados'] = array(
            'route' => '/consular_chamados',
            'controller' => 'indexController',
            'action' => 'consultar_chamados'
          );

          $this->setRoutes($routes);
      }
      
  }
?>