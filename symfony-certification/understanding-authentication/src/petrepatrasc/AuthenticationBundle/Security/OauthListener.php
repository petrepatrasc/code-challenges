<?php


namespace petrepatrasc\AuthenticationBundle\Security;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;

class OauthListener implements ListenerInterface
{
    /** @var SecurityContextInterface */
    protected $securityContext;

    /** @var AuthenticationManagerInterface */
    protected $authenticationManager;

    public function __construct(SecurityContextInterface $securityContext, AuthenticationManagerInterface $authenticationManager)
    {
        $this->securityContext = $securityContext;
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * This interface must be implemented by firewall listeners.
     *
     * @param GetResponseEvent $event
     */
    public function handle(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $username = $request->get('username');

        $token = new OauthToken();
        $token->setCredentials($username);

        $authToken = $this->authenticationManager->authenticate($token);
        $this->securityContext->setToken($authToken);
    }

} 