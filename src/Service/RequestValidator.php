<?php

namespace App\Service;

use App\Model\Parameters;
use Symfony\Component\HttpFoundation\Request;

class RequestValidator
{
    /**
     * @param Request $request
     * @throws \InvalidArgumentException
     */
    public function validate(Request $request): void
    {
        $userAgent = $request->get(Parameters::USER_AGENT);
        if (empty($userAgent)) {
            throw new \InvalidArgumentException('user-agent parameter is missing');
        }
    }
}
