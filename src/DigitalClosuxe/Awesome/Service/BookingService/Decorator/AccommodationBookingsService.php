<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Decorator;

use DigitalClosuxe\Awesome\Service\BookingService\BookingService;

abstract class AccommodationBookingsService implements BookingService
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
}
