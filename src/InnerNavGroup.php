<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Closure;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class InnerNavGroup extends NavigationGroup
{
    protected ?string $id = null;

    protected ?string $subNavId = null;

    protected bool|Closure $shouldExpandByDefault = false;

    public function expandByDefault(bool|Closure $condition): self
    {
        $this->shouldExpandByDefault = $condition;

        return $this;
    }

    public function isExpanded(): bool
    {
        return (bool) $this->evaluate($this->shouldExpandByDefault);
    }

    public function getId(): string
    {
        if ($this->id !== null) {
            return $this->id;
        }

        return $this->isCollapsible()
            ? $this->id = 'inner-nav-item-' . Str::orderedUuid()
            : $this->id = 'inner-nav-heading-' . Str::orderedUuid();
    }

    public function getSubNavId(): string
    {
        if ($this->subNavId !== null) {
            return $this->subNavId;
        }

        return $this->subNavId = 'inner-nav-group-' . Str::orderedUuid();
    }

    public function isHidden(): bool
    {
        foreach ($this->getItems() as $item) {
            if ($item->isHidden()) {
                continue;
            }

            return false;
        }

        return true;
    }

    /**
     * @param  array<NavigationItem> | Arrayable  $items
     */
    public function items(array|Arrayable $items): static
    {
        $this->items = $items;

        return $this;
    }
}
