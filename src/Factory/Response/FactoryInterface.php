<?php
namespace Teleconcept\Sms\Client\Factory\Response;

use Psr\Http\Message\ResponseInterface as Response;
use Teleconcept\Sms\Client\Response\Credit\Check\ResponseInterface as CheckCreditResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Check\ResponseInterface as CheckDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Dcb\Create\ResponseInterface as CreateDcbMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\ResponseInterface as CheckNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Message\Normal\Create\ResponseInterface as CreateNormalMessageResponse;
use Teleconcept\Sms\Client\Response\Pincode\Check\ResponseInterface as CheckPincodeResponse;

/**
 * Class Factory
 */
interface FactoryInterface
{
    /**
     * @param Response $response
     * @return CheckCreditResponse
     */
    public function createCheckCreditResponse(Response $response): CheckCreditResponse;

    /**
     * @param Response $response
     * @return CheckPincodeResponse
     */
    public function createCheckPincodeResponse(Response $response): CheckPincodeResponse;

    /**
     * @param Response $response
     * @return CheckNormalMessageResponse
     */
    public function createCheckNormalMessageResponse(Response $response): CheckNormalMessageResponse;

    /**
     * @param Response $response
     * @return CreateNormalMessageResponse
     */
    public function createCreateNormalMessageResponse(Response $response): CreateNormalMessageResponse;

    /**
     * @param Response $response
     * @return CheckDcbMessageResponse
     */
    public function createCheckDcbMessageResponse(Response $response): CheckDcbMessageResponse;

    /**
     * @param Response $response
     * @return CreateDcbMessageResponse
     */
    public function createCreateDcbMessageResponse(Response $response): CreateDcbMessageResponse;
}
