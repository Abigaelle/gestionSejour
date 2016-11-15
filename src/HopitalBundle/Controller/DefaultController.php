<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Patient;
use HopitalBundle\Entity\Service;
use HopitalBundle\Entity\Chambre;
use HopitalBundle\Entity\Lit;
use HopitalBundle\Entity\Sejour;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('HopitalBundle:Default:index.html.twig');
    }

    public function presentationAction()
    {
        return $this->render('HopitalBundle:Default:presentation.html.twig');
    }

    public function patientAction()
    {
    	$doctrine=$this->getDoctrine();
        $entityManager=$doctrine->getManager();
        $repository=$entityManager->getRepository('HopitalBundle:Patient');
        $lesPatients=$repository->findAll();
    	return $this->render('HopitalBundle:Default:patient.html.twig',array('lesPatients'=>$lesPatients));
    }

    public function serviceAction()
    {
        $doctrine=$this->getDoctrine();
        $entityManager=$doctrine->getManager();
        $repository=$entityManager->getRepository('HopitalBundle:Service');
        $lesServices=$repository->findAll();
        return $this->render('HopitalBundle:Default:service.html.twig',array('lesServices'=>$lesServices));
    }

    public function ajouterPatientAction(Request $request)
    {
        $unPatient=new Patient();
        $formBuilder=$this->createFormBuilder($unPatient);
        $formBuilder->add('nom','text',array('label'=>'Saisir le nom du patient :'));
        $formBuilder->add('prenom','text',array('label'=>'Saisir le prénom du patient :'));
        $formBuilder->add('dateNaissance','date');
        //$formBuilder->add('sejours','entity',array('class'=>'HopitalBundle:Sejour','property'=>'dateArriver'));
        $formBuilder->add('le_service','entity',array('class'=>'HopitalBundle:Service','property'=>'libelle','expanded'=>true));
        $formBuilder->add('chambre','entity',array('class'=>'HopitalBundle:Chambre','property'=>'libelle'));
        $formBuilder->add('lit','entity',array('class'=>'HopitalBundle:Lit','property'=>'libelle'));
        $formBuilder->add('sauvegarder','submit');
        $form=$formBuilder->getForm();
        if ($request->getMethod()=='POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
            	$doctrine=$this->getDoctrine();
            	$entityManager=$doctrine->getManager();
            	$entityManager->persist($unPatient);
            	$entityManager->flush();
            }            
        }
        return $this->render('HopitalBundle:Default:ajouterPatient.html.twig',array('form'=>$form->createView()));
    }
    public function modifierPatientAction(Request $request)
    {
        $id=$request->query->get('id');
        $doctrine=$this->getDoctrine();
        $entityManager=$doctrine->getManager();
        $repository=$entityManager->getRepository('HopitalBundle:Patient');
        $unPatient=$repository->find($id);
        $formBuilder=$this->createFormBuilder($unPatient);
        $formBuilder->add('nom','text',array('label'=>'Saisir le nom du patient :'));
        $formBuilder->add('prenom','text',array('label'=>'Saisir le prénom du patient :'));
        $formBuilder->add('dateNaissance','date');
        $formBuilder->add('le_service','entity',array('class'=>'HopitalBundle:Service','property'=>'libelle','expanded'=>true));
        $formBuilder->add('chambre','entity',array('class'=>'HopitalBundle:Chambre','property'=>'libelle'));
        $formBuilder->add('lit','entity',array('class'=>'HopitalBundle:Lit','property'=>'libelle'));
        $formBuilder->add('sauvegarder','submit'); 
        $form=$formBuilder->getForm();
        if ($request->getMethod()=='POST')
         {
            $form->bind($request);
            if ($form->isValid()) 
            	{
            		$doctrine=$this->getDoctrine();
            		$entityManager=$doctrine->getManager();
            		$entityManager->persist($unPatient);
            		$entityManager->flush();
            	}           
        }
        return $this->render('HopitalBundle:Default:modifierPatient.html.twig',array('form'=>$form->createView()));
    }
}
