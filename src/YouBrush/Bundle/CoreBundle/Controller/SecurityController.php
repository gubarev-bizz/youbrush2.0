<?php

namespace YouBrush\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use YouBrush\Bundle\CoreBundle\Form\AuthorizationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="_security_login")
     * @Method("GET")
     * @Template("YouBrushCoreBundle:Security:login.html.twig")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(AuthorizationType::class, null, [
            'action' => $this->generateUrl('login_check')
        ]);
        $form->add('submit', SubmitType::class, [
            'label' => 'Login',
            'attr' => ['class' => 'btn btn-default']
        ]);

        return [
            'last_username' => $lastUsername,
            'error' => $error,
            'form' => $form->createView()
        ];
    }
}
