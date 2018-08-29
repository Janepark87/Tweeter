<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = []; //[]만 제외하고 다른것은 다 받아 들이겠다.
 }
