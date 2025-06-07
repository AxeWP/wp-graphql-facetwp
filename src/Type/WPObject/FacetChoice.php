<?php
/**
 * GraphQL Object Type - FacetChoice.
 *
 * @package WPGraphQL\FacetWP\Type\WPObject
 * @since   0.4.0
 */

namespace WPGraphQL\FacetWP\Type\WPObject;

use WPGraphQL\FacetWP\Vendor\AxeWP\GraphQL\Abstracts\ObjectType;

/**
 * Class - FacetChoice
 */
class FacetChoice extends ObjectType {
	/**
	 * {@inheritDoc}
	 */
	public static function type_name(): string {
		return 'FacetChoice';
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_description(): string {
		return __( 'FacetWP choice', 'wpgraphql-facetwp' );
	}

	/**
	 * {@inheritDoc}
	 */
	public static function get_fields(): array {
		return [
			'count'    => [
				'type'        => 'Int',
				'description' => static fn () => __( 'Count', 'wpgraphql-facetwp' ),
			],
			'depth'    => [
				'type'        => 'Int',
				'description' => static fn () => __( 'Depth', 'wpgraphql-facetwp' ),
			],
			'label'    => [
				'type'        => 'String',
				'description' => static fn () => __( 'Taxonomy label or post title', 'wpgraphql-facetwp' ),
			],
			'parentId' => [
				'type'        => 'Int',
				'description' => static fn () => __( 'Parent Term ID (Taxonomy choices only)', 'wpgraphql-facetwp' ),
			],
			'termId'   => [
				'type'        => 'Int',
				'description' => static fn () => __( 'Term ID (Taxonomy choices only)', 'wpgraphql-facetwp' ),
			],
			'value'    => [
				'type'        => 'String',
				'description' => static fn () => __( 'Taxonomy value or post ID', 'wpgraphql-facetwp' ),
			],
		];
	}
}
