<?php
namespace Teleconcept\Sms\Client\Response\Message\Dcb;

use DateTimeImmutable;

/**
 * Interface MessageInterface
 * @package Teleconcept\Sms\Client\Response\Message\Dcb
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return string
     */
    public function status(): string;

    /**
     * @return string
     */
    public function originator(): string;

    /**
     * @return string
     */
    public function recipient(): string;

    /**
     * @return string
     */
    public function body(): string;

    /**
     * @return string
     */
    public function operator(): string;
}
