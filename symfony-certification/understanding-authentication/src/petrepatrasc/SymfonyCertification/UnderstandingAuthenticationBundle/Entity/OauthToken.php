<?php


namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Entity;


use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;

class OauthToken extends AbstractToken
{
    /** @var string */
    protected $username;

    /**
     * @param string $username
     * @return $this
     */
    public function setCredentials($username)
    {
        $this->username = $username;
        return $this;
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

} 