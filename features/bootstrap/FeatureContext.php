<?php

use Behat\Behat\Context\Context;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\PriceList;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\StandardPrice;
use PHPUnit\Framework\TestCase as AcceptanceFeatureContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends AcceptanceFeatureContext implements Context
{
    /**
     * @var unknown
     */
    private $accommodationBooking;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->accommodationBooking = $this->getMockBuilder(AccommodationBooking::class)
            ->setMethods(['calculatePrice'])
            ->getMock();

        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn(StandardPrice::VALUE);
    }

    /**
     * @Given I have a :bookingServiceClass booking Service
     */
    public function iHaveABookingService($bookingServiceClass)
    {
        return (bool) ($this->accommodationBooking instanceof $bookingServiceClass);
    }

    /**
     * @Given I check the Booking Service price
     */
    public function iCheckTheBookingServicePrice()
    {
        return empty($this->accommodationBooking->calculatePrice());
    }

    /**
     * @Then the Booking Price should equal :expectedPrice
     */
    public function theBookingPriceShouldEqual($expectedPrice)
    {
        self::assertEquals($expectedPrice, $this->accommodationBooking->calculatePrice());
    }

    /**
     * @Given I add Wifi Hotspot as an extra to my booking
     */
    public function iAddWifiHotspotAsAnExtraToMyBooking()
    {
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods(['__construct', 'calculatePrice'])
            ->setConstructorArgs([$this->accommodationBooking])
            ->disableOriginalConstructor()
            ->getMock();

        $accommodationWithWifiHotspot->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($this->accommodationBooking->calculatePrice() + PriceList::WIFI_HOTSPOT);

        $this->accommodationBooking = $accommodationWithWifiHotspot;
    }

    /**
     * @Given I add Wifi Hotspot and a Bed as an extra to my booking
     */
    public function iAddWifiHotspotAndABedAsAnExtraToMyBooking()
    {
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods(['__construct', 'calculatePrice'])
            ->setConstructorArgs([$this->accommodationBooking])
            ->disableOriginalConstructor()
            ->getMock();

        $accommodationWithWifiHotspot->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($this->accommodationBooking->calculatePrice() + PriceList::WIFI_HOTSPOT);

        $accommodationWithExtraBed = $this->getMockBuilder(AdditionalBed::class)
            ->setMethods(['__construct', 'calculatePrice'])
            ->setConstructorArgs([$accommodationWithWifiHotspot])
            ->disableOriginalConstructor()
            ->getMock();

        $accommodationWithExtraBed->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($accommodationWithWifiHotspot->calculatePrice() + PriceList::EXTRA_BED);

        $this->accommodationBooking = $accommodationWithExtraBed;
    }

    /**
     * @Given I add an extra Bed as an extra to my booking
     */
    public function iAddAnExtraBedAsAnExtraToMyBooking()
    {
        $accommodationWithAdditionalBed = $this->getMockBuilder(AdditionalBed::class)
        ->setMethods(['__construct', 'calculatePrice'])
        ->setConstructorArgs([$this->accommodationBooking])
        ->disableOriginalConstructor()
        ->getMock();

        $accommodationWithAdditionalBed->expects($this->atLeastOnce())
        ->method('calculatePrice')
        ->willReturn($this->accommodationBooking->calculatePrice() + PriceList::EXTRA_BED);

        $this->accommodationBooking = $accommodationWithAdditionalBed;
    }
}
