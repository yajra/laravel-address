<?php

namespace Yajra\Address\Repositories;

use BadMethodCallException;
use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract
{
    protected Model $model;

    /**
     * Handle dynamic static method calls into the method.
     *
     * @return mixed
     */
    public static function __callStatic(string $method, array $parameters)
    {
        $instance = new static;
        $class = $instance->getModel()::class;
        $model = new $class;

        $callback = [$model, $method];

        if (! is_callable($callback)) {
            throw new BadMethodCallException("Method [{$method}] does not exist.");
        }

        return call_user_func_array($callback, $parameters);
    }

    /**
     * Get repository model.
     */
    abstract public function getModel(): Model;

    /**
     * Handle dynamic method calls into the model.
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        $callback = [$this->getModel(), $method];

        if (! is_callable($callback)) {
            throw new BadMethodCallException("Method [{$method}] does not exist.");
        }

        return call_user_func_array($callback, $parameters);
    }
}
