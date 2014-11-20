<?php

use Symfony\Component\Yaml\Yaml;


class MovieKernel extends AppKernel
{
    /**
     * @inheritdoc
     */
    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);

        $parametersDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'parameters.yml';
        $parametersData = Yaml::parse($parametersDirectory);

        $mashapeKey = $parametersData['parameters']['mashape_apikey'];
        $sudokuToSolve = '040053102208100700501420600814030207060205019050740063000074581185902000403008026';
        $expectedSolution = '746853192238196745591427638814639257367285419952741863629374581185962374473518926';

        $guzzleClient = new \Guzzle\Http\Client();
        $request = $guzzleClient->createRequest('GET', "https://sudokuchicken-sudoku-generator-solver.p.mashape.com/solve.php?p={$sudokuToSolve}");
        $request->addHeader('X-Mashape-Key', $mashapeKey);
        $responseWrapper = $guzzleClient->send($request);

        $apiResponse = json_decode($responseWrapper->getBody(true));

        if ($expectedSolution !== $apiResponse->solution) {
            throw new \Exception('Sudoku verification step failed');
        }
    }
} 