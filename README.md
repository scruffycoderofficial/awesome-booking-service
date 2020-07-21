# Awesome Booking Service
> An implementation of Decorator Design Pattern as described by the Gang of Four(GoF). 

The **Awesome Booking Service** is a package that is designed based on the 
**Decorator Pattern**, as descrined by DesignPatternsPHP. 

This piece of work demonstrates the use of **Behaviour-Driven Design** 
and **Test-Driven Development** by using *tested* and *tried* testing 
frameworks and/or tools.

## Installation

``` bash
composer require scruffycoderofficial/awesome-booking-service
```

## Running Test Case(s)

The first set of tests I wrote were through `PHPSpec` to promote **Behaviour-Driven Design**. 
I have, then, went on to verify my work by *implementing* **Unit Tests** at the lower level 
of my code-base. This was *followed* by written **Acceptance Tests** through **Behat Framework**

### PHPSpec

``` bash
vendor/bin/phpspec run
```

When we execute the command shown above below are the results we expect to see.

``` bash
luyandasiko in awesome-booking-service -> develop
$ vendor/bin/phpspec run

      DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line\AdditionalBed

  24  ✔ is initializable (54ms)
  29  ✔ is a booking service
  34  ✔ has an accumulated price
  39  ✔ has extra bed description

      DigitalClosuxe\Awesome\Service\BookingService\Accommodation\Line\HotspotWifi

  24  ✔ is initializable
  29  ✔ is a booking service
  34  ✔ has an accumulated price
  39  ✔ has wifi description

      DigitalClosuxe\Awesome\Service\BookingService\Type\AccommodationBooking

  11  ✔ is initializable
  16  ✔ is a booking service type
  21  ✔ has a standard price
  26  ✔ has description


3 specs
12 examples (12 passed)
60ms

```

### PHPUnit

``` bash
luyandasiko in awesome-booking-service -> develop
$ vendor/bin/phpunit
PHPUnit 9.2.6 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.4.4
Configuration: /Users/luyandasiko/awesome-works/awesome-booking-service/phpunit.xml

.......                                                             7 / 7 (100%)

Time: 00:00.032, Memory: 6.00 MB

OK (7 tests, 20 assertions)
```

### Behat

``` bash
luyandasiko in awesome-booking-service -> develop
$ vendor/bin/behat
Feature: Standard Price Accommodation booking
  
  As a Software Engineer
  I want to ensure that the Booking Service calculates prices
  So that I can verify the correctness of my solution

  Scenario: Calculate Standard Price booking                                                      # features/bootstrap/booking_services/accommodation_bookings_service.feature:7
    Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service # FeatureContext::iHaveABookingService()
    And I check the Booking Service price                                                         # FeatureContext::iCheckTheBookingServicePrice()
    Then the Booking Price should equal "40"                                                      # FeatureContext::theBookingPriceShouldEqual()

  Scenario: Calculate Standard Price booking with Hotspot Wifi                                    # features/bootstrap/booking_services/accommodation_bookings_service.feature:12
    Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service # FeatureContext::iHaveABookingService()
    And I add Wifi Hotspot as an extra to my booking                                              # FeatureContext::iAddWifiHotspotAsAnExtraToMyBooking()
    Then the Booking Price should equal "42"                                                      # FeatureContext::theBookingPriceShouldEqual()

  Scenario: Calculate Standard Price booking with extra Bed                                       # features/bootstrap/booking_services/accommodation_bookings_service.feature:17
    Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service # FeatureContext::iHaveABookingService()
    And I add an extra Bed as an extra to my booking                                              # FeatureContext::iAddAnExtraBedAsAnExtraToMyBooking()
    Then the Booking Price should equal "70"                                                      # FeatureContext::theBookingPriceShouldEqual()

  Scenario: Calculate Standard Price booking with Hotspot Wifi and extra Bed                      # features/bootstrap/booking_services/accommodation_bookings_service.feature:22
    Given I have a "DigitalClosuxe\Awesome\Service\BookingService\BookingService" booking Service # FeatureContext::iHaveABookingService()
    And I add Wifi Hotspot and a Bed as an extra to my booking                                    # FeatureContext::iAddWifiHotspotAndABedAsAnExtraToMyBooking()
    Then the Booking Price should equal "72"                                                      # FeatureContext::theBookingPriceShouldEqual()

4 scenarios (4 passed)
12 steps (12 passed)
0m0.07s (9.88Mb)

```

## Usage example

At this particular point this solution merely demonstrates the richness in combining a 
variety of approaches to developing **Software**. 

## Development setup

At this point, we can really develop this code-base to offer so much more business 
value by following the same approach that was taken to add the basic features. 

See the **Contributing Section** for details on how to go about contributing.

!!! note "Fix your code"
    This *package* also includes an installation of `PHP-CS-Fixer` to allow for fixing the code based on accepted Coding Rules and Standards.

    For every type of artefact added within `spec`, tests`, `src`, and `features` directories 
    it is recommended that code get cleaned.

Running **PHP-CS-Fixer**:

``` bash
luyandasiko in awesome-booking-service -> feature/code_cleanup [!?]
$ vendor/bin/php-cs-fixer fix features/ --rules=@Symfony,-@PSR1,-blank_line_before_statement,strict_comparison --allow-risky=yes
```

Where *features/* is specified from within the command above, you can  simple substitute this for other directories you'd want to clean up.

## Release History

* 0.0.0
    * Work in progress

## Meta

Luyanda Siko – luyandasiko@digital-closuxe.co.za

## License

**MIT License**

Copyright (c) 2020 Luyanda Siko

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to
deal in the Software without restriction, including without limitation the
rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.

## Contributing

1. Fork it (<https://github.com/scruffycoder86/awesome-booking-service/fork>)
2. Create your feature branch (`git checkout -b feature/foo_bar`)
3. Commit your changes (`git commit -am 'Add some foo_bar'`)
4. Push to the branch (`git push origin feature/foo_bar`)
5. Create a new Pull Request

<!-- Markdown link & img dfn's -->
[wiki]: https://github.com/scruffycoder86/awesome-booking-service/wiki