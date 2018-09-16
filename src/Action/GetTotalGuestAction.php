<?php
declare (strict_types = 1);
namespace Minds\Action;

use Minds\Model\GuestsModelInterface;
use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};

/**
 * @property GuestsModelInterface $model
 * @package Minds\Action
 */
class GetTotalGuestAction extends AbstractAction
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
        $result = $this->model->getTotalGuests();
        return $response->withJson($result);
    }
}
