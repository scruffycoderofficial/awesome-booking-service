<?php

namespace DigitalClosuxe\Awesome\Service\BookingService;

/**
 * A general-purpose Booking Service.
 *
 * @author luyandasiko
 */
interface BookingService
{
    /**
     * Calculates the Total Price of this Booking Service.
     */
    public function calculatePrice();

    /**
     * Returns a brief description about the Booking.
     */
    public function getDescription();
}
