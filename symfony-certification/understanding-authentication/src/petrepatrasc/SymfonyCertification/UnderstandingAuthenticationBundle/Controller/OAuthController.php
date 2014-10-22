<?php


namespace petrepatrasc\SymfonyCertification\UnderstandingAuthenticationBundle\Controller;


use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class OAuthController extends Controller
{
    public function loginOauthAction()
    {
        $client = new Client;

        $request = $client->createRequest('POST', 'https://api.twitter.com/oauth/request_token');
        $postBody = $request->getBody();

        $request->setHeader('User-Agent', 'Symfony HTTP Client');

        $authorizationHeader = $this->generateAuthenticationHeader();
        $request->setHeader('Accept', '*/*');
        $request->setHeader('Authorization', 'OAuth ' . $authorizationHeader);

        /*echo '<pre>';
        echo (string)$request;
        die;*/

        $response = $client->send($request);
        var_dump($response);die;

        return new Response('Heya!');
    }

    protected function generateAuthenticationHeader()
    {
        $twitterConsumerKey = $this->container->getParameter('twitter_consumer_key');
        $twitterConsumerSecret = $this->container->getParameter('twitter_consumer_secret');
        $twitterNonce = $this->generateRandomString(32);

        $authorisationParameters = [
            'oauth_callback' => 'http%3A%2F%2Flocalhost%2Fapp_dev.php%2Foauth%2Fresponse',
            'oauth_consumer_key' => $twitterConsumerKey,
            'oauth_nonce' => $twitterNonce,
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0',
        ];

        $authorisationParameters = array_map(function($k, $v){
            return "$k=$v";
        }, array_keys($authorisationParameters), array_values($authorisationParameters));

        return implode(',', $authorisationParameters);
    }

    public function oauthTokenResponseAction()
    {

    }

    protected function generateRandomString($length = 32)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
} 