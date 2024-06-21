<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing;

/**
 * A Business Rule implementation e.g. minimum value, in price, for an Accommodation BookingService.
 *
 * @author luyandasiko
 */
abstract class StandardPrice
{
    /**
     * Minimum value a Service is expected to honour.
     *
     * @var int
     */
    const VALUE = 40;
}
