<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\staffeltrede;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Staffeltrede controller.
 *
 * @Route("staffeltrede")
 */
class staffeltredeController extends Controller
{
    /**
     * Lists all staffeltrede entities.
     *
     * @Route("/", name="staffeltrede_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $staffeltredes = $em->getRepository('ShopBundle:staffeltrede')->findAll();

        return $this->render('staffeltrede/index.html.twig', array(
            'staffeltredes' => $staffeltredes,
        ));
    }

    /**
     * Creates a new staffeltrede entity.
     *
     * @Route("/new", name="staffeltrede_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $staffeltrede = new Staffeltrede();
        $form = $this->createForm('ShopBundle\Form\staffeltredeType', $staffeltrede);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($staffeltrede);
            $em->flush();

            return $this->redirectToRoute('staffeltrede_show', array('id' => $staffeltrede->getId()));
        }

        return $this->render('staffeltrede/new.html.twig', array(
            'staffeltrede' => $staffeltrede,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a staffeltrede entity.
     *
     * @Route("/{id}", name="staffeltrede_show")
     * @Method("GET")
     */
    public function showAction(staffeltrede $staffeltrede)
    {
        $deleteForm = $this->createDeleteForm($staffeltrede);

        return $this->render('staffeltrede/show.html.twig', array(
            'staffeltrede' => $staffeltrede,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing staffeltrede entity.
     *
     * @Route("/{id}/edit", name="staffeltrede_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, staffeltrede $staffeltrede)
    {
        $deleteForm = $this->createDeleteForm($staffeltrede);
        $editForm = $this->createForm('ShopBundle\Form\staffeltredeType', $staffeltrede);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('staffeltrede_edit', array('id' => $staffeltrede->getId()));
        }

        return $this->render('staffeltrede/edit.html.twig', array(
            'staffeltrede' => $staffeltrede,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a staffeltrede entity.
     *
     * @Route("/{id}", name="staffeltrede_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, staffeltrede $staffeltrede)
    {
        $form = $this->createDeleteForm($staffeltrede);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($staffeltrede);
            $em->flush();
        }

        return $this->redirectToRoute('staffeltrede_index');
    }

    /**
     * Creates a form to delete a staffeltrede entity.
     *
     * @param staffeltrede $staffeltrede The staffeltrede entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(staffeltrede $staffeltrede)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('staffeltrede_delete', array('id' => $staffeltrede->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
