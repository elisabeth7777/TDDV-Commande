<?php

namespace TDDV\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TDDV\CommandeBundle\Entity\Commande;
use TDDV\CommandeBundle\Entity\Predication;
use TDDV\CommandeBundle\Entity\Coffret;
use TDDV\CommandeBundle\Form\CommandeType;
use TDDV\CommandeBundle\Form\CommandeAddProduitType;
use TDDV\CommandeBundle\Form\PredicationCheckboxType;
use TDDV\CommandeBundle\Form\CoffretCheckboxType;

/**
 * Commande controller.
 *
 */
class CommandeController extends Controller
{

    /**
     * Lists all Commande entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TDDVCommandeBundle:Commande')->findAll();

        return $this->render('TDDVCommandeBundle:Commande:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    /**
     * Creates a new Commande entity.
     *
     */
    public function createAction(Request $request)
    {
        $commande  = new Commande();
        $form = $this->createForm(new CommandeType(), $commande, array(
            'action' => $this->generateUrl('commande_create'),
            'method' => 'POST',
        ));
        $form->submit($request);

        if ($form->isValid()) {
            $commandeProduitClone = clone $commande->getCoffretmessages();
            return $this->redirect($this->generateUrl('commande_show', array('id' => $commande->getId())));
        }

        return $this->render('TDDVCommandeBundle:Commande:new.html.twig', array(
            'entity' => $commande,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Commande entity.
     *
     */
    public function newAction()
    {
        $entity = new Commande();
        $form   = $this->createForm(new CommandeType(), $entity, array(
            'action' => $this->generateUrl('commande_create'),
            'method' => 'POST',
        ));

        return $this->render('TDDVCommandeBundle:Commande:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Commande entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Commande:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Commande entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
        }

        $editForm = $this->createForm(new CommandeType(), $entity, array(
            'action' => $this->generateUrl('commande_update'),
            'method' => 'POST',
        ));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Commande:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Commande entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Commande')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Commande entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CommandeType(), $entity, array(
            'action' => $this->generateUrl('commande_update'),
            'method' => 'POST',
        ));
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('commande_edit', array('id' => $id)));
        }

        return $this->render('TDDVCommandeBundle:Commande:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Commande entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TDDVCommandeBundle:Commande')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Commande entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('commande'));
    }

    /**
     * Creates a form to delete a Commande entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    
  
}
