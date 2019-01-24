<?php

namespace Tests\Runroom\CookiesBundle\Integration;

use Runroom\CookiesBundle\Entity\CookiesPage;
use Runroom\CookiesBundle\Repository\CookiesPageRepository;
use Tests\Runroom\BaseBundle\Integration\DoctrineIntegrationTestBase;

class CookiesPageRepositoryTest extends DoctrineIntegrationTestBase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = new CookiesPageRepository(static::$entityManager);
    }

    /**
     * @test
     */
    public function itFindsCookiesPage()
    {
        $cookies = $this->repository->find();

        $this->assertInstanceOf(CookiesPage::class, $cookies);
    }

    protected function getDataSetFile()
    {
        return __DIR__ . '/seeds/cookies-page-seeds.xml';
    }
}
