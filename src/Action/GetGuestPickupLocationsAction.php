<?php
declare (strict_types = 1);
namespace Minds\Action;

use Minds\Model\GuestPickupLocationsModelInterface;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};

/**
 * @property GuestPickupLocationsModelInterface $model
 * @package Minds\Action
 */
class GetGuestPickupLocationsAction extends AbstractAction
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ) : ResponseInterface {
        $result = $this->model->getTotalGuestPickupLocations();
        return $response->withJson($result);
    }
}
