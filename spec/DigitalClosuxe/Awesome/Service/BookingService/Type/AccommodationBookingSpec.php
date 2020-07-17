<?php

namespace spec\DigitalClosuxe\Awesome\Service\BookingService\Type;

use PhpSpec\ObjectBehavior;
use DigitalClosuxe\Awesome\Service\BookingService\BookingService;
use DigitalClosuxe\Awesome\Service\BookingService\Type\AccommodationBooking;

class AccommodationBookingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(AccommodationBooking::class);
    }
    
    function it_is_a_booking_service_type()
    {
        $this->shouldImplement(BookingService::class);
    }
    
    function it_has_a_standard_price()
    {
        $this->calculatePrice()->shouldBeInteger();
    }
    
    function it_has_description()
    {
        $this->getDescription()->shouldBeString();
    }
}
