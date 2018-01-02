<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Carte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sisam\MallBundle\Form\CarteType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Carte controller.
 *
 */
class CarteController extends Controller
{
    /**
     * Lists all carte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cartes = $em->getRepository('SisamMallBundle:Carte')->findAll();

        return $this->render('carte/index.html.twig', array(
            'cartes' => $cartes,
        ));
    }

    /**
     * Creates a new carte entity.
     *
     */
    public function newAction(Request $request)
    {
        $carte = new Carte();
        $form = $this->createForm('Sisam\MallBundle\Form\CarteType', $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carte);
            $em->flush($carte);

            return $this->redirectToRoute('carte_show', array('id' => $carte->getReference()));
        }

        return $this->render('carte/new.html.twig', array(
            'carte' => $carte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carte entity.
     *
     */
    public function showAction(Carte $carte)
    {
        $deleteForm = $this->createDeleteForm($carte);

        return $this->render('carte/show.html.twig', array(
            'carte' => $carte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carte entity.
     *
     */
    public function editAction(Request $request, Carte $carte)
    {
        $deleteForm = $this->createDeleteForm($carte);
        $editForm = $this->createForm('Sisam\MallBundle\Form\CarteType', $carte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carte_edit', array('id' => $carte->getReference()));
        }

        return $this->render('carte/edit.html.twig', array(
            'carte' => $carte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carte entity.
     *
     */
    public function deleteAction(Request $request, Carte $carte)
    {
        $form = $this->createDeleteForm($carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carte);
            $em->flush($carte);
        }

        return $this->redirectToRoute('carte_index');
    }

    /**
     * Creates a form to delete a carte entity.
     *
     * @param Carte $carte The carte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carte $carte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carte_delete', array('id' => $carte->getReference())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
