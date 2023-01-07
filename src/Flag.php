<?php

namespace Cos\LaravelFlag\Schema;

use Illuminate\Database\Eloquent\Builder;
use Termwind\Components\Dd;

trait Flag
{
    
    public function scopeAddFlag($query, $key, $value)
    {
        $array = $this->getFlags($query);
        $array[$key] = $value;
        return $this->setFlag($query, $array);
    }

    public function scopeAddFlagPersist($query, $key, $value)
    {
        $array = (array) $this->getFlags($query);
        $array[$key] = $value;
        $this->setFlag($query, $array);
        return $query->getModel()->save();
    }

    public function scopeRemoveFlag($query, $key)
    {
        $array = $this->getFlags($query);
        unset($array[$key]);
        return $this->setFlag($query, $array);
    }

    public function scopeRemoveFlagPersist($query, $key)
    {
        $array = $this->getFlags($query);
        unset($array[$key]);
        $this->setFlag($query, $array);
        return $query->getModel()->save();
    }

    public function scopeHasFlag($query, $key)
    {
        $array = $this->getFlags($query);
        return isset($array[$key]);
    }

    public function scopeClearFlags($query)
    {
        $query->getModel()->setAttribute('flag', '{}');
    }

    public function setFlag($query, $array)
    {
        $query->getModel()->setAttribute('flag', json_encode($array));
    }

    public function getFlags($query)
    {
        $attributes = $query->getModel()->getAttributes();
        return json_decode($attributes['flag'], true);
    }
}
