<?php

namespace App\Controller;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("", name="homepage", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $page = $request->query->get('page', 1);
        $data = range(1, 100);
        $pagination = $paginator->paginate($data, $page);

        return $this->render('base.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
