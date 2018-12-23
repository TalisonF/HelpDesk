<?php
  namespace App;

  use MF\Init\Bootstrap;
  class Route extends Bootstrap {
    
      protected function initRoutes(){
                 
          $routes['login'] = array(
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
          );
          $routes['autentica_usuario'] = array(
            'route' => '/autentica_usuario',
            'controller' => 'AuthController',
            'action' => 'autentica_usuario'
          );

          $routes['home'] = array(
            'route' => '/home',
            'controller' => 'AppController',
            'action' => 'home'
          );
          $routes['sair'] = array(
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'sair'
          );
          $routes['abrir_chamado'] = array(
            'route' => '/abrir_chamado',
            'controller' => 'AppController',
            'action' => 'abrir_chamado'
          );
          $routes['registra_chamado'] = array(
            'route' => '/registra_chamado',
            'controller' => 'AppController',
            'action' => 'registra_chamado'
          );
          $routes['consultar_chamado'] = array(
            'route' => '/consultar_chamado',
            'controller' => 'AppController',
            'action' => 'consultar_chamado'
          );
          $routes['excluir_chamado'] = array(
            'route' => '/excluir_chamado',
            'controller' => 'AppController',
            'action' => 'excluir_chamado'
          );
          
          
          

          $this->setRoutes($routes);
      }
      
  }
?>