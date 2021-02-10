<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('getKey', [$this, 'getKeyFunc']),
            new TwigFilter('cast_to_array', array($this, 'objectFilter')),
        ];
    }

    public function getKeyFunc($json)
    {
        $keys = array_keys(json_decode($json, true));
        return $keys;
    }

    public function objectFilter($stdClassObject) {
        // Just typecast it to an array
        //$response = (array)$stdClassObject;
        $response = json_decode(json_encode($stdClassObject),true);
        //$response = json_decode($stdClassObject,true);
        //$response = json_encode($stdClassObject, JSON_FORCE_OBJECT);
    
        return $response;
    }
}