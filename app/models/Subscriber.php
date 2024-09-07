<?php

class Subscriber extends Model
{
    protected string $table = "subscribers";

    protected array $insert_columns = [
        "emails_id",
    ];

    protected array $select_columns = [
        "id",
        "emails_id",
        "is_active",
        "created_at",
        "updated_at",
    ];

    public function isExists(array $data): bool
    {
        $exist = parent::selectOne($data);
        return $exist != null;
    }
}
