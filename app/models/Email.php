<?php

/**
 * Email Model
 */

class Email extends Model
{
    protected string $table = "emails";
    protected array $insert_columns = [
        'email',
        'verified',
    ];

    protected array $update_columns = [
        'verified'
    ];

    protected array $select_columns = [
        'id',
        'email',
        'verified',
        'created_at',
        'updated_at',
    ];

    public function isExists(array $data): bool
    {
        $exist = parent::selectOne($data);
        return $exist != null;
    }

    public function isVerified(string $email): bool
    {
        $record = parent::selectOne(['email' => $email]);
        return $record->verified;
    }
}
