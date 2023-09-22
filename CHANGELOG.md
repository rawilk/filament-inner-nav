# Changelog

All notable changes to `filament-inner-nav` will be documented in this file

## v1.1.0 - 2023-09-22

### What's Changed

- Allow `InnerNav` instances to be passed in as a prop on the `filament-inner-nav::page` component by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3
- Add a sort order property to `InnerNavGroup` by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3
- Override the `getIcon` method on `InnerNavGroup` to allow for both the group and its items to have icons by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3
- Allow navigation items in `InnerNav` to be either a collection or array by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3
- Ensure group items are hidden and sorted correctly when `getItems()` is called on `InnerNavGroup` by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3
- Reject and sort items/groups on the `InnerNav` object itself instead of in a blade file by @rawilk in https://github.com/rawilk/filament-inner-nav/pull/3

**Full Changelog**: https://github.com/rawilk/filament-inner-nav/compare/v1.0.0...v1.1.0

## v1.0.0 - 2023-09-18

initial release
