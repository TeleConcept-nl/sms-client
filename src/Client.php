<?php
namespace Teleconcept\Sms\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\Factory\Response\FactoryInterface as ResponseFactory;
use Teleconcept\Sms\Client\Request\Credit\Check\RequestInterface as CheckCreditRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Check\RequestInterface as CheckDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Create\RequestInterface as CreateDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Check\RequestInterface as CheckNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Create\RequestInterface as CreateNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Pincode\Check\RequestInterface as CheckPincodeRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use Teleconcept\Sms\Client\Response\Credit\Check\ResponseInterface as CheckCreditResponse;
use Teleconcept\Sms\Client\Response\Error\BadRequestResponse;
use Teleconcept\Sms\Client\Response\Error\NotFoundResponse;
use Teleconcept\Sms\Client\Response\Error\PreconditionFailedResponse;
use Teleconcept\Sms\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Check\ResponseInterface as CheckDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Create\ResponseInterface as CreateDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\ResponseInterface as CheckNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Create\ResponseInterface as CreateNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Pincode\Check\ResponseInterface as CheckPincodeResponse;

/**
 * Class Client
 * @package Teleconcept\Sms\Client
 */
class Client extends GuzzleClient implements ClientInterface
{
    private ResponseFactory $responseFactory;

    /**
     * Client constructor.
     * @param string $smsApiDomain
     * @param ResponseFactory $responseFactory
     */
    public function __construct(string $smsApiDomain, ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
        parent::__construct(['base_uri' => $smsApiDomain]);
    }

    /**
     * @param CheckCreditRequest $request
     * @return CheckCreditResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function checkCredit(CheckCreditRequest $request): CheckCreditResponse
    {
        return $this->responseFactory->createCheckCreditResponse(
            $this->send($request)
        );
    }

    /**
     * @param CheckPincodeRequest $request
     * @return CheckPincodeResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function checkPincode(CheckPincodeRequest $request): CheckPincodeResponse
    {
        return $this->responseFactory->createCheckPincodeResponse(
            $this->send($request)
        );
    }

    /**
     * @param CheckNormalMessageRequest $request
     * @return CheckNormalMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function checkNormalMessage(CheckNormalMessageRequest $request): CheckNormalMessageResponse
    {
        return $this->responseFactory->createCheckNormalMessageResponse(
            $this->send($request)
        );
    }

    /**
     * @param CreateNormalMessageRequest $request
     * @return CreateNormalMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function createNormalMessage(CreateNormalMessageRequest $request): CreateNormalMessageResponse
    {
        return $this->responseFactory->createCreateNormalMessageResponse(
            $this->send($request)
        );
    }

    /**
     * @param CheckDcbMessageRequest $request
     * @return CheckDcbMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function checkDcbMessage(CheckDcbMessageRequest $request): CheckDcbMessageResponse
    {
        return $this->responseFactory->createCheckDcbMessageResponse(
            $this->send($request)
        );
    }

    /**
     * @param CreateDcbMessageRequest $request
     * @return CreateDcbMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    final public function createDcbMessage(CreateDcbMessageRequest $request): CreateDcbMessageResponse
    {
        return $this->responseFactory->createCreateDcbMessageResponse(
            $this->send($request)
        );
    }
}
