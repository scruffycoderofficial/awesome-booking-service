<?php

namespace spec\DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line;

use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line\AdditionalBed;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\StandardPrice;
use DigitalClosuxe\Awesome\Service\BookingService\BookingService;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;

class AdditionalBedSpec extends ObjectBehavior
{
    public function let(BookingService $bookingService)
    {
        $bookingService->getDescription()
            ->willReturn('Double bedroom');

        $bookingService->calculatePrice()
            ->willReturn(StandardPrice::VALUE);

        $this->beConstructedWith($bookingService);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(AdditionalBed::class);
    }

    public function it_is_a_booking_service()
    {
        $this->shouldImplement(BookingService::class);
    }

    public function it_has_an_accumulated_price()
    {
        $this->calculatePrice()->shouldBeMoreThan(StandardPrice::VALUE);
    }

    public function it_has_extra_bed_description()
    {
        $this->getDescription()->shouldContain('extra bed');
    }

    public function getMatchers(): array
    {
        return [
            'beMoreThan' => function ($subject, $expected) {
                if ((int) $subject < (int) StandardPrice::VALUE) {
                    throw new FailureException(sprintf('the return value "%s" is not more than "%s"', $subject, $expected));
                }

                return true;
            },
        ];
    }
}
