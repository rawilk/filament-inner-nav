<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Closure;
use Filament\Navigation\NavigationBuilder;
use Filament\Pages\Page;
use Filament\Support\Concerns\Configurable;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Rawilk\FilamentInnerNav\Enums\InnerNavLayout;

class InnerNav extends NavigationBuilder
{
    use Configurable;
    use EvaluatesClosures;

    protected InnerNavLayout|Closure|null $layout = null;

    protected string|Closure|HtmlString|null $title = null;

    protected string|Closure|HtmlString|null $description = null;

    protected bool|Closure $isWireNavigate = false;

    protected array|Collection $navigationItems;

    public function __construct(protected ?Page $page = null) {}

    public static function make(?Page $page = null): self
    {
        $static = app(static::class, ['page' => $page]);
        $static->configure();

        return $static;
    }

    public function setTitle(string|Closure $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): null|string|HtmlString
    {
        $title = $this->evaluate($this->title);

        if ($title instanceof View) {
            return new HtmlString($title->render());
        }

        return $title;
    }

    public function setDescription(string|Closure $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): null|string|HtmlString
    {
        return $this->evaluate($this->description);
    }

    public function setNavigationItems(array|Collection $navigationItems): self
    {
        $this->navigationItems = $navigationItems;

        return $this;
    }

    /**
     * @return \Illuminate\Support\Collection<int, \Rawilk\FilamentInnerNav\InnerNavItem|\Rawilk\FilamentInnerNav\InnerNavGroup>
     */
    public function getNavigationItems(): Collection
    {
        return collect($this->navigationItems)
            ->reject(fn (InnerNavItem|InnerNavGroup $item): bool => $item->isHidden())
            ->sortBy(fn (InnerNavItem|InnerNavGroup $item): int => $item->getSort());
    }

    public function setLayout(InnerNavLayout|Closure $layout): self
    {
        $this->layout = $layout;

        return $this;
    }

    public function getLayout(): InnerNavLayout
    {
        return $this->evaluate($this->layout) ?? InnerNavLayout::Side;
    }

    public function isLayout(InnerNavLayout $layout): bool
    {
        return $this->getLayout() === $layout;
    }

    public function wireNavigate(bool|Closure $condition = true): self
    {
        $this->isWireNavigate = $condition;

        return $this;
    }

    public function shouldWireNavigate(): bool
    {
        return $this->evaluate($this->isWireNavigate);
    }
}
