<?php

/**
 * Helper.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-20
 */

declare(strict_types=1);

namespace Brnbio\LaravelNumber\Helper;

use Brnbio\LaravelNumber\Number\Currency;

/**
 * Class Helper
 * @package Brnbio\LaravelNumber\Helper
 */
class Helper
{
    /**
     * @var Helper
     */
    protected static $instance;

    /**
     * @return Helper
     */
    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param float $value
     * @param string|null $currency
     * @return string
     */
    public function currency(float $value, ?string $currency = null): string
    {
        if ($currency === null) {
            $currency = config('laravel-number.currency', 'EUR');
        }
        $currency = new Currency($currency);

        return $this->render(
            $currency->getTemplate(),
            [
                'prefix' => $value < 0 ? '-' : '',
                'symbol' => $currency->getSymbol(),
                'value' => $this->format(abs($value), $currency->getDecimals(), $currency->getDecimalPoint(), $currency->getThousandsPoint()),
            ]
        );
    }

    /**
     * @param float $value
     * @param int $decimals
     * @param string $decimalPoint
     * @param string $thousandsPoint
     * @return string
     */
    public function format(float $value, int $decimals = 2, string $decimalPoint = '.', string $thousandsPoint = ','): string
    {
        return number_format($value, $decimals, $decimalPoint, $thousandsPoint);
    }

    /**
     * @param string $template
     * @param array $placeholders
     * @return string
     */
    private function render(string $template, array $placeholders = []): string
    {
        foreach ($placeholders as $key => $value) {
            $template = str_replace('{{' . $key . '}}', '' . $value, $template);
        }
        $template = preg_replace('#\{\{([\w\._]+)\}\}#', '', $template);

        return $template;
    }
}
