<?php

namespace App\Repositories\Interface;

interface IMediaRepository extends IBaseRepository
{
    public function storeMultiple(array $files, string $path): array;
    public function storeSingle($file, string $path);
}
