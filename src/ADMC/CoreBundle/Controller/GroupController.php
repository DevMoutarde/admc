<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ADMC\CoreBundle\Entity\Group;
use ADMC\CoreBundle\Form\Type\GroupType;

/**
 * Group controller.
 *
 */
class GroupController extends Controller
{
    /**
     * Lists all Group entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ADMCCoreBundle:Group')->findAll();
                return $this->render('ADMCCoreBundle:Group:index.html.twig', array(
            'entities'  => $entities,
        ));
    }

    /**
     * Finds and displays a Group entity.
     *
     */
    public function showAction(Group $group)
    {
        $deleteForm = $this->createDeleteForm($group->getId(), 'admin_groups_delete');

        return $this->render('ADMCCoreBundle:Group:show.html.twig', array(
            'group' => $group,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Group entity.
     *
     */
    public function newAction()
    {
        $group = new Group();
        $form = $this->createForm(new GroupType(), $group);

        return $this->render('ADMCCoreBundle:Group:new.html.twig', array(
            'group' => $group,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Group entity.
     *
     */
    public function createAction(Request $request)
    {
        $group = new Group();
        $form = $this->createForm(new GroupType(), $group);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_groups_show', array('id' => $group->getId())));
        }

        return $this->render('ADMCCoreBundle:Group:new.html.twig', array(
            'group' => $group,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Group entity.
     *
     */
    public function editAction(Group $group)
    {
        $editForm = $this->createForm(new GroupType(), $group, array(
            'action' => $this->generateUrl('admin_groups_update', array('id' => $group->getId())),
            'method' => 'PUT',
        ));
        $deleteForm = $this->createDeleteForm($group->getId(), 'admin_groups_delete');

        return $this->render('ADMCCoreBundle:Group:edit.html.twig', array(
            'group' => $group,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Group entity.
     *
     */
    public function updateAction(Group $group, Request $request)
    {
        $editForm = $this->createForm(new GroupType(), $group, array(
            'action' => $this->generateUrl('admin_groups_update', array('id' => $group->getId())),
            'method' => 'PUT',
        ));
        if ($editForm->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('admin_groups_edit', array('id' => $group->getId())));
        }
        $deleteForm = $this->createDeleteForm($group->getId(), 'admin_groups_delete');

        return $this->render('ADMCCoreBundle:Group:edit.html.twig', array(
            'group' => $group,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Group entity.
     *
     */
    public function deleteAction(Group $group, Request $request)
    {
        $form = $this->createDeleteForm($group->getId(), 'admin_groups_delete');
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($group);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_groups'));
    }

    /**
     * Create Delete form
     *
     * @param integer                       $id
     * @param string                        $route
     * @return \Symfony\Component\Form\Form
     */
    protected function createDeleteForm($id, $route)
    {
        return $this->createFormBuilder(null, array('attr' => array('id' => 'delete')))
            ->setAction($this->generateUrl($route, array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
