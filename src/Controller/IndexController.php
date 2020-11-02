<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Dog;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\DogRepository;


/**
 * @Route("/index")
 */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"POST","GET"})
     */
    public function ad(Request $request,DogRepository $dogRepository)
    {

    }
}
