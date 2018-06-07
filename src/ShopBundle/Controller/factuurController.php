<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\artikel;
use ShopBundle\Entity\factuur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Factuur controller.
 *
 * @Route("factuur")
 */
class factuurController extends Controller
{
    /**
     * Lists all factuur entities.
     *
     * @Route("/", name="factuur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $factuurs = $em->getRepository('ShopBundle:factuur')->findAll();

        return $this->render('factuur/index.html.twig', array(
            'factuurs' => $factuurs,
        ));
    }

    /**
     * Creates a new factuur entity.
     *
     * @Route("/new", name="factuur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $factuur = new Factuur();
        $form = $this->createForm('ShopBundle\Form\factuurType', $factuur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($factuur);
            $em->flush();

            return $this->redirectToRoute('factuur_show', array('id' => $factuur->getId()));
        }

        return $this->render('factuur/new.html.twig', array(
            'factuur' => $factuur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a factuur entity.
     *
     * @Route("/{id}", name="factuur_show")
     * @Method("GET")
     */
    public function showAction(factuur $factuur)
    {
        $em = $this->getDoctrine()->getManager();

        $regels = $em->getRepository('ShopBundle:factuur_regel')->findby(['factuurnr' => $factuur->getId()]);
        $products = $em->getRepository(artikel::class)->findall();

        // dump($regels);
        $deleteForm = $this->createDeleteForm($factuur);

        return $this->render('factuur/show.html.twig', array(
            'factuur' => $factuur,
            'products' => $products,
            'regels' => $regels,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to edit an existing factuur entity.
     *
     * @Route("/{id}/edit", name="factuur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, factuur $factuur)
    {
        $deleteForm = $this->createDeleteForm($factuur);
        $editForm = $this->createForm('ShopBundle\Form\factuurType', $factuur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('factuur_edit', array('id' => $factuur->getId()));
        }

        return $this->render('factuur/edit.html.twig', array(
            'factuur' => $factuur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a factuur entity.
     *
     * @Route("/{id}", name="factuur_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, factuur $factuur)
    {
        $form = $this->createDeleteForm($factuur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($factuur);
            $em->flush();
        }

        return $this->redirectToRoute('factuur_index');
    }

    /**
     * Creates a form to delete a factuur entity.
     *
     * @param factuur $factuur The factuur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(factuur $factuur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('factuur_delete', array('id' => $factuur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
