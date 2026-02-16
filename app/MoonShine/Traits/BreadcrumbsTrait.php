<?php

namespace App\MoonShine\Traits;

trait BreadcrumbsTrait
{
    public function getTitle(): string
    {
        return $this->getItem() ? 'Редактировать' : $this->title;
    }

    public function getBreadcrumbs(): array
    {
        $breadcrumbs = parent::getBreadcrumbs();
        $breadcrumbs[$this->getRoute()] = $this->getTitle();
        return $breadcrumbs;
    }
}
