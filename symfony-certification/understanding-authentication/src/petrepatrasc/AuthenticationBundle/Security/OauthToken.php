<?php


namespace petrepatrasc\AuthenticationBundle\Security;


use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class OauthToken extends AbstractToken
{
    /** @var string */
    protected $username;

    public function __construct(array $roles = [])
    {
        parent::__construct($roles);

        $this->setAuthenticated(count($roles) > 0);
    }

    /**
     * Returns the user credentials.
     *
     * @return string The user credentials
     */
    public function getCredentials()
    {
        return $this->username;
    }

    public function setCredentials($username)
    {
        $this->username = $username;
        return $this;
    }

} 