<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(): Response
    {
        $a = 1;
        $b = 3;
        $c = $a + $b;
        return $this->render('home.html.twig');
    }
}
