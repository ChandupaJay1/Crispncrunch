<?php

/**
 * Image Model
 */

class ImageModel extends Model
{
    protected string $table = "images";
    protected array $insert_columns = [
        'path',
        'projects_id',
    ];
    protected array $select_columns = [
        'id',
        'path',
        'projects_id',
        'created_at',
        'updated_at',
    ];

}
