<?php
/**
 * Created by PhpStorm.
 * User: champika
 * Date: 11/29/20
 * Time: 9:00 AM
 */

namespace App\BL;


Abstract class Core
{
    /**
     * @var
     */
    protected $repository;

    /**
     * Core constructor.
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public static function init()
    {
        $class = get_called_class();
        return new $class;
    }
}