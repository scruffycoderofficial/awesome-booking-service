<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Domain\AccommodationBookingsService;

/**
 * An Accomodation LineItem interface that could also be refered to as ServiceFeaturedItem.
 *
 * @author luyandasiko
 */
class HotspotWifi extends AccommodationBookingsService
{
    /**
     * Additional charge for this Line Item.
     *
     * @var int
     */
    private const ADDITIONAL_AMOUNT = 2;

    /** [{@inheritdoc}] */
    public function getDescription()
    {
        return sprintf('%s with Wifi Hotspot', $this->bookingService->getDescription());
    }

    /** [{@inheritdoc}] */
    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + self::ADDITIONAL_AMOUNT;
    }
}
