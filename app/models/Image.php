<?php

class Image extends Model
{
    protected string $table = "images";

    protected array $insert_columns = [
        "path",
        "description",
    ];

    protected array $select_columns = [
        "id",
        "path",
        "description",
        "created_at",
        "updated_at",
    ];
}
