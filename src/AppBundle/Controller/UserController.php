<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\Type\EditUserType;
use AppBundle\Form\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @Route(
     *     path="/users",
     *     name="user_list"
     * )
     *
     * @return Response
     */
    public function listAction()
    {
        return $this->render('user/list.html.twig', ['users' => $this->getDoctrine()->getRepository('AppBundle:User')->findAll()]);
    }

    /**
     * @Route(
     *     path="/users/create",
     *     name="user_create"
     * )
     *
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $form = $this->createForm(UserType::class)
                     ->handleRequest($request);

        $createUserTypeHandler = $this->get('create_user_type_handler');

        if ($createUserTypeHandler->handle($form)) {
            $this->addFlash('success', "L'utilisateur a bien été ajouté.");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route(
     *     path="/users/{id}/edit",
     *     name="user_edit"
     * )
     *
     * @param User    $user
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function editAction(User $user, Request $request)
    {
        $form = $this->createForm(EditUserType::class)
                     ->handleRequest($request);

        $editUserTypeHandler = $this->get('edit_user_type_handler');

        if ($editUserTypeHandler->handle($form, $user)) {
            $this->addFlash('success', "L'utilisateur a bien été modifié");

            return $this->redirectToRoute('user_list');
        }

        return $this->render('user/edit.html.twig', ['form' => $form->createView(), 'user' => $user]);
    }
}
