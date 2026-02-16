<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Video\Pages;

use App\Models\Category;
use App\Models\Tag;
use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Traits\BreadcrumbsTrait;
use Illuminate\Validation\Rule;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Video\VideoResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\Hidden;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use Throwable;


/**
 * @extends FormPage<VideoResource>
 */
class VideoFormPage extends FormPage
{
    use BreadcrumbsTrait;

    protected string $title = 'Добавить';

    /**
     * @return list<ComponentContract|FieldContract>
     */
//    protected function fields(): iterable
//    {
//        return [
//            Box::make([
//                ID::make(),
//            ]),
//        ];
//    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:5',
                'max:255',
                Rule::unique($item->getOriginal()::class)->ignoreModel($item->getOriginal())
            ],
            'short_desc' => ['string', 'max:255', 'nullable'],
            'category_id' => ['required', 'integer', Rule::exists(Category::class, 'id')],
            'file' => [],
            'tag_id' => ['array'],
        ];
    }


    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
