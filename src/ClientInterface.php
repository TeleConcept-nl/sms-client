<?php
namespace Teleconcept\Packages\Sms\Client;

use Teleconcept\Packages\Sms\Client\Request\Credit\CheckCreditRequestInterface as CheckCreditRequest;
use Teleconcept\Packages\Sms\Client\Request\Message\CheckMessageRequestInterface as CheckMessageRequest;
use Teleconcept\Packages\Sms\Client\Request\Message\SendMessageRequestInterface as SendMessageRequest;
use Teleconcept\Packages\Sms\Client\Request\Pincode\CheckPincodeRequestInterface as CheckPincodeRequest;
use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Interface ClientInterface
 * @package Teleconcept\Packages\Transaction\Ivr\Client
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
     * @param CheckMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkMessage(CheckMessageRequest $request): Response;

    /**
     * @param SendMessageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function sendMessage(SendMessageRequest $request): Response;

    /**
     * @param CheckPincodeRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPincode(CheckPincodeRequest $request): Response;
}
