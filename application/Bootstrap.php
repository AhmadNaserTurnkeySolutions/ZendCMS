<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
//    public function _initView(){
//        // создаем объект view
//        $view = new Zend_View();
// 
//        // указываем doctype соответствующий стандарту HTML5
//        $view->doctype('HTML5');
// 
//        // указываем заголовок нашего приложения который будет выводиться в
//        // теге <title>. Так же здесь мы указываем что сначала будет ити заголовок страницы,
//        // а потом уже название сайта, например так: Регистрация пользователя::SmallCMS
//        $view->headTitle('TestProject')->setDefaultAttachOrder(Zend_View_Helper_Placeholder_Container_Abstract::PREPEND);
// 
//        // указываем тег <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
//        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
// 
//        // подключаем javascript файлы
//        $view->headScript()->appendFile('/js/jquery-1.7.1.min.js');
//        $view->headScript()->appendFile('/js/jquery-ui-1.8.18.custom.min.js');
//        $view->headScript()->appendFile('/js/bootstrap.min.js');
// 
//        // подключаем пока единственный css файл
//        $view->headLink()->appendStylesheet('/css/bootstrap.css');
//        //$view->headLink()->appendStylesheet('/css/bootstrap-responsive.css');
//        //$view->headLink()->appendStylesheet('/css/docs.css');
// 
//        return $view;
//    }
    
    protected function _initView() {
// Initialize view
        $view = new Zend_View();
        $view->doctype('HTML5');
        $view->headTitle('Zend CMS with TweetBootstrap');
        $view->skin = 'tweetbootstrap';
// Add it to the ViewRenderer
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
                        'ViewRenderer'
        );
        $viewRenderer->setView($view);
// Return it, so that it can be stored by the bootstrap
        return $view;
    }
    
    protected function _initAutoload() {
// Add autoloader empty namespace
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->registerNamespace('CMS_');
        $resourceLoader = new Zend_Loader_Autoloader_Resource(array(
                    'basePath' => APPLICATION_PATH,
                    'namespace' => '',
                    'resourceTypes' => array(
                        'form' => array(
                            'path'
                            => 'forms/',
                            'namespace' => 'Form_',
                        ),
                        'model' => array(
                            'path'
                            => 'models/',
                            'namespace' => 'Model_'
                        ),
                    ),
                ));
// Return it so that it can be stored by the bootstrap
        return $autoLoader;
    }

}

