<?php

namespace TDDV\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TDDV\CommandeBundle\Entity\Predicateur;
use TDDV\CommandeBundle\Form\PredicateurType;

/**
 * Predicateur controller.
 *
 */
class PredicateurController extends Controller
{

    /**
     * Lists all Predicateur entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TDDVCommandeBundle:Predicateur')->findAll();

        return $this->render('TDDVCommandeBundle:Predicateur:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Predicateur entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Predicateur();
        $form = $this->createForm(new PredicateurType(), $entity, array(
            'action' => $this->generateUrl('predicateur_create'),
            'method' => 'POST',
        ));
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('predicateur_show', array('id' => $entity->getId())));
        }

        return $this->render('TDDVCommandeBundle:Predicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Predicateur entity.
     *
     */
    public function newAction()
    {
        $entity = new Predicateur();
        $form   = $this->createForm(new PredicateurType(), $entity, array(
            'action' => $this->generateUrl('predicateur_create'),
            'method' => 'POST',
        ));

        return $this->render('TDDVCommandeBundle:Predicateur:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Predicateur entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Predicateur:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Predicateur entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predicateur entity.');
        }

        $editForm = $this->createForm(new PredicateurType(), $entity, array(
            'action' => $this->generateUrl('predicateur_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Predicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Predicateur entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predicateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PredicateurType(), $entity, array(
            'action' => $this->generateUrl('predicateur_update', array('id' => $entity->getId())),
            'method' => 'POST',
        ));
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('predicateur_edit', array('id' => $id)));
        }

        return $this->render('TDDVCommandeBundle:Predicateur:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Predicateur entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TDDVCommandeBundle:Predicateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Predicateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('predicateur'));
    }
    
    /**
     * Deletes a Predicateur entity.
     *
     */
    public function eraseAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TDDVCommandeBundle:Predicateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predicateur entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('predicateur'));
    }
    
    /**
     * Creates a form to delete a Predicateur entity by id.
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
