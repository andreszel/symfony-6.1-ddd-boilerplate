<?php
// jeżeli dodamy event listener to wyłapuje wszystko i wszystko wpada tutaj
/* namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class AccessDeniedListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            // the priority must be greater than the Security HTTP
            // ExceptionListener, to make sure it's called before
            // the default exception listener
            KernelEvents::EXCEPTION => ['onKernelException', 2],
        ];
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        if (!$exception instanceof AccessDeniedException) {
            return;
        }

        // ... perform some action (e.g. logging)
        $content = '<html><body>Zalogowany ale nie ma odpowiednich uprawnień. AccessDeniedListener</body></html>';
        // optionally set the custom response
        $event->setResponse(new Response($content, 403));

        // or stop propagation (prevents the next exception listeners from being called)
        //$event->stopPropagation();
    }
}
 */