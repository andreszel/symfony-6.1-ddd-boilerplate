<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController implements CheckSettedLocalInUrlController
{
    private $translator;

    private $localeSwitcher;

    public function __construct(
        LocaleSwitcher $localeSwitcher,
        TranslatorInterface $translator
    ) {
        $this->translator = $translator;
        $this->localeSwitcher = $localeSwitcher;
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

    #[Route('/{_locale}/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        // pobieramy aktualnie ustawiony język
        $currentLocale = $this->localeSwitcher->getLocale();

        // ustawiamy język język
        //$this->localeSwitcher->setLocale('en');

        // Jeżeli chcemy coś przetłumaczyć pomimo ustawienia innego języka, np. default locale : pl na język angielski
        // możemy to zrobić w takim bloku
        /* $this->localeSwitcher->runWithLocale('en', function () {
            dump($this->localeSwitcher->getLocale());
            dump($this->translator->trans('Test tłumaczenia'));
        }); */

        dump($currentLocale);

        return $this->render('backend/index.html.twig');
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
