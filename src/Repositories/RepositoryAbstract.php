<?php

namespace Yajra\Address\Repositories;

abstract class RepositoryAbstract
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Handle dynamic static method calls into the method.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        $instance = new static;
        $class    = get_class($instance->getModel());
        $model    = new $class;

        return call_user_func_array([$model, $method], $parameters);
    }

    /**
     * Get repository model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function getModel();

    /**
     * Handle dynamic method calls into the model.
     *
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->getModel(), $method], $parameters);
    }
}
