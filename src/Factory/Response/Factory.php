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
class Factory implements FactoryInterface
{
    /**
     * @param Response $response
     * @return CheckCreditResponse
     */
    final public function createCheckCreditResponse(Response $response): CheckCreditResponse
    {
        return new \Teleconcept\Sms\Client\Response\Credit\Check\Response($response);
    }

    /**
     * @param Response $response
     * @return CheckPincodeResponse
     */
    final public function createCheckPincodeResponse(Response $response): CheckPincodeResponse
    {
        return new \Teleconcept\Sms\Client\Response\Pincode\Check\Response($response);
    }

    /**
     * @param Response $response
     * @return CheckNormalMessageResponse
     */
    final public function createCheckNormalMessageResponse(Response $response): CheckNormalMessageResponse
    {
        return new \Teleconcept\Sms\Client\Response\Message\Normal\Check\Response($response);
    }

    /**
     * @param Response $response
     * @return CreateNormalMessageResponse
     */
    final public function createCreateNormalMessageResponse(Response $response): CreateNormalMessageResponse
    {
        return new \Teleconcept\Sms\Client\Response\Message\Normal\Create\Response($response);
    }

    /**
     * @param Response $response
     * @return CheckDcbMessageResponse
     */
    final public function createCheckDcbMessageResponse(Response $response): CheckDcbMessageResponse
    {
        return new \Teleconcept\Sms\Client\Response\Message\Dcb\Check\Response($response);
    }

    /**
     * @param Response $response
     * @return CreateDcbMessageResponse
     */
    final public function createCreateDcbMessageResponse(Response $response): CreateDcbMessageResponse
    {
        return new \Teleconcept\Sms\Client\Response\Message\Dcb\Create\Response($response);
    }

}
