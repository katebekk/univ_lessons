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
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/{id}/add", name="add", methods={"POST"})
     */
    public function add(Request $request,DogRepository $dogRepository)
    {
        if (!($request->request->has('name') && $request->request->has('breed'))) {
            $result = array('message' => 'smth goes wrong');
            return new JsonResponse($result);
        } else {
            if(!$dogRepository->findOneBy(array('id' => $request->attributes->get('id')))){
                $name = $request->request->get('name');
                $breed = $request->request->get('breed');
                $entityManager = $this->getDoctrine()->getManager();
                $newItem = new Dog();
                $newItem->setId($request->attributes->get('id'));
                $newItem->setName($name);
                $newItem->setBreed($breed);
                $entityManager->persist($newItem);
                $entityManager->flush();
                $result = array('id' => $newItem->getId(), 'name' => $newItem->getName(), 'breed' => $newItem->getBreed());
                return new JsonResponse($result);
            }
            $result = array('message'=>'dog  with this id already exist');
            return new JsonResponse($result);
        }
    }

    /**
     * @Route("/{id}/show", name="show", methods={"GET"})
     */
    public function show(Request $request, DogRepository $dogRepository)
    {
        $result = array();
        $items = $dogRepository->findBy(array('id' => $request->attributes->get('id')));
        foreach ($items as $item) {
            $result[] = ['id' => $item->getId(), 'name' => $item->getName(), 'breed' => $item->getBreed()];
        }
        return new JsonResponse($result);
    }

    /**
     * @Route("/loadImag", name="show", methods={"GET"})
     */
    /*public function loadImage(Request $request)
    {
        $result = array();
        $items = $dogRepository->findBy(array('id' => $request->attributes->get('id')));
        foreach ($items as $item) {
            $result[] = ['id' => $item->getId(), 'name' => $item->getName(), 'breed' => $item->getBreed()];
        }
        return new JsonResponse($result);
    }*/
}
