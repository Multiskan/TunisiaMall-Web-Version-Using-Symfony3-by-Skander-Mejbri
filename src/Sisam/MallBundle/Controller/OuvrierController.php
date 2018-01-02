<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Cartebancaire;
use Sisam\MallBundle\Entity\Ouvrier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ouvrier controller.
 *
 */
class OuvrierController extends Controller
{
    /**
     * Lists all ouvrier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ouvriers = $em->getRepository('SisamMallBundle:Ouvrier')->findAll();

        return $this->render('ouvrier/index.html.twig', array(
            'ouvriers' => $ouvriers,
        ));
    }


    /**
     * Creates a new ouvrier entity.
     *
     */
    public function newAction(Request $request)
    {
        $ouvrier = new Ouvrier();


        if ($request->isMethod('POST')) {
            $ouvrier->setNom($request->get('Nom'));
            $ouvrier->setPrenom($request->get('Prenom'));
            $ouvrier->setTel($request->get('Tel'));
            $ouvrier->setMail($request->get('Mail'));
            $ouvrier->setJours($request->get('jours'));
            $ouvrier->setAbsence($request->get('Absence'));
            $ouvrier->setPoste($request->get('Poste'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($ouvrier);
            $em->flush($ouvrier);


        }

        return $this->render('ouvrier/new.html.twig', array(

        ));
    }

    /**
     * Finds and displays a ouvrier entity.
     *
     */
    public function showAction(Ouvrier $ouvrier)
    {
        $deleteForm = $this->createDeleteForm($ouvrier);

        return $this->render('ouvrier/show.html.twig', array(
            'ouvrier' => $ouvrier,
            'delete_form' => $deleteForm->createView(),
        ));

    }

    /**
     * Displays a form to edit an existing ouvrier entity.
     *
     */
    public function editAction(Request $request, Ouvrier $ouvrier)
    {
        $deleteForm = $this->createDeleteForm($ouvrier);
        $editForm = $this->createForm('Sisam\MallBundle\Form\OuvrierType', $ouvrier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ouvrier_edit', array('id' => $ouvrier->getId()));
        }

        return $this->render('ouvrier/edit.html.twig', array(
            'ouvrier' => $ouvrier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ouvrier entity.
     *
     */
    public function deleteAction(Request $request, Ouvrier $ouvrier)
    {
        $form = $this->createDeleteForm($ouvrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ouvrier);
            $em->flush($ouvrier);
        }

        return $this->redirectToRoute('ouvrier_index');
    }

    /**
     * Creates a form to delete a ouvrier entity.
     *
     * @param Ouvrier $ouvrier The ouvrier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ouvrier $ouvrier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ouvrier_delete', array('id' => $ouvrier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function edit2Action(Ouvrier $ouvrier )
    {
        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $ouvrier->setJours(0);
        $em=$this->getDoctrine()->getManager();
        $em->persist($ouvrier);
        $em->flush($ouvrier);

        $deleteForm = $this->createDeleteForm($ouvrier);

        return $this->render('ouvrier/show.html.twig', array(
            'ouvrier' => $ouvrier,
            'delete_form' => $deleteForm->createView(),
        ));



    }


}
