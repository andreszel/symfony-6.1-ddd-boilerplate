<?php

namespace App\EventSubscriber;

use App\Controller\CheckSettedLocalInUrlController;
use DateTimeZone;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class CheckLocaleUrlSubscriber implements EventSubscriberInterface
{
    private $default_locale_redirect;

    public function __construct()
    {
        //$this->default_locale_redirect = $this->getParameter('app.default_locale_redirect');
    }

    public function onKernelController(ControllerEvent $event)
    {
        /* dump($this->getCurrentDateTime());
        dump('onKernelController!'); */
        $controller = $event->getController();

        // when a controller class defines multiple action methods, the controller
        // is returned as [$controllerInstance, 'methodName']
        if (is_array($controller)) {
            $controller = $controller[0];
        }

        /* dump($this->getCurrentDateTime());
        dump($controller); */

        if ($controller instanceof  CheckSettedLocalInUrlController) {
            /* $token = $event->getRequest()->query->get('token');
            if (!in_array($token, $this->tokens)) {
                throw new AccessDeniedHttpException('This action needs a valid token!');
            } */
        }

        // mark the request as having passed token authentication
        //$event->getRequest()->attributes->set('auth_token', $token);
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        // check to see if onKernelController marked this as a token "auth'ed" request
        /* if (!$token = $event->getRequest()->attributes->get('auth_token')) {
            return;
        }

        $response = $event->getResponse();

        // create a hash and set it as a response header
        $hash = sha1($response->getContent() . $token);
        $response->headers->set('X-CONTENT-HASH', $hash); */
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => [['onKernelController', 0]],
            KernelEvents::RESPONSE => [['onKernelResponse', 0]],
        ];
    }

    private function getCurrentDateTime()
    {
        $datetime = new \DateTime('now');
        $datetime->setTimezone(new DateTimeZone('Europe/Warsaw'));

        return $datetime->format('Y-m-d H:i:s.u');
    }
}
