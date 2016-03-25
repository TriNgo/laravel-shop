<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\Repository;

class MenuRepository extends Repository
{
    function model()
    {
        return 'App\Models\Menu';
    }
}