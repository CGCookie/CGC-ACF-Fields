<?php
/*
 * Plugin Name: CGC ACF Fields
 */


/**
 *  Install Add-ons
 *
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array(
		'id' => 'acf_additional-post-information',
		'title' => 'Additional Post Information',
		'fields' => array(
			array(
				'key' => 'field_518145b9f156b',
				'label' => 'Who can see this post?',
				'name' => 'cgc_post_type',
				'type' => 'select',
				'multiple' => 0,
				'allow_null' => 0,
				'choices' => array(
					'Regular' => 'Everyone',
					'Citizen' => 'Citizen Members Only',
					'Free' => 'Logged In Users',
				),
				'default_value' => 'Regular',
			),
			array(
				'key' => 'field_5181332268d50',
				'label' => 'Post Video',
				'name' => 'post_video',
				'type' => 'true_false',
				'message' => 'Does this post have a video?',
				'default_value' => 0,
			),
			array (
				'multiple' => 0,
				'allow_null' => 0,
				'choices' => array (
					'default' => 'Default',
					'show' => 'Force Show',
					'hide' => 'Force Hide',
				),
				'default_value' => '',
				'key' => 'field_51be96ed822f9',
				'label' => 'FREE Label Override',
				'name' => 'free_label_override',
				'type' => 'select',
				'instructions' => 'The Free label automatically shows if it is a free post, but this option allows you to override this.',
			),

/*			array(
				'key' => 'field_5181334c68d51',
				'label' => 'Post Video Embed Code',
				'name' => 'post_video_embed_code',
				'type' => 'textarea',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
						array(
							'field' => 'field_5181332268d50',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),*/
			array(
				'key' => 'field_5181334c68d51',
				'label' => 'Post Video Embed Code',
				'name' => 'cgc_vimeo_code',
				'type' => 'textarea',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
						array(
							'field' => 'field_5181332268d50',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			array(
				'key' => 'field_518eac18a64e4',
				'label' => 'Post Video Duration',
				'name' => 'post_video_duration',
				'type' => 'text',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
						array(
							'field' => 'field_5181332268d50',
							'operator' => '==',
							'value' => '1',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'none',
			),
			array(
				'key' => 'field_5181338068d53',
				'label' => 'Source File Links',
				'name' => 'source_file_links',
				'type' => 'repeater',
				'sub_fields' => array(
					array(
						'key' => 'field_518eab58920c4',
						'label' => 'File Name',
						'name' => 'file_name',
						'type' => 'text',
						'column_width' => '',
						'default_value' => 'HD Video',
						'formatting' => 'text',
					),
					array(
						'key' => 'field_518eab62920c5',
						'label' => 'File URL',
						'name' => 'file_url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'text',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add File',
			),
			array(
				'key' => 'field_518133dd68d55',
				'label' => 'Post Image Gallery',
				'name' => 'cgc_image_gallery',
				'type' => 'true_false',
				'message' => 'Disable user gallery for this post?',
				'default_value' => 0,
			),
			array(
				'key' => 'field_518133ff68d56',
				'label' => 'Post Image Upload',
				'name' => 'cgc_image_upload',
				'type' => 'true_false',
				'message' => 'Disable image upload to this post?',
				'default_value' => 0,
			),
			array(
				'key' => 'field_518eac24a64e5',
				'label' => '',
				'name' => '',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'cgc_courses',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'cgc_lessons',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'cgc_resource',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'comingsoon',
					'order_no' => 0,
					'group_no' => 3,
				),
			),			
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array(
		'id' => 'acf_featured-posts',
		'title' => 'Featured Posts',
		'fields' => array(
			array(
				'post_type' => array(
					0 => 'post',
					1 => 'cgc_courses',
					2 => 'cgc_lessons',
					3 => 'cgc_resource',
					4 => 'comingsoon',
					5 => 'cgc_resource_folder',
				),
				'max' => '5',
				'taxonomy' => array(
					0 => 'all',
				),
				'filters' => array(
					0 => 'search',
				),
				'result_elements' => array(
					0 => 'post_type',
					1 => 'post_title',
				),
				'key' => 'field_5193fe10e30fc',
				'label' => 'Featured Posts',
				'name' => 'featured_posts',
				'type' => 'relationship',
				'instructions' => 'Feature a minimum of two posts and a maximum of 5 posts, but do not feature 3 or 4 posts. - if we want the option to feature 3 or 4 in the future, let\'s make a to-do and I\'ll work on it post launch.',
				),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array(
		'id' => 'acf_social-links',
		'title' => 'Social Links',
		'fields' => array(
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b7e8cb8190f',
				'label' => 'Facebook',
				'name' => 'facebook_link',
				'type' => 'text',
			),
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b7e8ec81910',
				'label' => 'Twitter',
				'name' => 'twitter_link',
				'type' => 'text',
			),
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b7e8f081911',
				'label' => 'Youtube',
				'name' => 'youtube_link',
				'type' => 'text',
			),
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b7e8fb81912',
				'label' => 'Pinterest',
				'name' => 'pinterest_link',
				'type' => 'text',
			),
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b7e90581913',
				'label' => 'RSS Feed',
				'name' => 'rss_feed_link',
				'type' => 'text',
			),
			array(
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51b80744b2199',
				'label' => 'Deviant Art',
				'name' => 'deviant_art_link',
				'type' => 'text',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array(
		'id' => 'acf_resources',
		'title' => 'Resources',
		'fields' => array(
			array(
				'key' => 'field_51ba50fd91f85',
				'label' => 'Resource Images',
				'name' => 'resource_images',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'cgc_resource',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_pricing-page',
		'title' => 'Pricing Page',
		'fields' => array (
			array (
				'default_value' => 'Join the CG Cookie Network',
				'formatting' => 'html',
				'key' => 'field_51bba90c70b1b',
				'label' => 'First Heading',
				'name' => 'first_heading',
				'type' => 'text',
			),
			array (
				'default_value' => 'and become a better CG artist.',
				'formatting' => 'html',
				'key' => 'field_51bba92270b1c',
				'label' => 'Second Heading',
				'name' => 'second_heading',
				'type' => 'text',
			),
			array (
				'default_value' => 'Free',
				'formatting' => 'html',
				'key' => 'field_51bbac466446c',
				'label' => 'Free Price',
				'name' => 'free_price',
				'type' => 'text',
			),
			array (
				'default_value' => '$18',
				'formatting' => 'html',
				'key' => 'field_51bbac536446d',
				'label' => 'Citizen Price',
				'name' => 'citizen_price',
				'type' => 'text',
			),
			array (
				'default_value' => '20% off',
				'formatting' => 'html',
				'key' => 'field_51bbac596446e',
				'label' => 'Group Price',
				'name' => 'group_price',
				'type' => 'text',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-pricing.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_gallery-submission-guidelines',
		'title' => 'Gallery Submission Guidelines',
		'fields' => array (
			array (
				'toolbar' => 'full',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51bd64423fd31',
				'label' => 'Image Submission Guidlines',
				'name' => 'image_submission_guidelines',
				'type' => 'wysiwyg',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-submit-image.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	function acf_default_value_by_post_type( $field ) {
		global $post;

		$post_type = get_post_type();
		if ( $post_type == 'cgc_lessons' ) {
			$field['default_value'] = 'Citizen';
		}

		return $field;
	}
	add_filter('acf/load_field/name=cgc_post_type', 'acf_default_value_by_post_type');	
	
}
