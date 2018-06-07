<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\staffelgroep;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Staffelgroep controller.
 *
 * @Route("staffelgroep")
 */
class staffelgroepController extends Controller
{
    /**
     * Lists all staffelgroep entities.
     *
     * @Route("/", name="staffelgroep_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $staffelgroeps = $em->getRepository('ShopBundle:staffelgroep')->findAll();

        return $this->render('staffelgroep/index.html.twig', array(
            'staffelgroeps' => $staffelgroeps,
        ));
    }

    /**
     * Creates a new staffelgroep entity.
     *
     * @Route("/new", name="staffelgroep_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $staffelgroep = new Staffelgroep();
        $form = $this->createForm('ShopBundle\Form\staffelgroepType', $staffelgroep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($staffelgroep);
            $em->flush();

            return $this->redirectToRoute('staffelgroep_show', array('id' => $staffelgroep->getId()));
        }

        return $this->render('staffelgroep/new.html.twig', array(
            'staffelgroep' => $staffelgroep,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a staffelgroep entity.
     *
     * @Route("/{id}", name="staffelgroep_show")
     * @Method("GET")
     */
    public function showAction(staffelgroep $staffelgroep)
    {
        $deleteForm = $this->createDeleteForm($staffelgroep);

        return $this->render('staffelgroep/show.html.twig', array(
            'staffelgroep' => $staffelgroep,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing staffelgroep entity.
     *
     * @Route("/{id}/edit", name="staffelgroep_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, staffelgroep $staffelgroep)
    {
        $deleteForm = $this->createDeleteForm($staffelgroep);
        $editForm = $this->createForm('ShopBundle\Form\staffelgroepType', $staffelgroep);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('staffelgroep_edit', array('id' => $staffelgroep->getId()));
        }

        return $this->render('staffelgroep/edit.html.twig', array(
            'staffelgroep' => $staffelgroep,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a staffelgroep entity.
     *
     * @Route("/{id}", name="staffelgroep_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, staffelgroep $staffelgroep)
    {
        $form = $this->createDeleteForm($staffelgroep);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($staffelgroep);
            $em->flush();
        }

        return $this->redirectToRoute('staffelgroep_index');
    }

    /**
     * Creates a form to delete a staffelgroep entity.
     *
     * @param staffelgroep $staffelgroep The staffelgroep entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(staffelgroep $staffelgroep)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('staffelgroep_delete', array('id' => $staffelgroep->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
