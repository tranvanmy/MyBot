<?php

namespace App\Services;

class ServiceEntry
{
    /**
     * Entry point
     */
    public static function service($type, $name)
    {
        return self::getService($type, $name);
    }

    /**
     * Get response service base on option or default
     *
     * @param string type
     * @param string name
     *
     * @return class
     */
    public static function getService($type, $name)
    {
        switch ($type) {
            case 'emo':
                $namespace = '\App\\Services\\Types\\Emo\\';
                break;
            default:
                $namespace = '\App\\Services\\Types\\Emo\\';
                break;
        }

        $className = ucfirst(strtolower($name));
        $serviceClass = $namespace . $className . 'Service';
        if (class_exists($serviceClass)) {
            return new $serviceClass;
        }
        return new \App\Services\Types\Emo\DefaultService;
    }
}
