<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'post_index')]
    public function index(): Response
    {
        return $this->render('posts/posts-listing.html.twig', [
            'title' => 'Listing des articles',
        ]);
    }
}