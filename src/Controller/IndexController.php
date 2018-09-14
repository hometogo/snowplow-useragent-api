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
    public function index(Request $request): JsonResponse
    {
        try {
            $this->getRequestValidator()->validate($request);
            $response = $this->getResponseManager()->success($request);
            $httpStatus = Response::HTTP_OK;
        } catch (\InvalidArgumentException $exception) {
            $response = $this->getResponseManager()->error($exception);
            $httpStatus = Response::HTTP_BAD_REQUEST;
        }

        return new JsonResponse($response, $httpStatus);
    }

    private function getRequestValidator(): RequestValidator
    {
        return $this->container->get(RequestValidator::class);
    }

    private function getResponseManager(): ResponseManager
    {
        return $this->container->get(ResponseManager::class);
    }
}
