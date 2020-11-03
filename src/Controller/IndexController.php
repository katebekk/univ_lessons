<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{
    /**
     * @Route("/index")
     */
    public function list()
    {
        return new JsonResponse(
            [
                'env' => $_SERVER['APP_ENV'],
                'list' => [
                    random_int(0,100),
                    random_int(0,100),
                    random_int(0,100),
                    random_int(0,100),
                    random_int(0,100),
                    random_int(0,100),
                ]

            ]
        );

    }
}
