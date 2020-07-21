<?php

namespace DigitalClosuxe\Awesome\Service\BookingService\Domain;

use DigitalClosuxe\Awesome\Service\BookingService\BookingService;

/**
 * An abstract AccommodationBookingService class for the Service Domain.
 *
 * @author luyandasiko
 */
abstract class AccommodationBookingService implements BookingService
{
    /**
     * A scoped Booking Service instance.
     *
     * @var BookingService
     */
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
}
