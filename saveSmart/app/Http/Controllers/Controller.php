<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\totalbalance;
use App\Models\goals;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
