<?php

namespace App\View\Components\Table;

use App\Helpers\TextAlignment;
use Illuminate\View\Component;

class Table extends Component
{
    public array $headers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $headers)
    {
        $this->headers = $this->formatHeaders($headers);
    }

    private function formatHeaders(array $headers): array
    {
        return array_map(function($header){
            $name = is_array($header) ? $header['name'] : $header;
            return [
                'name' => $name,
                'classes' => $this->textAlignClasses($header['align'] ?? 'left'),
            ];
        }, $headers);
    }

    public function textAlignClasses($align): string
    {
        return (new TextAlignment($align))->className();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.table');
    }
}
