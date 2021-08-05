<?php

namespace App\Helpers;

class TextAlignment
{
    private string $align;

    public function __construct(string $align = 'left')
    {
        $this->align = $align;
    }

    public function className(): string
    {
        return [
            'left'  => 'text-left',
            'right'  => 'text-right',
            'center'  => 'text-center',

        ][$this->align] ?? 'text-left';
    }
}
