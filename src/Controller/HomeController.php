<?php

namespace App\Controller;

use App\Entity\UserLog;
use App\Repository\UserLogRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController implements CheckSettedLocalInUrlController
{
    private $translator;
    private $entityManager;

    public function __construct(
        TranslatorInterface $translator,
        EntityManagerInterface $entityManager
    ) {
        $this->translator = $translator;
        $this->entityManager = $entityManager;
    }

    #[Route('/')]
    public function indexNoLocale(): Response
    {
        return $this->redirectToRoute('app_homepage', ['_locale' => $this->getParameter('app.default_locale_redirect')]);
    }

    #[Route('/{_locale}', name: 'app_homepage')]
    public function index(Request $request): Response
    {
        $locale = $request->getLocale();
        return $this->render('frontend/index.html.twig', ['locale' => $locale]);
    }

    public function about(): Response
    {
        return $this->render('frontend/about.html.twig');
    }

    #[Route('/{_locale}/change-language', name: 'app_select_language_switcher')]
    public function select_language(Request $request): Response
    {
        $referer = $request->server->get('HTTP_REFERER');
        $language = $request->get('language');
        /* dump($language); */
        $redirect_url = explode('/', $referer);
        $redirect_url[3] = $language;
        $redirect_url = implode('/', $redirect_url);
        $request->setLocale($language);
        /* dump($redirect_url);
        dd($referer); */
        return $this->redirect($redirect_url);
    }
}
