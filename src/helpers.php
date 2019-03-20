<?php

/**
 * helpers.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-20
 */

declare(strict_types=1);

use Brnbio\LaravelNumber\Helper\Helper as NumberHelper;

if (! function_exists('number')) {
    /**
     * @return NumberHelper
     */
    function number(): NumberHelper
    {
        return NumberHelper::getInstance();
    }
}
