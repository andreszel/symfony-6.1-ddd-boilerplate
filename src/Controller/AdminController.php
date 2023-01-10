<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\LocaleSwitcher;

#[Route('/{_locale}/admin')]
class AdminController extends AbstractController
{
    private $localeSwitcher;

    public function __construct(LocaleSwitcher $localeSwitcher)
    {
        $this->localeSwitcher = $localeSwitcher;
    }

    #[Route('/test/access-control', name: 'admin_test')]
    public function test(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SUPERADMIN', null, 'User tried to access a page without having ROLE_SUPERADMIN');
        return $this->render('admin/test.html.twig');
    }

    #[Route('/test/render-function/{test}', name: 'admin_test_render_function')]
    public function testRenderFunction(string $test = 'default'): Response
    {
        dump($test);
        return $this->render('admin/test_render_function.html.twig', [
            'test' => $test
        ]);
    }



    #[Route('/dashboard', name: 'admin_dashboard')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        // pobieramy aktualnie ustawiony język
        $currentLocale = $this->localeSwitcher->getLocale();

        $this->addFlash('success', 'Admin is power! Flash success test!');
        $this->addFlash('info', 'Admin is power! Flash info test!');
        $this->addFlash('warning', 'Admin is power! Flash warning test!');
        $this->addFlash('danger', 'Admin is power! Flash danger test!');

        // ustawiamy język język
        //$this->localeSwitcher->setLocale('en');

        // Jeżeli chcemy coś przetłumaczyć pomimo ustawienia innego języka, np. default locale : pl na język angielski
        // możemy to zrobić w takim bloku
        /* $this->localeSwitcher->runWithLocale('en', function () {
            dump($this->localeSwitcher->getLocale());
            dump($this->translator->trans('Test tłumaczenia'));
        }); */

        /*         $userLog = $this->entityManager->getRepository(UserLog::class)->find(1);
        $userLog->setUserAgent('123');
        $this->entityManager->persist($userLog);
        $this->entityManager->flush(); */


        dump($currentLocale);

        return $this->render('admin/index.html.twig');
    }
}
