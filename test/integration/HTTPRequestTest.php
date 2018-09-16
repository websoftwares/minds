<?php
declare (strict_types=1);

namespace Minds\Test\Integration;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HTTPRequestTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        $this->client = new Client;
        parent::setUp();
    }

    /**
     * @dataProvider requestProvider
     *
     * @param Request $request
     * @param string $expected
     * @return void
     */
    public function testEndpointSucceeds(Request $request, string $expected): void
    {
        $actual = $this->client->send($request);
        $this->assertEquals($expected, (string)$actual->getBody());
    }

    /**
     * @return array
     */
    public function requestProvider(): array
    {
        return [
            [
                new Request('GET', 'http://app:8000/beatles/tour/guests'),
                json_encode([
                    'Ringo' => 5,
                    'John' => 4,
                    'Paul' => 4,
                    'George' => 3
                ])
            ],
            [
                new Request('GET', 'http://app:8000/beatles/tour/guests/leader-board'),
                json_encode([
                    'Magical Mystery Tour' => 5,
                    'Revolver' => 4,
                    'Abbey Road' => 2,
                    'Sgt. Pepper' => 2,
                    'White Album' => 2,
                    'Let it be' => 1
                ])
            ],
            [
                new Request('GET', 'http://app:8000/beatles/tour/guests/pickup'),
                json_encode([
                    'Penny Lane' => 4,
                    'Octopus\'s Garden' => 3,
                    'Abbey Road' => 2,
                    'India' => 2,
                    'Strawberry fields' => 2,
                    'Buckingham Palace' => 1,
                    'USSR' => 1,
                    'Lime Street' => 1
                ])
            ],
        ];
    }
}
