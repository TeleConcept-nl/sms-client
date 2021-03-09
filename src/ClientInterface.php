<?php
namespace Teleconcept\Sms\Client;

use Teleconcept\Sms\Client\Request\Credit\Check\RequestInterface as CheckCreditRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Check\RequestInterface as CheckNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Normal\Create\RequestInterface as CreateNormalMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Check\RequestInterface as CheckDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Message\Dcb\Create\RequestInterface as CreateDcbMessageRequest;
use Teleconcept\Sms\Client\Request\Pincode\Check\RequestInterface as CheckPincodeRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Interface ClientInterface
 * @package Teleconcept\Sms\Client
 */
interface ClientInterface extends \GuzzleHttp\ClientInterface
{
    /**
     * @param CheckCreditRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkCredit(CheckCreditRequest $request): Response;

    /**
     * @param CheckPincodeRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPincode(CheckPincodeRequest $request): Response;

    /**
     * @param CheckNormalMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkNormalMessage(CheckNormalMessageRequest $request): Response;

    /**
     * @param CreateNormalMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createNormalMessage(CreateNormalMessageRequest $request): Response;

    /**
     * @param CheckDcbMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkDcbMessage(CheckDcbMessageRequest $request): Response;

    /**
     * @param CreateDcbMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createDcbMessage(CreateDcbMessageRequest $request): Response;
}
