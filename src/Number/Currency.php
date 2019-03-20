<?php

/**
 * Helper.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-20
 */

declare(strict_types=1);

namespace Brnbio\LaravelNumber\Number;

/**
 * Class Helper
 * @package Brnbio\LaravelNumber\Number
 */
class Currency
{
    /**
     * @var string
     */
    protected $currency;

    /**
     * @var array
     */
    protected $currencies = [
        'eur' => [
            'symbol' => '€',
            'decimals' => 2,
            'decimal_point' => ',',
            'thousands_point' => '.',
            'template' => '{{prefix}} {{value}} {{symbol}}'
        ],
    ];

    /**
     * Currency constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        $this->currency = strtolower($currency);
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->currencies[$this->currency]['template'] ?? '{{symbol}}{{value}}';
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->currencies[$this->currency]['symbol'] ?? '';
    }

    /**
     * @return int
     */
    public function getDecimals(): int
    {
        return $this->currencies[$this->currency]['decimals'] ?? 2;
    }

    /**
     * @return string
     */
    public function getDecimalPoint(): string
    {
        return (string) $this->currencies[$this->currency]['decimal_point'] ?? '.';
    }

    /**
     * @return string
     */
    public function getThousandsPoint(): string
    {
        return (string) $this->currencies[$this->currency]['thousands_point'] ?? ',';
    }

}
