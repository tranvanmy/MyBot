<?php

namespace App\Services;

class ServiceEntry
{
    /**
     * Entry point
     */
    public static function service($name)
    {
        return self::getService($name);
    }

    /**
     * Get response service base on option or default
     *
     * @param string type
     * @param string name
     *
     * @return class
     */
    public static function getService($name)
    {
        $namespace = '\App\\Services\\Types\\';
        $className = ucfirst(strtolower($name));
        $serviceClass = $namespace . $className . 'Service';
        if (class_exists($serviceClass)) {
            return new $serviceClass;
        }
        return new \App\Services\Types\DefaultService;
    }
}
