<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\PriceList;
use DigitalClosuxe\Awesome\Service\BookingService\Domain\AccommodationBookingService;

/**
 * An Accomodation LineItem interface that could also be refered to as ServiceFeaturedItem.
 *
 * @author luyandasiko
 */
class AdditionalBed extends AccommodationBookingService
{
    /** [{@inheritdoc}] */
    public function getDescription()
    {
        return sprintf('%s with an extra bed', $this->bookingService->getDescription());
    }

    /** [{@inheritdoc}] */
    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + PriceList::EXTRA_BED;
    }
}
