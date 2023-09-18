<?php

declare(strict_types=1);

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'ddd'])
    ->each->not->toBeUsed();

test('strict types are used')
    ->expect('Rawilk\FilamentInnerNav')
    ->toUseStrictTypes();

test('only enums are used in Enums directory')
    ->expect('Rawilk\FilamentInnerNav\Enums')
    ->toBeEnums();
