<?php

namespace TheITNerd\Brasil\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\ScopeInterface;
use TheITNerd\Brasil\Api\Adapters\PostcodeClientInterface;

class Address extends AbstractHelper
{
    public const STREET_ADDRESS_CONFIG = [
        0 => [
            'label' => 'Street',
            'required' => true
        ],
        1 => [
            'label' => 'Number',
            'required' => true
        ],
        2 => [
            'label' => 'Complement',
            'required' => false
        ],
        3 => [
            'label' => 'Neighborhood',
            'required' => true
        ],
    ];

    /**
     * @param int $id
     * @return string|null
     */
    public function getFieldLabel(int $id): string|null
    {
        return self::STREET_ADDRESS_CONFIG[$id]['label']??null;
    }

    /**
     * @param int $id
     * @return string
     */
    public function getWrapperValidationClass(int $id): string
    {
        if(isset(self::STREET_ADDRESS_CONFIG[$id]['required']) && self::STREET_ADDRESS_CONFIG[$id]['required']) {
            return 'required';
        }

        return '';
    }

    /**
     * @param int $id
     * @return string
     */
    public function getFieldValidationClass(int $id): string
    {
        if(isset(self::STREET_ADDRESS_CONFIG[$id]['required']) && self::STREET_ADDRESS_CONFIG[$id]['required']) {
            return 'required-entry';
        }

        return '';
    }

}
