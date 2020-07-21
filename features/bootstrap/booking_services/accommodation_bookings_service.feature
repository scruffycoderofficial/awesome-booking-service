Feature: Standard Price Accommodation booking

As a Software Engineer
I want to ensure that the Booking Service calculates prices
So that I can verify the correctness of my solution

	Scenario: Calculate Standard Price booking
		Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service
		And I check the Booking Service price
		Then the Booking Price should equal "40"
	
	Scenario: Calculate Standard Price booking with Hotspot Wifi
		Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service
		And I add Wifi Hotspot as an extra to my booking
		Then the Booking Price should equal "42"
		
	Scenario: Calculate Standard Price booking with extra Bed
		Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service
		And I add an extra Bed as an extra to my booking
		Then the Booking Price should equal "70"
	
	Scenario: Calculate Standard Price booking with Hotspot Wifi and extra Bed
		Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service
		And I add Wifi Hotspot and a Bed as an extra to my booking
		Then the Booking Price should equal "72"