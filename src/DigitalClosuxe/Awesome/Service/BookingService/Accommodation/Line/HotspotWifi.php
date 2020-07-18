<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Decorator\AccommodationBookingsService;

class HotspotWifi extends AccommodationBookingsService
{
    private const ADDITIONAL_AMOUNT = 2;

    public function getDescription()
    {
        return sprintf('%s with Wifi Hotspot', $this->bookingService->getDescription());
    }

    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + self::ADDITIONAL_AMOUNT;
    }
}
