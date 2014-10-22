<?php


namespace petrepatrasc\AuthenticationBundle\Security;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;

class OauthListener implements ListenerInterface
{
    /** @var SecurityContextInterface */
    protected $securityContext;

    /** @var AuthenticationManagerInterface */
    protected $authenticationManager;

    /** @var ObjectManager */
    protected $manager;

    public function __construct(SecurityContextInterface $securityContext, AuthenticationManagerInterface $authenticationManager, ObjectManager $manager)
    {
        $this->securityContext = $securityContext;
        $this->authenticationManager = $authenticationManager;
        $this->manager = $manager;
    }

    /**
     * This interface must be implemented by firewall listeners.
     *
     * @param GetResponseEvent $event
     * @throws \Symfony\Component\Security\Core\Exception\AuthenticationException
     */
    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $username = $request->get('username');
        $password = $request->get('password');

        $user = $this->manager->getRepository('petrepatrascAuthenticationBundle:OauthUser')->findOneBy([
            'username' => $username,
            'password' => $password,
        ]);

        if (null === $user) {
            throw new AuthenticationException('No you don\'t!');
        }

        $token = new OauthToken();
        $token->setCredentials($username);

        $authToken = $this->authenticationManager->authenticate($token);
        $this->securityContext->setToken($authToken);
    }

} 