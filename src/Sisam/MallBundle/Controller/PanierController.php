<?php

namespace Sisam\MallBundle\Controller;

use Sisam\MallBundle\Entity\Carte;
use Sisam\MallBundle\Entity\Cartebancaire;
use Sisam\MallBundle\Entity\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sisam\MallBundle\Entity\Produit;
use Tunisa\UserBundle \Entity\User;
/**
 * Panier controller.
 *
 */
class PanierController extends Controller
{
    /**
     * Lists all panier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $paniers = $em->getRepository('SisamMallBundle:Panier')->findBy(array('idClient'=>$idr));
        $cartes=   $em->getRepository('SisamMallBundle:Cartebancaire')->findBy(array('idUser'=>$idr));
        return $this->render('panier/index.html.twig', array(
            'paniers' => $paniers,'cartes'=>$cartes
        ));
    }

    /**
     * Creates a new panier entity.
     *
     */
    public function newAction(Request $request, Produit $produit)
    {
        $panier = new Panier();

        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $nom=$produit->getLibelle();
        $panier->setIdClient($idr);
        $pid=$produit->getIdProduit();
        $panier->setIdProduit($pid);
        $panier->setNom($nom);
            $em = $this->getDoctrine()->getManager();
            $em->persist($panier);
            $em->flush($panier);

            return $this->redirectToRoute('produit_index');
        }




    /**
     * Finds and displays a panier entity.
     *
     */
    public function showAction(Panier $panier)
    {
        $deleteForm = $this->createDeleteForm($panier);

        return $this->render('panier/show.html.twig', array(
            'panier' => $panier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing panier entity.
     *
     */
    public function editAction(Request $request, Panier $panier)
    {
        $deleteForm = $this->createDeleteForm($panier);
        $editForm = $this->createForm('Sisam\MallBundle\Form\PanierType', $panier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('panier_edit', array('id' => $panier->getId()));
        }

        return $this->render('panier/edit.html.twig', array(
            'panier' => $panier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a panier entity.
     *
     */
    public function deleteAction(Request $request, Panier $panier)
    {
        $form = $this->createDeleteForm($panier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($panier);
            $em->flush($panier);
        }

        return $this->redirectToRoute('panier_index');
    }

    /**
     * Creates a form to delete a panier entity.
     *
     * @param Panier $panier The panier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Panier $panier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('panier_delete', array('id' => $panier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function newwAction(Request $request, Produit $produit)
    {
        $panier = new Panier();

        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $nom=$produit->getLibelle();
        $panier->setIdClient($idr);
        $pid=$produit->getId();
        $ppr=$panier->getPrix();
        $panier->setIdProduit($pid+$ppr);
        $panier->setNom($nom);
        $panier->setPrix($produit->getPrix());
        $em = $this->getDoctrine()->getManager();
        $em->persist($panier);
        $em->flush($panier);

        return $this->redirectToRoute('produit_index');
    }
    public function achatAction(Cartebancaire $cartes)
    {

        $user=$this->get('security.token_storage')->getToken()->getUser();
        $idr=$user->getId();
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('SisamMallBundle:Panier');

        $total = $repo->createQueryBuilder('a')
            ->select('SUM(a.prix)')
            ->getQuery()
            ->getSingleScalarResult();
        $nb = $repo->createQueryBuilder('a')
            ->select('count(a.prix)')
            ->getQuery()
            ->getSingleScalarResult();
        $tot=$cartes->getSolde();
        $totti=$tot-$total;
        $cartes->setSolde($totti);
        $user->setNbachat($nb);
        $em->persist($user);
        $em->flush($user);
        $em->persist($cartes);
        $em->flush($cartes);

        return $this->redirectToRoute('panier_index');

    }
}
