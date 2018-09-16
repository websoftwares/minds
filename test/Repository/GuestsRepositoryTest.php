<?php
declare(strict_types=1);
namespace Minds\Test\Repository;

use Minds\Repository\GuestsRepository;
use PHPUnit\Framework\TestCase;

class GuestsRepositoryTest extends TestCase
{
    /** @var GuestsRepository */
    private $guestsRepository;

    protected function setUp()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/../../data/guests.json'), true);
        $this->guestsRepository =  new GuestsRepository($data);
        parent::setUp();
    }

    public function testAllSucceeds()
    {
        $actual = $this->guestsRepository->all();
        $this->assertCount(16, $actual);
    }
}
