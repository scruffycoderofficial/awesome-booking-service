<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Decorator\AccommodationBookingsService;

/**
 * An Accomodation LineItem interface that could also be refered to as ServiceFeaturedItem.
 *
 * @author luyandasiko
 */
class AdditionalBed extends AccommodationBookingsService
{
    /**
     * Additional charge for this Line Item.
     *
     * @var int
     */
    private const ADDITIONAL_AMOUNT = 30;

    /** [{@inheritdoc}] */
    public function getDescription()
    {
        return sprintf('%s with an extra bed', $this->bookingService->getDescription());
    }

    /** [{@inheritdoc}] */
    public function calculatePrice()
    {
        return $this->bookingService->calculatePrice() + self::ADDITIONAL_AMOUNT;
    }
}
