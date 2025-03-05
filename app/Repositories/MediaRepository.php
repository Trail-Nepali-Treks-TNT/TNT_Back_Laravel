<?php

namespace App\Repositories;

use App\Models\Media\FileDetail;
use App\Repositories\Interface\IMediaRepository;

class MediaRepository extends BaseRepository implements IMediaRepository
{
    public function __construct(FileDetail $model)
    {
        parent::__construct($model);
    }

    public function storeMultiple(array $files, string $path): array
    {
        $ids = [];

        foreach ($files as $file) {
            $ids[] = $this->storeSingle($file, $path);
        }
        return $ids;
    }

    public function storeSingle($file, string $path)
    {
        $originalName = $file->getClientOriginalName();
        $extension    = $file->getClientOriginalExtension();
        $fileName     = time() . '_' . uniqid() . '.' . $extension;
        $directory = 'images/' . $path;
        // Store the file in the "public/images" directory
        $fullPath = $file->storeAs($directory, $fileName, 'public');

        // Build the file URL (assuming you ran `php artisan storage:link`)
        $fileUrl = asset('storage/' . $fullPath);

        // Get the MIME type
        $contentType = $file->getClientMimeType();

        // Prepare data for single image storage
        $data = [
            'file_url'      => $fileUrl,
            'original_name' => $originalName,
            'content_type'  => $contentType,
            'file_name'     => $fileName,
        ];
        $image = $this->create($data);
        return $image->id;
    }
}
