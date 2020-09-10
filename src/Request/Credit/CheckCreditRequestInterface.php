<?php
namespace Teleconcept\Packages\Sms\Client\Request\Credit;

use Teleconcept\Packages\Sms\Client\Request\RequestInterface;
use Teleconcept\Packages\Sms\Client\Response\Credit\CheckCreditResponseInterface as CheckCreditResponse;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request\Credit
 */
interface CheckCreditRequestInterface extends RequestInterface
{
    /**
     * @return CheckCreditResponse
     */
    public function send(): CheckCreditResponse;
}
