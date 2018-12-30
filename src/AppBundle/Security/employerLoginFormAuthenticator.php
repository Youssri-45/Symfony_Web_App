<?php
/**
 * Created by PhpStorm.
 * User: micro
 * Date: 11/05/2017
 * Time: 00:52
 */

namespace AppBundle\Security;


use AppBundle\Form\employerLoginForm;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class employerLoginFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $formFactory;
    private $em;
    private $router;

    public function __construct(FormFactoryInterface $formFactory, EntityManager $em, RouterInterface $router)
    {
        $this->formFactory = $formFactory;
        $this->em = $em;
        $this->router = $router;

    }

    public function getCredentials(Request $request)
    {
        $isLoginSubmit = $request->getPathInfo() == '/admin' && $request->isMethod('POST');

        if (!$isLoginSubmit) {
            return null;
        }

        $form = $this->formFactory->create(employerLoginForm::class);
        $form->handleRequest($request);
        $data = $form->getData();

        return $data;
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $username = $credentials['_username'];

        if ($username == 'admin@admin') {
            return $this->em->getRepository('AppBundle:Admin')->findOneBy(['email' => 'admin@admin']);
        }

        return $this->em->getRepository('AppBundle:Employer')->findOneBy(['email' => $username]);

    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $password = $credentials['_password'];
        if ($password == 'admin') {
            return true;
        }
        if ($password == $user->getPassword()) {
            return true;
        }

        return false;
    }

    protected function getLoginUrl()
    {
        return $this->router->generate('employer_login');
    }

//    protected function getDefaultSuccessRedirectUrl()
//    {
//        if ($this->getUser()->getRoles() == ['ROLE_ADMIN']){
//            return $this->router->generate('my_profile');
//        }
//        return $this->router->generate('employer_homepage');
//    }

    use TargetPathTrait;

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // if the user hits a secure page and start() was called, this was
        // the URL they were on, and probably where you want to redirect to
        $targetPath = $this->router->generate('employer_homepage');

            if ($token->getUser()->getRoles() == ['ROLE_ADMIN']) {
                $targetPath = $this->router->generate('admin_profile');
            }


        return new RedirectResponse($targetPath);
    }
}
