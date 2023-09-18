<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Closure;
use Filament\Navigation\NavigationItem;

class InnerNavItem extends NavigationItem
{
    protected bool|Closure $disabled = false;

    public function isDisabledWhen(bool|Closure $isDisabled): self
    {
        $this->disabled = $isDisabled;

        return $this;
    }

    public function getIsDisabled(): bool
    {
        return $this->evaluate($this->disabled);
    }
}
