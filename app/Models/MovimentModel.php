<?php namespace App\Models;

use CodeIgniter\Model;

class MovimentModel extends Model{

    protected $table = 'moviment';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'description',
        'date',
        'value',
        'type',
        'user_id',
    ];
    protected $returnType = 'App\Entities\Moviment';
    protected $useTimestamps = false;
}