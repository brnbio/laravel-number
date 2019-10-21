<?php

/**
 * helpers.php
 *
 * @copyright   Copyright (c) brnbio (http://brnb.io)
 * @author      Frank Heider <heider@brnb.io>
 * @since       2019-03-20
 */

declare(strict_types=1);

if (! function_exists('number')) {
    /**
     * @return \Brnbio\LaravelNumber\Helper\Helper
     */
    function number(): \Brnbio\LaravelNumber\Helper\Helper
    {
        return \Brnbio\LaravelNumber\Helper\Helper::getInstance();
    }
}
