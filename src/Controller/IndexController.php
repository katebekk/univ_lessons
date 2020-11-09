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
    private string $appEnv;
    private bool $appDebug;

    public function __construct(string $appEnv, bool $appDebug)
    {
        $this->appEnv = $appEnv;
        $this->appDebug = $appDebug;
        /*$this->databaseUrl = $databaseUrl;*/
    }

    /**
     * @Route("/index")
     */
    public function list()
    {
        return new JsonResponse(
            [
                'env' => $this->appEnv,
                'debug' => $this->appDebug,
                'list' => [
                    random_int(0,100),

                ]

            ]
        );

    }
}
