<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Decorator\AccommodationBookingsService;

class AdditionalBed extends AccommodationBookingsService
{
    private const ADDITIONAL_AMOUNT = 30;

    public function getDescription()
    {
        return sprintf('%s with an extra bed', $this->bookingService->getDescription());
    }

    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + self::ADDITIONAL_AMOUNT;
    }
}
