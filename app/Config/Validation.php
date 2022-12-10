<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $user = [
        'name' => [
            'rules' => 'required|min_length[5]|is_unique[user.name]',
        ],
        'email' => [
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'rules'  => 'required',
        ],
        'repeatPassword' => [
            'rules' => 'required|matches[password]'
        ],
    ];

    public $userupdate = [
        'name' => [
            'rules' => 'required|min_length[5]|is_unique[user.name],id,{id}',
        ],
        'email' => [
            'rules' => 'required|valid_email',
        ],
    ];

    public $moviment = [
        'description' => [
            'rules' => 'required|min_length[5]'
        ],
        'value' => [
            'rules' => 'required',
        ],
    ];

    public $login = [
        'email' => [
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'rules'  => 'required',
        ],
    ];
}
