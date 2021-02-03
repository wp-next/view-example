<?php

namespace App\View\Components;

use WpNext\View\Component;

class Alert extends Component
{
    protected $path = 'components.alert';

    public $type;
    public $message;

    public function __construct(string $type, string $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function typeClass()
    {
        $types = [
            'success' => 'alert--success',
            'warning' => 'alert--warning',
            'error' => 'alert--error',
        ];

        return $types[$this->type] ?? $types['error'];
    }
}
