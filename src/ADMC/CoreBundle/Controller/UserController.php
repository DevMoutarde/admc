<?php

namespace ADMC\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ADMC\CoreBundle\Entity\User;
use ADMC\CoreBundle\Form\Type\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ADMCCoreBundle:User')->findAll();
                return $this->render('ADMCCoreBundle:User:index.html.twig', array(
            'entities'  => $entities,
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user->getId(), 'admin_users_delete');

        return $this->render('ADMCCoreBundle:User:show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);

        return $this->render('ADMCCoreBundle:User:new.html.twig', array(
            'user' => $user,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserType(), $user);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_users_show', array('id' => $user->getId())));
        }

        return $this->render('ADMCCoreBundle:User:new.html.twig', array(
            'user' => $user,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(User $user)
    {
        $editForm = $this->createForm(new UserType(), $user, array(
            'action' => $this->generateUrl('admin_users_update', array('id' => $user->getId())),
            'method' => 'PUT',
        ));
        $deleteForm = $this->createDeleteForm($user->getId(), 'admin_users_delete');

        return $this->render('ADMCCoreBundle:User:edit.html.twig', array(
            'user' => $user,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(User $user, Request $request)
    {
        $editForm = $this->createForm(new UserType(), $user, array(
            'action' => $this->generateUrl('admin_users_update', array('id' => $user->getId())),
            'method' => 'PUT',
        ));
        if ($editForm->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('admin_users_edit', array('id' => $user->getId())));
        }
        $deleteForm = $this->createDeleteForm($user->getId(), 'admin_users_delete');

        return $this->render('ADMCCoreBundle:User:edit.html.twig', array(
            'user' => $user,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(User $user, Request $request)
    {
        $form = $this->createDeleteForm($user->getId(), 'admin_users_delete');
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_users'));
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
