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

use Sonatra\Bundle\FormExtensionsBundle\Form\ChoiceList\Formatter\Select2AjaxChoiceListFormatter;
use Symfony\Component\Form\Extension\Core\View\ChoiceView;

/**
 * Tests case for locale of select2 form extension type.
 *
 * @author François Pluchino <francois.pluchino@sonatra.com>
 */
class LocaleSelect2TypeExtensionTest extends AbstractSelect2TypeExtensionTest
{
    protected function getExtensionTypeName()
    {
        return 'locale';
    }

    protected function getSingleData()
    {
        return 'fr_FR';
    }

    protected function getValidSingleValue()
    {
        return 'fr_FR';
    }

    protected function getValidAjaxSingleValue()
    {
        return 'fr_FR';
    }

    protected function getMultipleData()
    {
        return array('fr_FR', 'en_US');
    }

    protected function getValidMultipleValue()
    {
        return array('fr_FR', 'en_US');
    }

    protected function getValidAjaxMultipleValue()
    {
        return implode(',', $this->getValidMultipleValue());
    }

    protected function getValidFirstChoiceSelected()
    {
        $formatter = new Select2AjaxChoiceListFormatter();
        $choice = new ChoiceView('af', 'af', 'Afrikaans');

        return $formatter->formatChoice($choice);
    }
}