<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigController extends Controller
{
    private const API_ENRICHMENT_FILENAME = 'api_enrichment.json.dist';

    private const USER_AGENT_FILENAME = 'user_agent.json.dist';

    public function index(Request $request): Response
    {
        $content = $this->getApiEnrichmentData();
        $content = \str_replace('%hostname%', $request->headers->get('host'), $content);

        return new Response($content);
    }

    public function userAgent(): Response
    {
        $response = new Response($this->getUserAgentSchema());
        $response->setSharedMaxAge($this->getParameter('jsonschemas.cache.ttl'));

        return $response;
    }

    private function getApiEnrichmentData(): string
    {
        return \file_get_contents($this->getSchemaPath() . DIRECTORY_SEPARATOR . self::API_ENRICHMENT_FILENAME);
    }

    private function getUserAgentSchema(): string
    {
        return \file_get_contents($this->getSchemaPath() . DIRECTORY_SEPARATOR . self::USER_AGENT_FILENAME);
    }

    private function getSchemaPath(): string
    {
        return $this->getParameter('kernel.project_dir') . $this->getParameter('jsonschemas.path');
    }
}
