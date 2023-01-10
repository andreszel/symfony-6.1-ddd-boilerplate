<?php

namespace App\EventListener;

use App\Entity\LogType;
use App\Entity\User;
use App\Entity\UserLog;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutListener implements EventSubscriberInterface
{
    private $entityManager;
    private $tokenStorage;

    public function __construct(private UrlGeneratorInterface $urlGenerator, EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->entityManager =  $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            LogoutEvent::class => 'onLogout'
        ];
    }

    public function onLogout(LogoutEvent $event): void
    {
        $request = $event->getRequest();
        $session = $request->getSession();
        // get the security token of the session that is about to be logged out
        $token = $event->getToken();

        //$user = $this->tokenStorage->getToken()->getUser();
        $user = $token->getUser();

        $logTypeRepository = $this->entityManager->getRepository(LogType::class);
        $logType = $logTypeRepository->findOneBy(['isLogout' => true]);
        $userRepository = $this->entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $user->getEmail()]);

        $userLog = new UserLog();
        $userLog->setSessionId($session->getId());
        $userLog->setRemoteAddr($request->getClientIp());
        $userLog->setUserAgent($request->headers->get('User-Agent'));
        $userLog->setLogType($logType);
        $userLog->setUser($user);

        $this->entityManager->persist($userLog);
        $this->entityManager->flush();

        // get the current response, if it is already set by another listener
        $response = $event->getResponse();

        // configure a custom logout response to the homepage
        $response = new RedirectResponse(
            $this->urlGenerator->generate('app_login'),
            RedirectResponse::HTTP_SEE_OTHER
        );
        $event->setResponse($response);
    }
}
