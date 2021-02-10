<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="root")
     */
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


    /**
     * @Route("/listposts/{username}-{id}", name="listposts")
     */
    public function getPost($username, $id): Response
    {

        $listPostById = $this->getpostTest($id);
        $userById = $this->getdataUser($id);
        return $this->render('main/listposts.html.twig', [
            'posts' => $listPostById,
            'user' => $userById,
            'username' => $username,
            'id' => $id,

        ]);
    }

    public function getpostTest($id)
    {

        $posts = json_decode(file_get_contents(__DIR__ . '/../Resources/posts.json', true));
        $searchedValue = $id;
        $neededObject = array_filter(
            $posts,
            function ($e) use ($searchedValue) {
                return $e->userId == $searchedValue;
            }
        );

        return $neededObject;
        //return json_decode(file_get_contents(__DIR__ . '/../Resources/posts.json', true));

    }

    public function getdataUser($id)
    {


        $posts = json_decode(file_get_contents(__DIR__ . '/../Resources/users.json', true));
        $searchedValue = $id;
        $neededObject = array_filter(
            $posts,
            function ($e) use ($searchedValue) {
                return $e->id == $searchedValue;
            }
        );
        

        return $neededObject;



        //return json_decode(file_get_contents(__DIR__ . '/../Resources/users.json', true));

    }


}
