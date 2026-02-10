<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\Models\User;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\GrayPalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use MoonShine\MenuManager\MenuDivider;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\Layout\Favicon;
use MoonShine\UI\Components\Layout\Footer;
use App\MoonShine\Resources\User\UserResource;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = GrayPalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        $menu = [];

        if(auth()->user()->isSuperUser()) {
            $menu = [
                ...parent::menu(),
                MenuDivider::make(),
            ];
        }

        return array_merge($menu, [
            MenuItem::make(UserResource::class, 'Users')
                ->icon('users')
                ->badge(User::count()),
            MenuItem::make('/', 'Видео')
                ->icon('video-camera'),
//                ->badge(fn() => Video::count()),
        ]);
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    protected function getFooterCopyright(): string
    {
        return '&copy; 2026 created by Daniel Yakovlev';
    }

    protected function getFooterComponent(): Footer
    {
        return parent::getFooterComponent()->menu([]);
    }

    protected function getLogo(bool $small = false): string
    {
        return '/vendor/moonshine/logo-small.png';
    }
}
