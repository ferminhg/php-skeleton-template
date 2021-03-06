<?php

declare(strict_types=1);

namespace Devaway\Apps\Backoffice\Backend\Controller\Metrics;

use Devaway\Shared\Infrastructure\Monitoring\PrometheusMonitor;
use Prometheus\RenderTextFormat;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class MetricsController
{
    public function __construct(PrometheusMonitor $monitor)
    {
        $this->monitor = $monitor;
    }

    public function __invoke(Request $request): Response
    {
        $renderer = new RenderTextFormat();
        $result   = $renderer->render($this->monitor->registry()->getMetricFamilySamples());
        return new Response($result, 200, ['Content-Type' => RenderTextFormat::MIME_TYPE]);
    }
}
