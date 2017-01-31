<?php

namespace Icarus\Doctrine\QueryObject;


use Kdyby\Doctrine\QueryBuilder;


trait TQueryObjectFilter
{

    /**
     * @var array|\Closure[]
     */
    private $filter = [];



    private function applyFilter(QueryBuilder $queryBuilder)
    {
        foreach ($this->filter as $modifier) {
            $modifier($queryBuilder);
        }

        return $queryBuilder;
    }
}