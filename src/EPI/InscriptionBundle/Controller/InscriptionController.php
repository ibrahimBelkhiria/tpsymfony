<?php

namespace EPI\InscriptionBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use EPI\InscriptionBundle\Entity\Condidature;
use EPI\InscriptionBundle\Entity\image;
use EPI\InscriptionBundle\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InscriptionController extends Controller
{
    public function indexAction(Request $request)
    {
        $nom=$request->query->get('nom');

        return new Response('bonjour '.$nom.',vous etes sur epi job: le site sur lequel vous trouverez votre job de rêve');
    }



    public function voirAction($id)
    {
       $job=$this->getDoctrine()->getRepository('EPIInscriptionBundle:Job')->find($id);


       if ($job===null){
           throw new NotFoundHttpException("le job ayant l'id".$id."n'existe pas!");
       }


       $em=$this->getDoctrine()->getManager();
       $listCondidatures=$em->getRepository('EPIInscriptionBundle:Condidature')->findBy(array('job'=>$job));




       return $this->render('@EPIInscription/Inscription/voir.html.twig',array('job'=>$job,'listcondidatures'=>$listCondidatures));


    }

    public function ajouterAction(Request $request)
    {
        $date ="2020-01-01";

        $job=new Job();
        $formBuilder=$this->get('form.factory')->createBuilder(FormType::class,$job);
        $formBuilder->add('type',TextType::class)
            ->add('company',TextType::class)
            ->add('description',TextareaType::class)
            ->add('isActivated',CheckboxType::class)
            ->add('expiresAt',DateType::class)
            ->add('email',TextType::class)
            ->add('save',SubmitType::class);
        $form=$formBuilder->getForm();


        if($request->isMethod('POST')){


            $form->handleRequest($request);
            if ($form->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($job);
                $em->flush();


                $request->getSession()->getFlashBag()->add('notice','job enregistrée!');
                return $this->redirectToRoute('voir',array('id'=>$job->getId()));
            }

        }




    return $this->render('EPIInscriptionBundle:Inscription:ajouter.html.twig', array(
                    'form'=>$form->createView()
        ));
    }

    public function supprimerAction($id)
    {
        return $this->render('EPIInscriptionBundle:Inscription:supprimer.html.twig', array(
            'id'=>$id
        ));
    }


    public function modifierAction($id)
    {
        return $this->render('EPIInscriptionBundle:Inscription:modifier.html.twig', array(
            'id'=>$id
        ));
    }




    public function layoutAction(){
        return $this->render('EPIInscriptionBundle::layout.html.twig', array(
            // ...
        ));

    }



    public function menuAction()
    {
        $listjobs=array(
            array('id'=>1,'type'=>'recherche developpeur symfony'),
            array('id'=>2,'type'=>'recherche Architecte'),
            array('id'=>3,'type'=>'commercial'),

        );

        return $this->render('EPIInscriptionBundle:Inscription:menu.html.twig', array(
            'listjobs'=>$listjobs
        ));


    }






}
