<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TableController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'users' => json_decode(file_get_contents(__DIR__ . '/../Resources/users.json', true)),
        ]);
    }

    /**
     * @Route("/posts", name="posts")
     */
    public function getPosts(): Response
    {
        return $this->json(json_decode(file_get_contents(__DIR__ . '/../Resources/posts.json')));
    }

}