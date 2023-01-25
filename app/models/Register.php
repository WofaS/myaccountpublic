<?php


namespace Model;

/**
 * register class
 */
class Register extends Model {

    protected $table = "register";
    protected $allowed_columns = [
        
        'member_id',
        'name',
        'gender',
        'month',
        'status',
        'comment',
        'marked_by',
        'marked_on',
        'updated_by',
        'updated_on',
    ];


}