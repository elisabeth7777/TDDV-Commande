<?php

namespace TDDV\CommandeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Form;

use TDDV\CommandeBundle\Entity\Coffret;
use TDDV\CommandeBundle\Entity\CoffretMessage;
use TDDV\CommandeBundle\Form\CoffretType;
use TDDV\CommandeBundle\Form\CoffretMessageType;
use TDDV\CommandeBundle\Form\MessageCType;

/**
 * Coffret controller.
 *
 */
class CoffretController extends Controller
{

    /**
     * Lists all Coffret entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TDDVCommandeBundle:Coffret')->findAll();

        return $this->render('TDDVCommandeBundle:Coffret:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Coffret entity.
     *
     */
    public function createAction()
    {
        $entity  = new Coffret();
        $form = $this->createForm(new CoffretType(), $entity, array(
            'action' => $this->generateUrl('coffret_create'),
            'method' => 'POST',
        ));
        
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST') {
          // On fait le lien Requête <-> Formulaire
            $form->bind($request);
            
            if ($form->isValid()) {

                $coffretMessageClone = clone $entity->getCoffretmessages();
                $entity->getCoffretmessages()->clear();

                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();

                foreach ($coffretMessageClone as $value) {

                    $em->persist($value->getMessage());
                    $em->flush();

                    $value->setCoffret($entity);
                    $em->persist($value);
                    $em->flush();
                }

                return $this->redirect($this->generateUrl('coffret_show', array('id' => $entity->getId())));
            }
        }

        return $this->render('TDDVCommandeBundle:Coffret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Coffret entity.
     *
     */
    public function newAction()
    {
        $entity = new Coffret();
        $form   = $this->createForm(new CoffretType(), $entity, array(
            'action' => $this->generateUrl('coffret_create'),
            'method' => 'POST',
        ));

        return $this->render('TDDVCommandeBundle:Coffret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Coffret entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Coffret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coffret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Coffret:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Coffret entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Coffret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coffret entity.');
        }

        $editForm = $this->createForm(new CoffretType(), $entity, array(
            'action' => $this->generateUrl('coffret_update'),
            'method' => 'POST',
        ));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TDDVCommandeBundle:Coffret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Coffret entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TDDVCommandeBundle:Coffret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Coffret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CoffretType(), $entity, array(
            'action' => $this->generateUrl('coffret_update'),
            'method' => 'POST',
        ));
        $editForm->submit($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('coffret_edit', array('id' => $id)));
        }

        return $this->render('TDDVCommandeBundle:Coffret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Coffret entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TDDVCommandeBundle:Coffret')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Coffret entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('coffret'));
    }

    /**
     * Creates a form to delete a Coffret entity by id.
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
