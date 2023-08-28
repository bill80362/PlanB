<?php

namespace App\Services\Admin\Common;

use App\Models\Member\Member_Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ServiceMemberData extends Master
{
    public function __construct(
        protected $oModel,
    ){}
}
