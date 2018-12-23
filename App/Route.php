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
          $routes['add_usuario'] = array(
            'route' => '/Add_usuario',
            'controller' => 'UserController',
            'action' => 'add_usuario'
          );
          $routes['cadastrar_user'] = array(
            'route' => '/cadastrar_user',
            'controller' => 'UserController',
            'action' => 'cadastrar_user'
          );
          $routes['lista_usuarios'] = array(
            'route' => '/lista_usuarios',
            'controller' => 'UserController',
            'action' => 'lista_usuarios'
          );
          $routes['alterarPrivilegios'] = array(
            'route' => '/alterarPrivilegios',
            'controller' => 'UserController',
            'action' => 'alterarPrivilegios'
          );
          $routes['excluir_usuario'] = array(
            'route' => '/excluir_usuario',
            'controller' => 'UserController',
            'action' => 'excluir_usuario'
          );

          
          

          $this->setRoutes($routes);
      }
      
  }
?>