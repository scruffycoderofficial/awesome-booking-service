<?php

namespace spec\DigitalClosuxe\Awesome\Service\BookingService\Type;

use DigitalClosuxe\Awesome\Service\BookingService\BookingService;
use DigitalClosuxe\Awesome\Service\BookingService\Type\AccommodationBooking;
use PhpSpec\ObjectBehavior;

class AccommodationBookingSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(AccommodationBooking::class);
    }

    public function it_is_a_booking_service_type()
    {
        $this->shouldImplement(BookingService::class);
    }

    public function it_has_a_standard_price()
    {
        $this->calculatePrice()->shouldBeInteger();
    }

    public function it_has_description()
    {
        $this->getDescription()->shouldBeString();
    }
}
