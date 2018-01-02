<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Local;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Local controller.
 *
 */
class LocalController extends Controller
{
    /**
     * Lists all local entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locals = $em->getRepository('SisamMallBundle:Local')->findAll();

        return $this->render('local/index.html.twig', array(
            'locals' => $locals,
        ));
    }

    /**
     * Creates a new local entity.
     *
     */
    public function newAction(Request $request)
    {
        $local = new Local();


        if ($request->isMethod('POST')) {
            $local->setSurface($request->get('Surface'));
            $local->setPrixParMois($request->get('Prix'));
            $local->setEtat($request->get('Etat'));
            $local->setIdOu($request->get('idL'));

            $em=$this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush($local);


        }

        return $this->render('local/new.html.twig', array(

        ));
    }

    /**
     * Finds and displays a local entity.
     *
     */
    public function showAction(Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);

        return $this->render('local/show.html.twig', array(
            'local' => $local,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing local entity.
     *
     */
    public function editAction(Request $request, Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);
        $editForm = $this->createForm('Sisam\MallBundle\Form\LocalType', $local);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('local_edit', array('id' => $local->getId()));
        }

        return $this->render('local/edit.html.twig', array(
            'local' => $local,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a local entity.
     *
     */
    public function deleteAction(Request $request, Local $local)
    {
        $form = $this->createDeleteForm($local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($local);
            $em->flush($local);
        }

        return $this->redirectToRoute('local_index');
    }

    /**
     * Creates a form to delete a local entity.
     *
     * @param Local $local The local entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Local $local)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('local_delete', array('id' => $local->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function edit2Action(Local $local )
    {
        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $local->setEtat("loué");
        $em=$this->getDoctrine()->getManager();
        $em->persist($local);
        $em->flush($local);

        $deleteForm = $this->createDeleteForm($local);

        return $this->render('local/show.html.twig', array(
            'local' => $local,
            'delete_form' => $deleteForm->createView(),
        ));



    }

}
