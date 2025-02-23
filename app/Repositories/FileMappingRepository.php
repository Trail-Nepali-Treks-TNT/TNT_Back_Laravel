<?php

namespace App\Repositories;

use App\Models\Media\FileMapping;
use App\Repositories\Interface\IFileMappingRepository;

class FileMappingRepository extends BaseRepository implements IFileMappingRepository
{
    public function __construct(FileMapping $model)
    {
        parent::__construct($model);
    }
}
