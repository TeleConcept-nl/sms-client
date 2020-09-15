<?php
namespace Teleconcept\Sms\Client;

use Teleconcept\Sms\Client\Request\Credit\CheckRequestInterface as CheckCreditRequest;
use Teleconcept\Sms\Client\Request\Message\CheckRequestInterface as CheckMessageRequest;
use Teleconcept\Sms\Client\Request\Message\CreateRequestInterface as SendMessageRequest;
use Teleconcept\Sms\Client\Request\Pincode\CheckRequestInterface as CheckPincodeRequest;
use Teleconcept\Sms\Client\Response\ResponseInterface as Response;
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
