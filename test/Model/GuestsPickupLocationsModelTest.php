<?php
declare(strict_types=1);

namespace Minds\Test\Model;

use Minds\Model\GuestPickupLocationsModel;
use Minds\Repository\GuestsRepository;
use PHPUnit\Framework\TestCase;

/**
 * @package Minds\Test\Model
 */
class GuestsPickupLocationsModelTest extends TestCase
{
    /** @var GuestPickupLocationsModel */
    private $guestPickupLocationsModel;

    protected function setUp()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../data/guests.json'), true);
        $this->guestPickupLocationsModel = new GuestPickupLocationsModel(new GuestsRepository($data));

        parent::setUp();
    }

    public function testGetTotalGuestsSucceeds(): void
    {
        $expected = [
            'Penny Lane' => 4,
            'Octopus\'s Garden' => 3,
            'Abbey Road' => 2,
            'India' => 2,
            'Strawberry fields' => 2,
            'Buckingham Palace' => 1,
            'USSR' => 1,
            'Lime Street' => 1
        ];
        $actual = $this->guestPickupLocationsModel->getTotalGuestPickupLocations();
        $this->assertEquals($expected, $actual);
    }
}
