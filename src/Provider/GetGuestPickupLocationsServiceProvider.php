<?php
declare(strict_types=1);

namespace Minds\Provider;

use Minds\Action\GetGuestPickupLocationsAction;
use Minds\Model\GuestPickupLocationsModel;
use Minds\Repository\GuestsRepository;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * @package Minds\Provider
 */
class GetGuestPickupLocationsServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple): void
    {
        $pimple[GetGuestPickupLocationsAction::class] = function ($pimple) {
            return new GetGuestPickupLocationsAction(
                new GuestPickupLocationsModel(new GuestsRepository($pimple['guests']))
            );
        };
    }
}
