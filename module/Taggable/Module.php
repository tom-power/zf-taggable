<?php

namespace Taggable;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e) {
        $em = $e->getApplication()->getEventManager();

        $em->attach(\Zend\Mvc\MvcEvent::EVENT_RENDER, function($e) {
            $flashMessenger = new \Zend\Mvc\Controller\Plugin\FlashMessenger();
            $messagesArr = array();
            $this->updateMessages($messagesArr, $flashMessenger->getSuccessMessages(), false);
            $this->updateMessages($messagesArr, $flashMessenger->getErrorMessages(), true);
            $e->getViewModel()->setVariable('messages', $messagesArr);
        });
    }

    private function updateMessages(&$messagesArr, $messages, $error) {
        foreach ($messages as $value) {
            $message = new \StdClass();
            $message->message = $value;
            $message->error = $error;
            $messagesArr[] = $message;
        }
    }

    public function getServiceConfig() {

    }

}
