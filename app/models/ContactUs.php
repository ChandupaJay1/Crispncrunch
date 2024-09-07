<?php

class ContactUs extends Model
{
    protected string $table = "contact_us";

    protected array $insert_columns = [
        "name",
        "emails_id",
        "subject",
        "message",
    ];

    protected array $select_columns = [
        "id",
        "emails_id",
        "subject",
        "message",
        "created_at",
        "updated_at",
    ];
}
