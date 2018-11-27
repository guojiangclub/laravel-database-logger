<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-27
 * Time: 20:05
 */

namespace iBrand\DatabaseLogger\Test;


class Controller extends \Illuminate\Routing\Controller
{
    public function index()
    {
        User::find(1);
    }
}