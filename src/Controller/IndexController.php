<?php

namespace App\Controller;

use App\Service\RequestValidator;
use App\Service\Response\Manager as ResponseManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    private const ZERO_TTL = 0;

    public function index(Request $request): JsonResponse
    {
        try {
            $this->getRequestValidator()->validate($request);
            $responseModel = $this->getResponseManager()->success($request);
            $httpStatus = Response::HTTP_OK;
        } catch (\InvalidArgumentException $exception) {
            $responseModel = $this->getResponseManager()->error($exception);
            $httpStatus = Response::HTTP_BAD_REQUEST;
        }

        $httpResponse = new JsonResponse($responseModel, $httpStatus);
        $httpResponse->setSharedMaxAge($this->getCacheTTL());

        return $httpResponse;
    }

    private function getRequestValidator(): RequestValidator
    {
        return $this->container->get(RequestValidator::class);
    }

    private function getResponseManager(): ResponseManager
    {
        return $this->container->get(ResponseManager::class);
    }

    private function getCacheTTL(): int
    {
        try {
            $ttl = $this->getParameter('response_cache_ttl');
        } catch (\InvalidArgumentException $ignore) {
            // parameter does not exists
            $ttl = self::ZERO_TTL;
        }

        return $ttl;
    }
}
