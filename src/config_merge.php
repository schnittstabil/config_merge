<?php

namespace Schnittstabil\ConfigMerge;

if (!function_exists('Schnittstabil\ConfigMerge\config_merge')) {
    /**
     * Merge two config arrays.
     *
     * @param array $target Target config array
     * @param array $source Source config array
     *
     * @return array The merged config
     */
    function config_merge(array $target, array $source)
    {
        if (!\Schnittstabil\ArraySome\array_some_key($target, 'is_string')) {
            return $source;
        }

        foreach ($source as $key => $value) {
            if (isset($target[$key]) || array_key_exists($key, $target)) {
                if (is_array($value) && is_array($target[$key])) {
                    $target[$key] = config_merge($target[$key], $value);
                    continue;
                }
            }

            $target[$key] = $value;
        }

        return $target;
    }
}
