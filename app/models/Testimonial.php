<?php

class Testimonial extends Model
{
    protected string $table = "testimonials";

    protected array $insert_columns = [
        "name",
        "comment",
        "rating",
        "country",
        "images_id"
    ];

    protected array $select_columns = [
        "id",
        "name",
        "comment",
        "rating",
        "country",
        "images_id",
        "created_at",
        "updated_at",
    ];
}
