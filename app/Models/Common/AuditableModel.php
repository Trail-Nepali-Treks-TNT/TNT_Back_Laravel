<?php

namespace App\Models\Common;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

abstract class AuditableModel extends BaseModel implements AuditableContract
{
    use Auditable;
}
