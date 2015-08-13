<?php

/*
 * This file is part of the Sonatra package.
 *
 * (c) François Pluchino <francois.pluchino@sonatra.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonatra\Bundle\FormExtensionsBundle\Tests\Form\Extension;

use Sonatra\Bundle\FormExtensionsBundle\Form\Extension\DateJqueryTypeExtension;
use Sonatra\Bundle\FormExtensionsBundle\Form\Extension\DateTimeJqueryTypeExtension;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests case for date jquery form extension type.
 *
 * @author François Pluchino <francois.pluchino@sonatra.com>
 */
class DateJqueryTypeExtensionTest extends TypeTestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->factory = Forms::createFormFactoryBuilder()
            ->addExtensions($this->getExtensions())
            ->addTypeExtension(
                new DateTimeJqueryTypeExtension()
            )
            ->addTypeExtension(
                new DateJqueryTypeExtension()
            )
            ->getFormFactory();

        $this->dispatcher = $this->getMock('Symfony\Component\EventDispatcher\EventDispatcherInterface');
        $this->builder = new FormBuilder(null, null, $this->dispatcher, $this->factory);
    }

    public function testDefaultOption()
    {
        $form = $this->factory->create('date', null, array('locale' => 'en'));
        $config = $form->getConfig();

        $this->assertEquals('single_text', $config->getOption('widget'));
        $this->assertTrue($config->getOption('date_picker'));
        $this->assertFalse($config->getOption('time_picker'));
        $this->assertEquals('en', $config->getOption('locale'));
        $this->assertEquals('M/d/yyyy', $config->getOption('format'));
    }

    public function testFormatFr()
    {
        $form = $this->factory->create('date', null, array('locale' => 'fr_FR'));

        $this->assertEquals('dd/MM/yyyy', $form->getConfig()->getOption('format'));
    }

    public function testDefaultAttributes()
    {
        $form = $this->factory->create('date', null, array('locale' => 'en'));
        $view = $form->createView();
        $validAttr = array(
            'data-locale' => 'en',
            'data-date-picker' => 'true',
            'data-time-picker' => 'false',
            'data-time-picker-first' => 'false',
            'data-open-focus' => 'true',
            'data-format' => 'M/D/YYYY',
            'data-with-minutes' => 'true',
            'data-with-seconds' => 'false',
            'data-datetime-picker' => 'true',
            'data-button-id' => 'date_datetime_btn',
        );

        $this->assertEquals($validAttr, $view->vars['attr']);
    }
}
