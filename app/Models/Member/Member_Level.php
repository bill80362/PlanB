<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_Level extends Model
{
    use HasFactory;

    protected $table = 'Member_Level';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';
    //
    public $timestamps = false;
    protected $dateFormat = 'U';
    const CREATED_AT = 'Build_Date';
    const UPDATED_AT = '';
    //
    protected $guarded = [];


}