<?php

namespace GajdaW\ExampleMenuBundle\DataFixtures;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Szkolenie\MiastaBundle\Entity\Miasto;
use GajdaW\ExampleMenuBundle\Entity\Menu;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $xml = simplexml_load_file(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data/menu.xml');
        foreach ($xml->option as $m) {
            $menu = new Menu();
            $menu->setTitle($m->title);
            $menu->setContents($m->contents);
            $manager->persist($menu);
        }
        $manager->flush();

    }
}
