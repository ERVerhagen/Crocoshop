<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\valuta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Valutum controller.
 *
 * @Route("valuta")
 */
class valutaController extends Controller
{
    /**
     * Lists all valutum entities.
     *
     * @Route("/", name="valuta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $valutas = $em->getRepository('ShopBundle:valuta')->findAll();

        return $this->render('valuta/index.html.twig', array(
            'valutas' => $valutas,
        ));
    }

    /**
     * Creates a new valutum entity.
     *
     * @Route("/new", name="valuta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $valutum = new Valutum();
        $form = $this->createForm('ShopBundle\Form\valutaType', $valutum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($valutum);
            $em->flush();

            return $this->redirectToRoute('valuta_show', array('id' => $valutum->getId()));
        }

        return $this->render('valuta/new.html.twig', array(
            'valutum' => $valutum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a valutum entity.
     *
     * @Route("/{id}", name="valuta_show")
     * @Method("GET")
     */
    public function showAction(valuta $valutum)
    {
        $deleteForm = $this->createDeleteForm($valutum);

        return $this->render('valuta/show.html.twig', array(
            'valutum' => $valutum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing valutum entity.
     *
     * @Route("/{id}/edit", name="valuta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, valuta $valutum)
    {
        $deleteForm = $this->createDeleteForm($valutum);
        $editForm = $this->createForm('ShopBundle\Form\valutaType', $valutum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('valuta_edit', array('id' => $valutum->getId()));
        }

        return $this->render('valuta/edit.html.twig', array(
            'valutum' => $valutum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a valutum entity.
     *
     * @Route("/{id}", name="valuta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, valuta $valutum)
    {
        $form = $this->createDeleteForm($valutum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($valutum);
            $em->flush();
        }

        return $this->redirectToRoute('valuta_index');
    }

    /**
     * Creates a form to delete a valutum entity.
     *
     * @param valuta $valutum The valutum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(valuta $valutum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('valuta_delete', array('id' => $valutum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
