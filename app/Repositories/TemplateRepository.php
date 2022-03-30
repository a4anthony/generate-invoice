<?php

namespace App\Repositories;

use App\Models\Template;

class TemplateRepository
{
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

}
