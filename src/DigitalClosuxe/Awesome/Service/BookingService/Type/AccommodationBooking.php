<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Type;

use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\StandardPrice;
use DigitalClosuxe\Awesome\Service\BookingService\BookingService;

class AccommodationBooking implements BookingService
{
    public function calculatePrice()
    {
        return StandardPrice::VALUE;
    }

    public function getDescription()
    {
        return 'Double Room';
    }
}
