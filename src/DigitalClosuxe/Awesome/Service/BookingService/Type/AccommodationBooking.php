<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Type;

use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\StandardPrice;
use DigitalClosuxe\Awesome\Service\BookingService\BookingService;

/**
 * A default BookingService that could possible be a ServiceAggregateRoot interface.
 *
 * @author luyandasiko
 */
class AccommodationBooking implements BookingService
{
    /** [{@inheritdoc}] */
    public function calculatePrice()
    {
        return StandardPrice::VALUE;
    }

    /** [{@inheritdoc}] */
    public function getDescription()
    {
        return 'Double Room';
    }
}
