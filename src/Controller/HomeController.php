<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;
use Symfony\Contracts\Translation\TranslatorInterface;

#[Route('/{_locale}')]
class HomeController extends AbstractController
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

    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('frontend/index.html.twig');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
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
}
