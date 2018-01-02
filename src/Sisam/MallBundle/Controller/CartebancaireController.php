<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Cartebancaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cartebancaire controller.
 *
 */
class CartebancaireController extends Controller
{
    /**
     * Lists all cartebancaire entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cartebancaires = $em->getRepository('SisamMallBundle:Cartebancaire')->findAll();

        return $this->render('cartebancaire/index.html.twig', array(
            'cartebancaires' => $cartebancaires,
        ));
    }

    /**
     * Creates a new cartebancaire entity.
     *
     */
    public function newAction(Request $request)
    {
        $cartebancaire = new Cartebancaire();
        $form = $this->createForm('Sisam\MallBundle\Form\CartebancaireType', $cartebancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cartebancaire);
            $em->flush($cartebancaire);

            return $this->redirectToRoute('cartebancaire_show', array('id' => $cartebancaire->getId()));
        }

        return $this->render('cartebancaire/new.html.twig', array(
            'cartebancaire' => $cartebancaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cartebancaire entity.
     *
     */
    public function showAction(Cartebancaire $cartebancaire)
    {
        $deleteForm = $this->createDeleteForm($cartebancaire);

        return $this->render('cartebancaire/show.html.twig', array(
            'cartebancaire' => $cartebancaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cartebancaire entity.
     *
     */
    public function editAction(Request $request, Cartebancaire $cartebancaire)
    {
        $deleteForm = $this->createDeleteForm($cartebancaire);
        $editForm = $this->createForm('Sisam\MallBundle\Form\CartebancaireType', $cartebancaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cartebancaire_edit', array('id' => $cartebancaire->getId()));
        }

        return $this->render('cartebancaire/edit.html.twig', array(
            'cartebancaire' => $cartebancaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cartebancaire entity.
     *
     */
    public function deleteAction(Request $request, Cartebancaire $cartebancaire)
    {
        $form = $this->createDeleteForm($cartebancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cartebancaire);
            $em->flush($cartebancaire);
        }

        return $this->redirectToRoute('cartebancaire_index');
    }

    /**
     * Creates a form to delete a cartebancaire entity.
     *
     * @param Cartebancaire $cartebancaire The cartebancaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cartebancaire $cartebancaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cartebancaire_delete', array('id' => $cartebancaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
