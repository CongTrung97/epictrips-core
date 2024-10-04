<?php
class TFTeam_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-team';
    }
    
    public function get_title() {
        return esc_html__( 'TF Team', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-person';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-team'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );


	        $this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/team-1.jpg",
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
				]
			);

			$this->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Chief Executive Officer', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'John Smith', 'themesflat-core' ),
					'label_block' => true,
				]
			);
	        
			$this->end_controls_section();
        // /.End Tab Setting 

        // Start Social Icons        
			$this->start_controls_section( 'section_social_icon',
	            [
	                'label' => esc_html__('Social Icons', 'themesflat-core'),
	            ]
	        );

			$this->add_control( 
				'show_social',
				[
					'label' => esc_html__( 'Show Social', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

	        $repeater = new \Elementor\Repeater();

	        $repeater->add_control(
				'social_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'social',
					'default' => [
						'value' => 'fab fa-wordpress',
						'library' => 'fa-brands',
					],
					'recommended' => [
						'fa-brands' => [
							'android',
							'apple',
							'behance',
							'bitbucket',
							'codepen',
							'delicious',
							'deviantart',
							'digg',
							'dribbble',
							'elementor',
							'facebook-f',
							'flickr',
							'foursquare',
							'free-code-camp',
							'github',
							'gitlab',
							'globe',
							'houzz',
							'instagram',
							'jsfiddle',
							'linkedin-in',
							'medium',
							'meetup',
							'mix',
							'mixcloud',
							'odnoklassniki',
							'pinterest',
							'product-hunt',
							'reddit',
							'shopping-cart',
							'skype',
							'slideshare',
							'snapchat',
							'soundcloud',
							'spotify',
							'stack-overflow',
							'steam',
							'telegram',
							'thumb-tack',
							'tripadvisor',
							'tumblr',
							'twitch',
							'twitter',
							'viber',
							'vimeo',
							'vk',
							'weibo',
							'weixin',
							'whatsapp',
							'wordpress',
							'xing',
							'yelp',
							'youtube',
							'500px',
						],
						'fa-solid' => [
							'envelope',
							'link',
							'rss',
						],
					],
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'default' => [
					'url' => '#',
						'is_external' => true,
						'nofollow' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'social_icon_list',
				[
					'label' => esc_html__( 'Social Icons', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'social_icon' => [
								'value' => 'fab fa-facebook-f',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-linkedin-in',
								'library' => 'fa-brands',
							],
						],
						
						[
							'social_icon' => [
								'value' => 'fab fa-twitter',
								'library' => 'fa-brands',
							],
						],
					
						
					],
					'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
				]
			);
	        
			$this->end_controls_section();
        // /.End Social Icons              

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					
				]
			);

			// $this->add_control(
			// 	'align',
			// 	[
			// 		'label' => esc_html__( 'Alignment', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::CHOOSE,
			// 		'options' => [
			// 			'left' => [
			// 				'title' => esc_html__( 'Left', 'themesflat-core' ),
			// 				'icon' => 'eicon-text-align-left',
			// 			],
			// 			'center' => [
			// 				'title' => esc_html__( 'Center', 'themesflat-core' ),
			// 				'icon' => 'eicon-text-align-center',
			// 			],
			// 			'right' => [
			// 				'title' => esc_html__( 'Right', 'themesflat-core' ),
			// 				'icon' => 'eicon-text-align-right',
			// 			],
			// 		],
			// 		'default' => 'center',
			// 		'toggle' => true,
			// 		'selectors' => [
			// 			'{{WRAPPER}} .tf-team' => 'text-align: {{VALUE}}',					
			// 		],
					
			// 	]
			// );		
			
	        $this->add_control(
				'h_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .image-team .inner-image, {{WRAPPER}} .tf-team .image-team img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        
			$this->add_control(
				'margin_image',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .image-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	

	        $this->add_control(
				'h_title',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-team .name',
				]
			); 

			$this->add_control( 
				'color_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-team .name' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'margin_title',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	

			$this->add_control(
				'h_pos',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_pos',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-team .position',
				]
			); 

			$this->add_control( 
				'color_pos',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-team .position' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'margin_pos',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-team .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	

			$this->add_control(
				'h_social',
				[
					'label' => esc_html__( 'Social', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control( 
				'color_social',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-team .social a' => 'color: {{VALUE}}',					
					],
					
				]
			);

			$this->add_control( 
				'bgcolor_social',
				[
					'label' => esc_html__( 'Background', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-team .social' => 'background: {{VALUE}}',					
						'{{WRAPPER}} .tf-team .social::before' => 'border-bottom-color: {{VALUE}}',					
						'{{WRAPPER}} .tf-team .social:after' => 'border-bottom-color: {{VALUE}}',					
					],
					
				]
			);

			$this->add_control( 
				'color_social_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-team .social a:hover' => 'color: {{VALUE}}',					
					],
					
				]
			);

			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_team', ['id' => "tf-team-{$this->get_id()}", 'class' => ['tf-team', ], 'data-tabid' => $this->get_id()] );

		$name = $position = $social_html = $social = $image_html = $content = '';

		if ($settings['name'] != '') {
			$name = '<h5 class="name">'.$settings['name'].'</h5>';
		}

		if ($settings['position'] != '') {
			$position = '<p class="position">'.$settings['position'].'</p>';
		}
		

		foreach ( $settings['social_icon_list'] as $index => $item ) {
			$target = $item['link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';

			$social .= '<li><a href="' . $item['link']['url'] . '" ' . $target . $nofollow . '>'.\Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $item['social_icon'] ).'</li></a>';
		}

		if ($settings['show_social'] == 'yes') {

			$social_html = '<ul class="social">'.$social.'</ul>';
		} else $social_html ='';
		$image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );


			$image_html = sprintf( '<div class="image-team">
									<div class="inner-image">%1$s </div>									
								</div>', $image  );
			$content = sprintf( '<div class="wrap-team">
								%1$s
								<div class="content">
								<div class="content-left">
								%2$s
								%3$s
								</div>
								<div class="content-right">
								%4$s
								</div>
								</div>
							</div>', $image_html, $name,$position,$social_html );


		echo sprintf ( 
			'<div %1$s> 
				%2$s                
            </div>',
            $this->get_render_attribute_string('tf_team'),
            $content
        );	
		
	}

}