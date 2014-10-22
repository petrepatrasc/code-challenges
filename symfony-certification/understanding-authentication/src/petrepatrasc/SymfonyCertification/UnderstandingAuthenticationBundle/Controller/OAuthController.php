<?php


namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Controller;


use GuzzleHttp\Client;
use GuzzleHttp\Post\PostBodyInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class OAuthController extends Controller
{
    public function loginAction($username, $password)
    {
        $client = new Client();
        $url = $this->generateUrl('auth.oauth.check', array(), UrlGeneratorInterface::ABSOLUTE_URL);

        $request = $client->createRequest('POST', $url);
        /** @var PostBodyInterface $postBody */
        $postBody = $request->getBody();

        $postBody->setField('username', $username);
        $postBody->setField('password', $password);

        $response = $client->send($request);
        $token = $response->getBody()->getContents();

        return new Response($token);
    }

    public function checkAction(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $token = base64_encode($username) . base64_encode($password);

        return new Response($token);
    }

    protected function generateRandomString($length = 32)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
} 