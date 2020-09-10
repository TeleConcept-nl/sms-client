<?php
namespace Teleconcept\Packages\Sms\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Packages\Sms\Client\Request\Credit\CheckCreditRequestInterface as CheckCreditRequest;
use Teleconcept\Packages\Sms\Client\Request\Message\CheckMessageRequestInterface as CheckMessageRequest;
use Teleconcept\Packages\Sms\Client\Request\Message\SendMessageRequestInterface as SendMessageRequest;
use Teleconcept\Packages\Sms\Client\Request\Pincode\CheckPincodeRequestInterface;
use Teleconcept\Packages\Sms\Client\Response\Error\BadRequestResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\PreconditionFailedResponse;
use Teleconcept\Packages\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\CheckMessageResponse;
use Teleconcept\Packages\Sms\Client\Response\Message\SendMessageResponse;
use Teleconcept\Packages\Sms\Client\Response\Pincode\CheckPincodeResponse;
use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;

/**
 * Class Client
 * @package Teleconcept\Packages\Transaction\Ivr\Client
 */
class Client extends GuzzleClient implements ClientInterface
{
    /**
     * Client constructor.
     * @param $smsApiDomain
     */
    public function __construct(string $smsApiDomain)
    {
        parent::__construct(['base_uri' => $smsApiDomain]);
    }

    /**
     * @param CheckCreditRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkCredit(CheckCreditRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPincodeResponse($response);
    }

    /**
     * @param CheckMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkMessage(CheckMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckMessageResponse($response);
    }

    /**
     * @param SendMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function sendMessage(SendMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new SendMessageResponse($response);
    }

    /**
     * @param CheckPincodeRequestInterface $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPincode(CheckPincodeRequestInterface $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPincodeResponse($response);
    }

    /**
     * @param ClientException $exception
     * @return Response
     * @throws ClientException
     */
    private function processClientException(ClientException $exception): Response
    {
        $errorResponse = $exception->getResponse();

        if ($errorResponse && $errorResponse->getStatusCode() === 400) {
            return new BadRequestResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 401) {
            return new UnauthorizedResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 404) {
            return new NotFoundResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 412) {
            return new PreconditionFailedResponse($errorResponse);
        }

        throw $exception;
    }
}
