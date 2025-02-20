# Changelog

## [Unreleased]

## v0.5.1

This _minor_ release bumps the `tested up to` tags for WordPress v6.7.2 and WPGraphQL v2.0.

It's also the first release in the new repository location at https://github.com/AxeWP/wp-graphql-facetwp, a change which should allow @justlevine to allocate significantly more resources to the plugin. Thanks @hsimah for your stewardship and hospitality 🙏.



> [!IMPORTANT]
> Vendor files are now .gitignored and must be built locally (`composer install`) for the plugin source code to work.
>
> Users should download the release version of wp-graphql-facetwp.zip provided on the [latest GitHub Release page](https://github.com/AxeWP/wp-graphql-facetwp/releases/latest) and _not_ the source code zip file.

- chore!: Remove `vendor` and `vendor-prefixed/*` from the GitHub repository.
- chore: Test compatibility with WordPress 6.7.2.
- chore: Test compatibility with WPGraphQL 2.0.
- chore: Update Strauss to v0.19.1.
- chore: Update composer dependencies.
- chore: Update repository URLs to `https://github.com/AxeWP/wp-graphql-facetwp`. H/t @hsimah
- ci: Cleanup zip and release workflow.
- ci: Use `docker compose` instead of `docker-compose`.

## v0.5.0

This _major_ release refactors the root files to use the `WPGraphQL\FacetWP` namespace. It also adds support for the Plugin Dependencies header added in WordPress 6.5, adds explicit support for PHP 8.2 and WordPress 6.5, and more.

> [!NOTE]
> Although this release technically contains breaking changes, these changes are limited to developers directly extending the `wp-graphql-facetwp.php` file and `WPGraphQL\FacetWP\Main` class.
> If you are using the plugin as intended, you should not experience any issues when upgrading.

- feat: Add support for Plugin Dependencies header.
- chore!: Refactor plugin entrypoint to use `WPGraphQL\FacetWP` namespace.
- chore: Implement strict phpstan rules and lint.
- chore: Update Composer dependencies and lint.
- chore: Update WPGraphQL Plugin Boilerplate to v0.1.0.
- ci: Test against WP 6.5.
- ci: Test against PHP 8.2.
- ci: Update GitHub Workflows to latest versions.
- ci: Update Strauss to v0.17.0.

## v0.4.4

This _minor_ release implements the new WPGraphQL Coding Standards ruleset for `PHP_CodeSniffer`. While many of the addressed sniffs are cosmetic, numerous smells regarding performance, type safety, sanitization, and 3rd-party interoperability have been fixed as well.

- chore: Implement `axepress/wp-graphql-cs` PHP_Codesniffer ruleset.
- chore: Update WPGraphQL Plugin Boilerplate to v0.0.9.
- chore: Update Composer dev-dependencies.

## v0.4.3

This _minor_ release adds support for the [Sort Facet](https://facetwp.com/help-center/facets/facet-types/sort). It also fixes a bug where the FacetQueryArgs input value was not being correctly matched to the correct Facet.

**Note:** To support the Sort facet when using custom WPGraphQL Connection Resolvers, you must set the connection's `orderby` argument to `post__id`. The [example WooCommerce snippet](./README.md#woocommerce-support) has been updated to reflect this change, and you should update your custom code accordingly.

- feat: Add support for the Sort Facet. (Props to @ninie1205 for sponsoring this feature!)
- fix: Fallback to `snake_case` when matching the `FacetQueryArgs` input value to the FacetWP facet name.
- docs: Update WooCommerce snippet in README.md to support the Sort Facet.

## v0.4.2

This _minor_ release lays the groundwork for the upcoming Facet auto-registration / official Sort Facet support. It introduces a new `FacetConfig` interface, which is implemented by the `Facet` object. Additionally, we adopted the use of WPGraphQL Plugin Boilerplate to scaffold our PHP classes, updated our Composer dev dependencies, and started testing against WordPress 6.2 and running WPUnit tests as part of our CI workflow.

- feat: Change `Facet` object to implement new `FacetConfig` interface.
- fix: Add missing descriptions to GraphQL types.
- dev!: Refactor GraphQL type classes to use `axepress/wp-graphql-plugin-boilerplate`.
- dev!: Remove unused PHP interfaces.
- dev: Initialize plugin using `facetwp_init` hook.
- chore: Build `FacetQueryArgs` config before calling the registration method.
- chore: Stub `FacetWP_Facet` class properties.
- chore: Update Composer dev deps.
- chore: Implement Strauss to namespace PHP dependencies.
- chore: Fix doc reference and internal usage of `register_graphql_facet_type()` function to be called on `graphql_facetwp_init` hook.
- tests: Refactor and enable WPUnit tests.
- ci: Test against WordPress 6.2.
- ci: Register test post facet so `graphql-schema-linter` generates a valid schema.
- ci: Run GitHub workflows on `push` events to `main` or `develop` branches.
- ci: Temporary ignore `graphql-schema-linter` errors from soon-to-be deprecated Types.

## v0.4.1
This _minor_ release introduces WPGraphQL-specific field properties to the Facet configuration array and adds the corresponding `get_graphql_allowed_facets()` access function. It also deprecates the usage `snake_case` autogenerated field names in the `FacetQueryArgs` input type in favor of `camelCase`, and adds explicit support for PHP 8.1.

- feat: add `show_in_graphql` and `graphql_field_name` to the Facet configuration.
- feat: add explicit PHP 8.1 support.
- feat: deprecate usage of `snake_case` field names in `FacetQueryArgs` input type, in favor of `camelCase`.
- dev: add `get_graphql_allowed_facets()` access function.
- dev: refactor facet input types to use the `graphql_type` config property generated by `FacetRegistry::get_facet_input_type()`.
- dev: add the following WordPress filters: `graphql_facetwp_facet_input_type`.
- chore: update Composer dependencies.
- chore: replace `poolshark/wp-graphql-stubs` dev dependency with `axepress/wp-graphql-stubs`
- chore: stub `FWP()` function and `FacetWP` class properties.
- chore: change stubfile extensions to `.php`.
- tests: change `FWPGraphQLTestCase.php::register_facet()` to add a new facet instead of replace it.

## v0.4.0
This _major_ release refactors the underlying PHP codebase, bringing with it support for the latest versions of WPGraphQL and FacetWP. Care has been taken to ensure there are _no breaking changes_ to the GraphQL schema.

- feat!: Refactor plugin PHP classes and codebase structure to follow ecosystem patterns.
- feat!: Bump minimum version of WPGraphQL to `v1.6.1`.
- feat!: Bump minimum PHP version to `v7.4`.
- feat!: Bump minimum FacetWP version to `v4.0`.
- fix: Implement `WPVIP` PHP coding standards.
- fix: Implement and meet `PHPStan` level 8 coding standards.
- tests: Implement basic Codeception acceptance tests.
- ci: Add Github workflows for PRs and releases.
- chore: update Composer dependencies.
- chore: switch commit flow to `develop` => `main` and set default branch to `develop`. The existing `master` branch will be removed on 1 October 2022.

## v0.3.0
- feat: Updates with default connection inputs and WooCommerce integration hooks.

## v0.2.0
- fix: Updated deprecated calls to WPGraphQL functions.
- docs: Updated documentation to remind users to register Facets during GraphQL init.

## v0.1.1
- fix: facet connection used old style node resolver.

## v0.1.0
Initial release.

