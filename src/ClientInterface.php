<?php
namespace Teleconcept\Sms\Client;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\Request\Credit\Check\RequestInterface as CheckCreditRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Check\RequestInterface as CheckDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Create\RequestInterface as CreateDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Check\RequestInterface as CheckNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Create\RequestInterface as CreateNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Pincode\Check\RequestInterface as CheckPincodeRequest;
use Teleconcept\Sms\Client\Response\Credit\Check\ResponseInterface as CheckCreditResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Check\ResponseInterface as CheckDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Create\ResponseInterface as CreateDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\ResponseInterface as CheckNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Create\ResponseInterface as CreateNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Pincode\Check\ResponseInterface as CheckPincodeResponse;

/**
 * Interface ClientInterface
 * @package Teleconcept\Sms\Client
 */
interface ClientInterface extends \GuzzleHttp\ClientInterface
{
    /**
     * @param CheckCreditRequest $request
     * @return CheckCreditResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function checkCredit(CheckCreditRequest $request): CheckCreditResponse;

    /**
     * @param CheckPincodeRequest $request
     * @return CheckPincodeResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function checkPincode(CheckPincodeRequest $request): CheckPincodeResponse;

    /**
     * @param CheckNormalMessageRequest $request
     * @return CheckNormalMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function checkNormalMessage(CheckNormalMessageRequest $request): CheckNormalMessageResponse;

    /**
     * @param CreateNormalMessageRequest $request
     * @return CreateNormalMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function createNormalMessage(CreateNormalMessageRequest $request): CreateNormalMessageResponse;

    /**
     * @param CheckDcbMessageRequest $request
     * @return CheckDcbMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function checkDcbMessage(CheckDcbMessageRequest $request): CheckDcbMessageResponse;

    /**
     * @param CreateDcbMessageRequest $request
     * @return CreateDcbMessageResponse
     * @throws GuzzleException
     * @throws ClientException
     */
    public function createDcbMessage(CreateDcbMessageRequest $request): CreateDcbMessageResponse;
}
