<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Magasin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Magasin controller.
 *
 */
class MagasinController extends Controller
{
    /**
     * Lists all magasin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $magasins = $em->getRepository('SisamMallBundle:Magasin')->findAll();

        return $this->render('magasin/index.html.twig', array(
            'magasins' => $magasins,
        ));
    }

    /**
     * Creates a new magasin entity.
     *
     */
    public function newAction(Request $request)
    {
        $magasin = new Magasin();
        $form = $this->createForm('Sisam\MallBundle\Form\MagasinType', $magasin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($magasin);
            $em->flush($magasin);

            return $this->redirectToRoute('magasin_show', array('id' => $magasin->getId()));
        }

        return $this->render('magasin/new.html.twig', array(
            'magasin' => $magasin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a magasin entity.
     *
     */
    public function showAction(Magasin $magasin)
    {
        $deleteForm = $this->createDeleteForm($magasin);

        return $this->render('magasin/show.html.twig', array(
            'magasin' => $magasin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing magasin entity.
     *
     */
    public function editAction(Request $request, Magasin $magasin)
    {
        $deleteForm = $this->createDeleteForm($magasin);
        $editForm = $this->createForm('Sisam\MallBundle\Form\MagasinType', $magasin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('magasin_edit', array('id' => $magasin->getId()));
        }

        return $this->render('magasin/edit.html.twig', array(
            'magasin' => $magasin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a magasin entity.
     *
     */
    public function deleteAction(Request $request, Magasin $magasin)
    {
        $form = $this->createDeleteForm($magasin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($magasin);
            $em->flush($magasin);
        }

        return $this->redirectToRoute('magasin_index');
    }

    /**
     * Creates a form to delete a magasin entity.
     *
     * @param Magasin $magasin The magasin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Magasin $magasin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('magasin_delete', array('id' => $magasin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
