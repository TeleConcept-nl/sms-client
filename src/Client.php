<?php
namespace Teleconcept\Sms\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\Request\Credit\Check\RequestInterface as CheckCreditRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Check\RequestInterface as CheckDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Create\RequestInterface as CreateDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Check\RequestInterface as CheckNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Create\RequestInterface as CreateNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Pincode\Check\RequestInterface as CheckPincodeRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use Teleconcept\Sms\Client\Response\Credit\Check\Response as CheckCreditResponse;
use Teleconcept\Sms\Client\Response\Error\BadRequestResponse;
use Teleconcept\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Sms\Client\Response\Error\PreconditionFailedResponse;
use Teleconcept\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Check\Response as CheckDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Create\Response as CreateDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\Response as CheckNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Create\Response as CreateNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Pincode\CheckPincodeResponse;

/**
 * Class Client
 * @package Teleconcept\Sms\Client
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

        return new CheckCreditResponse($response);
    }

    /**
     * @param CheckPincodeRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPincode(CheckPincodeRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPincodeResponse($response);
    }

    /**
     * @param CheckNormalMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkNormalMessage(CheckNormalMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckNormalMessageResponse($response);
    }

    /**
     * @param CreateNormalMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function createNormalMessage(CreateNormalMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CreateNormalMessageResponse($response);
    }

    /**
     * @param CheckDcbMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkDcbMessage(CheckDcbMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckDcbMessageResponse($response);
    }

    /**
     * @param CreateDcbMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function createDcbMessage(CreateDcbMessageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CreateDcbMessageResponse($response);
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
