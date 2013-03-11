<?php

namespace SimplePHPEasyPlus\Bundle;

use SimplePHPEasyPlus\Bundle\DependencyInjection\SimplePHPEasyPlusExtension;
use SimplePHPEasyPlus\Calcul\Calcul;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testContainerConfig()
    {
        $container = new ContainerBuilder();

        $extension = new SimplePHPEasyPlusExtension();
        $extension->load(array(), $container);

        $collectionBuilder = $container->get('simple_php_easy_plus.number_collection_builder');
        $this->assertInstanceOf('SimplePHPEasyPlus\Number\NumberCollectionBuilder', $collectionBuilder);

        $engine = $container->get('simple_php_easy_plus.engine');
        $this->assertInstanceOf('SimplePHPEasyPlus\Engine', $engine);

        $runner = $container->get('simple_php_easy_plus.runner');
        $this->assertInstanceOf('SimplePHPEasyPlus\Calcul\CalculRunner', $runner);

        $collectionBuilder->add('1');
        $collectionBuilder->add('2');

        $calcul = new Calcul($engine, $collectionBuilder->resolve());
        $runner->run($calcul);

        $this->assertEquals(3, $calcul->getResult()->getValue());
    }

    /** @test */
    public function numberCollectionBuilderShouldHavePrototypeScope()
    {
        $container = new ContainerBuilder();

        $extension = new SimplePHPEasyPlusExtension();
        $extension->load(array(), $container);

        $builder1 = $container->get('simple_php_easy_plus.number_collection_builder');
        $builder2 = $container->get('simple_php_easy_plus.number_collection_builder');

        $this->assertNotSame($builder2, $builder1);
    }
}
