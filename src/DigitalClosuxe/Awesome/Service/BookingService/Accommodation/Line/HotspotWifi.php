<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\PriceList;
use DigitalClosuxe\Awesome\Service\BookingService\Domain\AccommodationBookingService;

/**
 * An Accomodation LineItem interface that could also be refered to as ServiceFeaturedItem.
 *
 * @author luyandasiko
 */
class HotspotWifi extends AccommodationBookingService
{
    /** [{@inheritdoc}] */
    public function getDescription()
    {
        return sprintf('%s with Wifi Hotspot', $this->bookingService->getDescription());
    }

    /** [{@inheritdoc}] */
    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + PriceList::WIFI_HOTSPOT;
    }
}
