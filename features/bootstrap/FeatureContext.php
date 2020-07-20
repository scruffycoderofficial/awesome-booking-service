<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
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
            ->setMethods([ 'calculatePrice' ])
            ->getMock();
        
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn(40);
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
            ->willReturn($this->accommodationBooking->calculatePrice() + 2);
        
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
            ->willReturn($this->accommodationBooking->calculatePrice() + 2);
        
        
        $accommodationWithExtraBed = $this->getMockBuilder(AdditionalBed::class)
            ->setMethods(['__construct', 'calculatePrice'])
            ->setConstructorArgs([$accommodationWithWifiHotspot])
            ->disableOriginalConstructor()
            ->getMock();
        
            $accommodationWithExtraBed->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($accommodationWithWifiHotspot->calculatePrice() + 30);
        
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
        ->willReturn($this->accommodationBooking->calculatePrice() + 30);
        
        $this->accommodationBooking = $accommodationWithAdditionalBed;
    }
}
