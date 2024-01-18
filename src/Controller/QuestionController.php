<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(Environment $twigEnvironment) {

        return $this -> render('question/homepage.html.twig');

    // alternative: using Twig Service directly
    // $html = $twigEnvironment ->render('question/homepage.html.twig');
    // return new Response($html);

    }

    /**
     * @Route("/questions/{slug}", name="app_question_show")
     */
    public function show($slug) {

        $answers = [
            "But, sir, it's an emergency.",
            "Come back when it's a catastrophe."
        ];

        dump($this);

        return $this -> render('question/show.html.twig', [
            'question' => ucwords(str_replace('-', ' ', $slug)),
            'answers' => $answers,
        ]);
    }

}

