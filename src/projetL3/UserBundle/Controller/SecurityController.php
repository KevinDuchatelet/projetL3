<?php

namespace projetL3\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template as Template;
use Symfony\Component\Routing\Annotation\Route;
use projetL3\UserBundle\Entity\User;
use projetL3\UserBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller
{
    /**
     * @Route(name="login", path="/login")
     * @template
     */
    public function loginAction()
    {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('projetL3UserBundle::login.html.twig', array(
            'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    /**
     * @Route(name="insert_user", path="/insert-user")
     * @template
     */
    public function insertUserAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');

//        $role_user = new Role();
//        $role_user->setNameRole("ROLE_USER");
//
//        $role_admin = new Role();
//        $role_admin->setNameRole("ROLE_ADMIN");
//
//        $em->persist($role_user);
//        $em->persist($role_admin);
//        $em->flush();

        $user = new User();

        $user->setLogin('test');
        $user->setSalt(md5(time()));

        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('password', $user->getSalt());
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();

        return new Response();
    }

    /**
     * @Route(name="admin", path="/admin")
     * @template
     */
    public function adminAction()
    {
        return $this->render('D3tUserBundle::admin.html.twig');
    }
}