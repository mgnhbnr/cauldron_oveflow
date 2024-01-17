<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response('welcome');
    }

    /**
     * @Route("/questions/{slug}")
     */
    public function show($slug) {

        $answers = [
            "But, sir, it's an emergency.",
            "Come back when it's a catastrophe."
        ];

        return $this -> render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers,
        ]);
    }

}

