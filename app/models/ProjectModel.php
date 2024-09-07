<?php

/**
 * Project Model
 */

class ProjectModel extends Model
{
    protected string $table = "projects";
    protected array $insert_columns = [
        'title',
        'url',
        'logo',
    ];
    protected array $select_columns = [
        'id',
        'title',
        'url',
        'logo',
        'created_at',
        'updated_at',
    ];

}
