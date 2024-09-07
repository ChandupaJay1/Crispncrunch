<?php

/**
 * Member Model
 */

class MemberModel extends Model
{
    protected string $table = "members";
    protected array $insert_columns = [
        'fname',
        'lname',
        'email',
        'mobile',
        'nic',
        'dob',
        'img',
        'role',
        'quote',
    ];
    protected array $select_columns = [
        'id',
        'fname',
        'lname',
        'email',
        'mobile',
        'nic',
        'dob',
        'img',
        'role',
        'quote',
    ];

}
