<?php
/**
 * Header Popup Options
 *
 * @package Kadence
 */

namespace Kadence;

use Kadence\Theme_Customizer;
use function Kadence\kadence;

$settings = array(
	'header_popup_tabs' => array(
		'control_type' => 'kadence_tab_control',
		'section'      => 'header_popup',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'kadence' ),
				'target' => 'header_popup',
			),
			'design' => array(
				'label'  => __( 'Design', 'kadence' ),
				'target' => 'header_popup_design',
			),
			'active' => 'general',
		),
	),
	'header_popup_tabs_design' => array(
		'control_type' => 'kadence_tab_control',
		'section'      => 'header_popup_design',
		'settings'     => false,
		'priority'     => 1,
		'input_attrs'  => array(
			'general' => array(
				'label'  => __( 'General', 'kadence' ),
				'target' => 'header_popup',
			),
			'design' => array(
				'label'  => __( 'Design', 'kadence' ),
				'target' => 'header_popup_design',
			),
			'active' => 'design',
		),
	),
	'header_popup_layout' => array(
		'control_type' => 'kadence_radio_icon_control',
		'section'      => 'header_popup',
		'priority'     => 4,
		'default'      => kadence()->default( 'header_popup_layout' ),
		'label'        => esc_html__( 'Layout', 'kadence' ),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '#mobile-drawer',
				'pattern'  => 'popup-drawer-layout-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'fullwidth' => array(
					'tooltip' => __( 'Reveal as Fullwidth', 'kadence' ),
					'name'    => __( 'Fullwidth', 'kadence' ),
					'icon'    => '',
				),
				'sidepanel' => array(
					'tooltip' => __( 'Reveal as Side Panel', 'kadence' ),
					'name'    => __( 'Side Panel', 'kadence' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'header_popup_side' => array(
		'control_type' => 'kadence_radio_icon_control',
		'section'      => 'header_popup',
		'priority'     => 4,
		'default'      => kadence()->default( 'header_popup_side' ),
		'label'        => esc_html__( 'Slide-Out Side', 'kadence' ),
		'context'      => array(
			array(
				'setting'    => 'header_popup_layout',
				'operator'   => 'sub_object_contains',
				'sub_key'    => 'layout',
				'responsive' => false,
				'value'      => 'sidepanel',
			),
		),
		'live_method'     => array(
			array(
				'type'     => 'class',
				'selector' => '#mobile-drawer',
				'pattern'  => 'popup-drawer-side-$',
				'key'      => '',
			),
		),
		'input_attrs'  => array(
			'layout' => array(
				'left' => array(
					'tooltip' => __( 'Reveal from Left', 'kadence' ),
					'name'    => __( 'Left', 'kadence' ),
					'icon'    => '',
				),
				'right' => array(
					'tooltip' => __( 'Reveal from Right', 'kadence' ),
					'name'    => __( 'Right', 'kadence' ),
					'icon'    => '',
				),
			),
			'responsive' => false,
		),
	),
	'header_popup_background' => array(
		'control_type' => 'kadence_background_control',
		'section'      => 'header_popup_design',
		'label'        => esc_html__( 'Popup Background', 'kadence' ),
		'default'      => kadence()->default( 'header_popup_background' ),
		'live_method'     => array(
			array(
				'type'     => 'css_background',
				'selector' => '#mobile-drawer .drawer-inner',
				'property' => 'background',
				'pattern'  => '$',
				'key'      => 'base',
			),
		),
		'input_attrs'  => array(
			'tooltip'  => __( 'Popup Background', 'kadence' ),
		),
	),
	'header_popup_close_color' => array(
		'control_type' => 'kadence_color_control',
		'section'      => 'header_popup_design',
		'label'        => esc_html__( 'Close Toggle Colors', 'kadence' ),
		'default'      => kadence()->default( 'header_popup_close_color' ),
		'live_method'     => array(
			array(
				'type'     => 'css',
				'selector' => '#mobile-drawer .drawer-header .drawer-toggle',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'color',
			),
			array(
				'type'     => 'css',
				'selector' => '#mobile-drawer .drawer-header .drawer-toggle:hover',
				'property' => 'color',
				'pattern'  => '$',
				'key'      => 'hover',
			),
		),
		'input_attrs'  => array(
			'colors' => array(
				'color' => array(
					'tooltip' => __( 'Initial Color', 'kadence' ),
					'palette' => true,
				),
				'hover' => array(
					'tooltip' => __( 'Hover Color', 'kadence' ),
					'palette' => true,
				),
			),
		),
	),
);

Theme_Customizer::add_settings( $settings );

