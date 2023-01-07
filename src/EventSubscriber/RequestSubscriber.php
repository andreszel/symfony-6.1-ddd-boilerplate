<?php

namespace App\EventSubscriber;

use DateTimeZone;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => [['onKernelRequest', 0]]
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        //$request = $event->getRequest();

        // some logic to determine the $locale
        //$request->setLocale($locale);

        /* dump($this->getCurrentDateTime());
        dump('onKernelRequest'); */
        if (!$event->isMainRequest()) {
            // don't do anything if it's not the main request
            /* dump($this->getCurrentDateTime());
            dump('not Main request'); */
            return;
        }
        /* dump($this->getCurrentDateTime());
        dump('main Request');
        dump($request . $this->getCurrentDateTime()); */
        // the URI being requested (e.g. /about) minus any query parameters
        /* $locale = $request->getLocale();
        $pathInfo = $request->getPathInfo();
        $httpHost = $request->server->get('HTTP_HOST'); // retrieves $_SERVER variables
        // retrieves an HTTP request header, with normalized, lowercase keys
        $host = $request->headers->get('host');
        $contentType = $request->headers->get('content-type');

        $methodRequest = $request->getMethod();    // e.g. GET, POST, PUT, DELETE or HEAD
        $langRequest = $request->getLanguages(); // an array of languages the client accepts

        $paramsRequest = [];
        $paramsRequest['locale'] = $locale;
        $paramsRequest['path-info'] = $pathInfo;
        $paramsRequest['http-host'] = $httpHost;
        $paramsRequest['host'] = $host;
        $paramsRequest['content-type'] = $contentType;
        $paramsRequest['method'] = $methodRequest;
        $paramsRequest['lang'] = $langRequest; */

        //dd($paramsRequest);
    }

    private function getCurrentDateTime()
    {
        $datetime = new \DateTime('now');
        $datetime->setTimezone(new DateTimeZone('Europe/Warsaw'));

        return $datetime->format('Y-m-d H:i:s.u');
    }
}
