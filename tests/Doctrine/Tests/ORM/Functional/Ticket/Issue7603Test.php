<?php

namespace Doctrine\Tests\ORM\Functional\Ticket;


use Doctrine\Tests\Models\Cache\City;
use Doctrine\Tests\ORM\Functional\SecondLevelCacheAbstractTest;

class Issue7063Test extends SecondLevelCacheAbstractTest
{


    public function testUpdateInverseSideFromOwningSide ()
    {
        $this->loadFixturesStates();

        $state = $this->states[0];

        $city = new City("TEST");
        $city->setState($state);


        $this->em->persist($city);
        $this->em->flush();


        static::assertCount(1, $state->getCities()->toArray());
    }
}
