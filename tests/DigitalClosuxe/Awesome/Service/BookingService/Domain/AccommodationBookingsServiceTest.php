<?php

use PHPUnit\Framework\TestCase;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line\AdditionalBed;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Pricing\StandardPrice;
use DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line\HotspotWifi;
use DigitalClosuxe\Awesome\Service\BookingService\Type\AccommodationBooking;

/**
 * @covers AccommodationBooking::
 * @author luyandasiko
 *
 */
class AccommodationBookingsServiceTest extends TestCase
{
    private $accommodationBooking;
    
    private const DESCRIPTION = 'Time[as in Afterglow], Sarah McLachlan (2003)';
    
    public function setUp(): void
    {
        $this->accommodationBooking = $this->getMockBuilder(AccommodationBooking::class)
            ->getMock();
    }
    
    /**
     * @covers AccommodationBooking::calculatePrice
     */
    public function test_can_calculate_price_for_basic_accommodation_booking()
    {
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn(40);
        
        $this->assertSame(StandardPrice::VALUE, $this->accommodationBooking->calculatePrice());
    }
    
    /**
     * @covers AccommodationBooking::getDescription
     */
    public function test_basic_accommodation_has_correct_description()
    {
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('getDescription')
            ->willReturn(self::DESCRIPTION);
        
        $this->assertSame(self::DESCRIPTION, $this->accommodationBooking->getDescription());
    }
    
    /**
     * @covers AccommodationBooking::calculatePrice
     */
    public function test_can_calculate_price_for_basic_accommodation_booking_with_wifi()
    {
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn(40);
        
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods([ '__construct', 'calculatePrice' ])
            ->setConstructorArgs([ $this->accommodationBooking ])
            ->disableOriginalConstructor()
            ->getMock();
        
        $accommodationWithWifiHotspot->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($this->accommodationBooking->calculatePrice() + 2);
        
        $this->assertSame(42, $accommodationWithWifiHotspot->calculatePrice());
    }
    
    /**
     * @covers AccommodationBooking::getDescription
     */
    public function test_basic_accommodation_with_wifi_has_correct_description()
    {
        $testDescriptionWithWifi = 'Ikeja wifi';
        
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('getDescription')
            ->willReturn($testDescriptionWithWifi);
        
        $expectedBookingDescription = $this->accommodationBooking->getDescription() . ' ' . $testDescriptionWithWifi;
        
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods([ '__construct', 'getDescription' ])
            ->setConstructorArgs([ $this->accommodationBooking ])
            ->disableOriginalConstructor()
            ->getMock();
        
        $accommodationWithWifiHotspot->expects($this->atLeastOnce())
            ->method('getDescription')
            ->willReturn($expectedBookingDescription);
        
        $this->assertSame($expectedBookingDescription, $accommodationWithWifiHotspot->getDescription());
    }
    
    /**
     * @covers AccommodationBooking::calculatePrice
     */
    public function test_can_calculate_price_for_basic_accommodation_booking_with_wifi_and_an_extra_bed()
    {
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn(40);
        
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods([ '__construct', 'calculatePrice' ])
            ->setConstructorArgs([ $this->accommodationBooking ])
            ->disableOriginalConstructor()
            ->getMock();
        
        $accommodationWithWifiHotspot->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($this->accommodationBooking->calculatePrice() + 2);
        
        $accommodationWithAdditionalBed = $this->getMockBuilder(AdditionalBed::class)
            ->setMethods([ '__construct', 'calculatePrice' ])
            ->setConstructorArgs([ $accommodationWithWifiHotspot ])
            ->disableOriginalConstructor()
            ->getMock();
        
        $accommodationWithAdditionalBed->expects($this->atLeastOnce())
            ->method('calculatePrice')
            ->willReturn($accommodationWithWifiHotspot->calculatePrice() + 30);
        
        $this->assertSame(72, $accommodationWithAdditionalBed->calculatePrice());
        
    }
    
    /**
     * @covers AccommodationBooking::getDescription
     */
    public function test_basic_accommodation_with_wifi_and_an_extra_bed_has_correct_description()
    {
        
        $testDescriptionWithWifi = 'Ikeja wifi';
        
        $this->accommodationBooking->expects($this->atLeastOnce())
            ->method('getDescription')
            ->willReturn($testDescriptionWithWifi);
        
        $expectedBookingDescriptionWithWifi = $this->accommodationBooking->getDescription() . ' ' . $testDescriptionWithWifi;
        
        $accommodationWithWifiHotspot = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods([ '__construct', 'getDescription' ])
            ->setConstructorArgs([ $this->accommodationBooking ])
            ->disableOriginalConstructor()
            ->getMock();
        
            $expectedBookingDescriptionWithAdditionalBed = $accommodationWithWifiHotspot->getDescription() . ' and extra Bed';
            
            $accommodationWithAdditionalBed = $this->getMockBuilder(HotspotWifi::class)
            ->setMethods([ '__construct', 'getDescription' ])
            ->setConstructorArgs([ $accommodationWithWifiHotspot ])
            ->disableOriginalConstructor()
            ->getMock();
            
            $accommodationWithAdditionalBed->expects($this->atLeastOnce())
                ->method('getDescription')
                ->willReturn($expectedBookingDescriptionWithAdditionalBed);
            
                $this->assertSame($expectedBookingDescriptionWithAdditionalBed, $accommodationWithAdditionalBed->getDescription());
    }
}