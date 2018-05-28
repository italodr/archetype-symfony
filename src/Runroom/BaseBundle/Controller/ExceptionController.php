<?php

namespace Runroom\BaseBundle\Controller;

use Doctrine\ORM\NoResultException;
use Runroom\BaseBundle\Service\PageRendererService;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;

class ExceptionController
{
    protected $renderer;

    public function __construct(PageRendererService $renderer)
    {
        $this->renderer = $renderer;
    }

    public function notFound(?FlattenException $exception): Response
    {
        return $this->renderer->renderResponse(
            'pages/404.html.twig',
            null,
            new Response('', $this->getStatusCode($exception))
        );
    }

    private function getStatusCode(?FlattenException $exception): int
    {
        if (\is_null($exception) || $exception->getClass() === NoResultException::class) {
            return 404;
        }

        return $exception->getStatusCode();
    }
}
