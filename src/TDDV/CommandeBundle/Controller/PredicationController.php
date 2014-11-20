<?php

namespace TDDV\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TDDV\CommandeBundle\Entity\Predication;
use TDDV\CommandeBundle\Form\PredicationType;

/**
 * Predication controller.
 *
 */
class PredicationController extends Controller
{

    /**
     * Lists all Predication entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TDDVCommandeBundle:Predication')->findAll();

        return $this->render('TDDVCommandeBundle:Predication:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Predication entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Predication();
        $form = $this->createForm(new PredicationType(), $entity, array(
            'action' => $this->generateUrl('predication_create'),
            'method' => 'POST',
        ));
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('predication'));
        }

        return $this->render('TDDVCommandeBundle:Predication:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Predication entity.
     *
     */
    public function newAction()
    {
        $entity = new Predication();
        $form   = $this->createForm(new PredicationType(), $entity, array(
            'action' => $this->generateUrl('predication_create'),
            'method' => 'POST',
        ));

        return $this->render('TDDVCommandeBundle:Predication:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Predication entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Predication:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Predication entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predication entity.');
        }

        $editForm = $this->createForm(new PredicationType(), $entity, array(
            'action' => $this->generateUrl('predication_update'),
            'method' => 'POST',
        ));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Predication:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Predication entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Predication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predication entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PredicationType(), $entity, array(
            'action' => $this->generateUrl('predication_update'),
            'method' => 'POST',
        ));
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('predication_edit', array('id' => $id)));
        }

        return $this->render('TDDVCommandeBundle:Predication:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Predication entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TDDVCommandeBundle:Predication')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Predication entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('predication'));
    }

        /**
     * Deletes a Predication entity.
     *
     */
    public function eraseAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TDDVCommandeBundle:Predication')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Predication entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('predication'));
    }
    
    /**
     * Creates a form to delete a Predication entity by id.
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
