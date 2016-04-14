<?php

namespace Schnittstabil\ConfigMerge;

if (!function_exists('Schnittstabil\ConfigMerge\config_merge')) {
    /**
     * Merge two configs.
     *
     * @param mixed $target       Target config
     * @param mixed $source       Source config
     * @param bool  $appendArrays if true use `array_merge`
     *
     * @return mixed The merged config
     */
    function config_merge($target, $source, $appendArrays = false)
    {
        if (is_array($target) && is_array($source)) {
            return $appendArrays ? array_merge($target, $source) : $source;
        }

        if (!is_object($target) || !is_object($source)) {
            return $source;
        }

        $target = clone $target;

        foreach (get_object_vars($source) as $key => $value) {
            if (property_exists($target, $key)) {
                $target->$key = config_merge($target->$key, $value);
                continue;
            }

            $target->$key = $value;
        }

        return $target;
    }
}
