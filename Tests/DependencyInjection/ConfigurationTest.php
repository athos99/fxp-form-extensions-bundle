<?php

/*
 * This file is part of the Sonatra package.
 *
 * (c) François Pluchino <francois.pluchino@sonatra.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonatra\Bundle\FormExtensionsBundle\Tests\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Sonatra\Bundle\FormExtensionsBundle\DependencyInjection\Configuration;

/**
 * Tests case for Configuration.
 *
 * @author François Pluchino <francois.pluchino@sonatra.com>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    public function testDefaultConfig()
    {
        $processor = new Processor();
        $config = $processor->processConfiguration(new Configuration(), array(array()));

        $this->assertEquals(
                array_merge(array(), self::getBundleDefaultConfig()),
                $config
        );
    }

    protected static function getBundleDefaultConfig()
    {
        return array(
            'select2'         => array(
                'enabled' => true,
            ),
            'datetime_picker' => array(
                'enabled' => true,
            ),
            'currency'        => array(
                'enabled' => true,
            ),
        );
    }
}
