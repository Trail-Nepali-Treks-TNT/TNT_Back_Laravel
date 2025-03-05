<?php

namespace App\Repositories;

use App\Models\Media\FileDetail;
use App\Models\Media\FileMapping;
use App\Repositories\Interface\IFileMappingRepository;

class FileMappingRepository extends BaseRepository implements IFileMappingRepository
{
    public function __construct(FileMapping $model)
    {
        parent::__construct($model);
    }

    public function getFiles($id, $table)
    {
        $files = FileDetail::join('file_mapping', 'file_details.id', '=', 'file_mapping.file_details_id')
            ->where('file_mapping.target_id', $id)
            ->where('file_mapping.table', $table)
            ->where('file_mapping.is_deleted', false) // Exclude deleted records
            ->where('file_details.is_deleted', false) // Exclude deleted records
            ->select([
                'file_details.file_url',
                'file_details.original_name',
                'file_mapping.target_id',
                'file_mapping.id'
            ])->get();
        return $files;
    }
}
