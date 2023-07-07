<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AttributesResourceModel;

abstract class AbstractModel extends Model
{
    const PRIMARY_KEY = 'id';

    use AttributesResourceModel;
}
