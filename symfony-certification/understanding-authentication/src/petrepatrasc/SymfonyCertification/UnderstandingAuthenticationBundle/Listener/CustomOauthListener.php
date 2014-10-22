<?php


namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Listener;


use GuzzleHttp\Client;
use GuzzleHttp\Post\PostBodyInterface;
use petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Entity\OauthToken;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Firewall\AbstractAuthenticationListener;

class CustomOauthListener extends AbstractAuthenticationListener
{
    /**
     * Performs authentication.
     *
     * @param Request $request A Request instance
     *
     * @return TokenInterface|Response|null The authenticated token, null if full authentication is not possible, or a Response
     *
     * @throws AuthenticationException if the authentication fails
     */
    protected function attemptAuthentication(Request $request)
    {
        $client = new Client();
        $url = $this->generateUrl('auth.oauth.check', array(), UrlGeneratorInterface::ABSOLUTE_URL);

        $request = $client->createRequest('POST', $url);
        /** @var PostBodyInterface $postBody */
        $postBody = $request->getBody();

        $username = $request->get('username');
        $password = $request->get('password');

        $postBody->setField('username', $username);
        $postBody->setField('password', $password);

        $response = $client->send($request);
        $token = $response->getBody()->getContents();

        $oauthToken = new OauthToken();
        $oauthToken->setCredentials($token);

        $this->authenticationManager->authenticate($oauthToken);
    }

} 