<?php

namespace Tests\Runroom\BaseBundle\Unit;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Runroom\BaseBundle\Controller\ExceptionController;

class ExceptionControllerTest extends TestCase
{
    const NOT_FOUND = 'pages/404.html.twig';

    public function setUp()
    {
        $this->renderer = $this->prophesize('Symfony\Bundle\FrameworkBundle\Templating\EngineInterface');

        $this->controller = new ExceptionController($this->renderer->reveal());
    }

    /**
     * @test
     */
    public function itRenders404()
    {
        $this->renderer->renderResponse(
            self::NOT_FOUND,
            Argument::type('array'),
            Argument::type('Symfony\Component\HttpFoundation\Response')
        )->willReturn('response');

        $response = $this->controller->notFound();

        $this->assertSame('response', $response);
    }
}