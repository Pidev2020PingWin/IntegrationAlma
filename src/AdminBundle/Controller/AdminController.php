<?php

namespace AdminBundle\Controller;

use UserBundle\Entity\Articles_especes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Form\Articles_especesType;


class AdminController extends Controller
{

    public function afficherbackAction()
    {

        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository("UserBundle:Articles_especes")
            ->findAll();
        return $this->render('@Admin/informations/Articles_especes/articlesback.html.twig', array(
            'article' => $article

        ));
    }


    public function deletebackAction(Request $request,$id)
    {
        //the manager is the responsible for saving objects, deleting and updating object
        $em = $this->getDoctrine()->getManager();
        $article= $em->getRepository(Articles_especes::class)->find($id);
        //the remove() method notifies Doctrine that you'd like to remove the given object from the database
        $em->remove($article);
        //The flush() method execute the DELETE query.
        $em->flush();
        //redirect our function to the read page to show our table
        return $this->redirectToRoute('afficherback');

    }

    public function updatebackAction($id, Request $request){

        $todo = $this->getDoctrine()
            ->getRepository('UserBundle:Articles_especes')
            ->find($id);

        $todo->setTitre($todo->getTitre());
        $todo->setContenu($todo->getContenu());


        $form = $this->createForm(Articles_especesType::class, $todo);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $sn = $this->getDoctrine()->getManager();
            $todo = $sn->getRepository('UserBundle:Articles_especes')->find($id);
            $sn->persist($todo);
            $sn->flush();

            return $this->redirectToRoute('afficherback');
        }

        return $this->render('@Admin/informations/Articles_especes/modifback.html.twig', array(

            'todo'=>$todo,
            'form'=>$form->createView()
        ));

    }
    public function ajoutbackAction(Request $request)

    {

        $Articles_especes = new Articles_especes();
        $form = $this->createForm('UserBundle\Form\Articles_especesType', $Articles_especes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $now = new\DateTime('now');
            $em = $this->getDoctrine()->getManager();
            $Articles_especes->setIdEspeces(0);
            $Articles_especes->setIdCat(0);
            $Articles_especes->setIdArticle(0);
            $Articles_especes->setNumlike(0);
            $Articles_especes->setAccept(1);
            $Articles_especes->setDatePub($now);

            $em->persist($Articles_especes);
            $em->flush();
            return $this->redirectToRoute('afficherback');
        }
        return $this->render('@Admin/informations/Articles_especes/ajouterback.html.twig', array('Articles_especes' => $Articles_especes, 'form' => $form->createView()));

    }
    public function acceptAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $sn = $em->getRepository('UserBundle:Articles_especes')->find($id);
        $sn->setAccept(1);
        $em->persist($sn);
        $em->flush();
        return $this->redirectToRoute('Postapprov_homepage');
    }
    public function validepostAction(Request $request)
    {

        $todos = $this->getDoctrine()
            ->getRepository('UserBundle:Articles_especes')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $todos,
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('@Admin/informations/Articles_especes/articlesback.html.twig', array(

            'article' => $pagination,


        ));
    }
        public function deleteblogAction($id)
        {
            $em=$this->getDoctrine()->getManager();
            $sn = $em->getRepository('UserBundle:Articles_especes')->find($id);
            $em->remove($sn);
            $em->flush();
            return $this->redirectToRoute('Postapprov_homepage');
        }
    }
