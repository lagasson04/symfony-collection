<?php

namespace App\Controller;

use App\Entity\Foo;
use App\Form\FooType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class FooController
 * @package App\Controller
 */
class FooController extends Controller
{
    /**
     * @Route("/", name="foo_index")
     *
     * @param EntityManagerInterface $manager
     *
     * @return Response
     */
    public function index(EntityManagerInterface $manager)
    {
        return $this->render('foo/index.html.twig', [
            "foos" => $manager->getRepository(Foo::class)->findAll()
        ]);
    }

    /**
     * @Route("/add", name="foo_add")
     *
     * @param Request                   $request
     * @param EntityManagerInterface    $manager
     *
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(FooType::class)->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()) {
            $manager->persist($form->getData());
            $manager->flush();
            return $this->redirectToRoute('foo_index');
        }
        return $this->render('foo/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{foo}", name="foo_update")
     *
     * @param Request                   $request
     * @param EntityManagerInterface    $manager
     * @param Foo                       $foo
     *
     * @return Response
     */
    public function update(Request $request, EntityManagerInterface $manager, Foo $foo)
    {
        $form = $this->createForm(FooType::class, $foo)->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()) {
            $manager->flush();
            return $this->redirectToRoute('foo_index');
        }
        return $this->render('foo/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
