<?php
class TFAccordion_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfaccordion';
    }
    
    public function get_title() {
        return esc_html__( 'TF Accordion', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return [ 'tf-accordion' ];
	}

    public function get_script_depends() {
		return [ 'tf-accordion' ];
	}

	protected function _register_controls() {
        // Start Accordion        
			$this->start_controls_section( 
				'section_accordion',
	            [
	                'label' => esc_html__('Accordion', 'themesflat-core'),
	            ]
	        );	

	    	$this->add_control( 'heading_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			$this->add_control( 'icon_style',
				[
					'label' => esc_html__( 'Icon Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'none' => [
							'title' => esc_html__( 'None', 'themesflat-core' ),
							'icon' => 'fa fa-ban',
						],
						'icon' => [
							'title' => esc_html__( 'Icon', 'themesflat-core' ),
							'icon' => 'eicon-favorite',
						],
						'image' => [
							'title' => esc_html__( 'Image', 'themesflat-core' ),
							'icon' => 'eicon-image',
						],
					],
					'default' => 'icon',
				]
			);	

			$this->add_control( 
				'icon_position',
				[
					'label' => esc_html__( 'Icon Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'icon_after',
					'options' => [
						'icon_before'  => esc_html__( 'Left', 'themesflat-core' ),
						'icon_after' => esc_html__( 'Right', 'themesflat-core' ),
						'icon_before_after' => esc_html__( 'Both side', 'themesflat-core' ),
					],
					'condition' => [
						'icon_style!' => 'none',
					],
				]
			);

			$this->add_control( 'icon_accodion',
				[
					'label' => esc_html__( 'Left Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion4',
					'default' => [
						'value' => 'fas fa-plus',
						'library' => 'solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion',
				[
					'label' => esc_html__( 'Left Icon Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'icon_accodion_active',
				[
					'label' => esc_html__( 'Left Icon Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion_active4',
					'default' => [
						'value' => 'fas fa-minus',
						'library' => 'solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_active',
				[
					'label' => esc_html__( 'Left Icon Image Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);


			$this->add_control( 'icon_accodion_right',
				[
					'label' => esc_html__( 'Right Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion4_right',
					'default' => [
						'value' => 'fas fa-plus',
						'library' => 'solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_right',
				[
					'label' => esc_html__( 'Right Icon Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'icon_accodion_right_active',
				[
					'label' => esc_html__( 'Right Icon Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_accodion_active4_right',
					'default' => [
						'value' => 'fas fa-minus',
						'library' => 'solid',
					],
					'condition' => [
	                    'icon_style' => 'icon',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

			$this->add_control( 'image_accodion_right_active',
				[
					'label' => esc_html__( 'Right Icon Image Active', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
	                    'icon_style' => 'image',
	                    'icon_position' => ['icon_after', 'icon_before_after'],
	                ],
				]
			);

	        $repeater = new \Elementor\Repeater();
	        	$repeater->add_control( 'set_active',
					[
						'label' => esc_html__( 'Set Active Item', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'label_on' => esc_html__( 'Yes', 'themesflat-core' ),
						'label_off' => esc_html__( 'No', 'themesflat-core' ),
						'return_value' => 'active',
						'default' => 'inactive',
					]
				);		        
		        $repeater->add_control( 'list_title', [
						'label' => esc_html__( 'Nav text', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( '01. How do I book a trip on your website?' , 'themesflat-core' ),
						'label_block' => true,
					]
				);
				$repeater->add_control( 'heading_content',
					[
						'label' => esc_html__( 'Content', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				$repeater->add_control( 'list_content_text_type',
					[
						'label' => esc_html__( 'Content type', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'editor',
						'options' => [
							'editor'  => esc_html__( 'Editor', 'themesflat-core' ),
							'template' => esc_html__( 'Template', 'themesflat-core' ),
						],
					]
				);	
				$repeater->add_control( 'list_content', [
						'label' => esc_html__( 'Content text', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." , 'themesflat-core' ),
						'label_block' => true,
						'condition' => [
	                        'list_content_text_type' => 'editor',
	                    ],
					]
				);
				$repeater->add_control( 'list_content_template',
					[
						'label' => esc_html__( 'Choose Template', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' => ThemesFlat_Addon_For_Elementor_vitour::tf_get_template_elementor(),
						'condition' => [
	                        'list_content_text_type' => 'template',
	                    ],
					]
				);
		        $this->add_control( 'accordion_list',
					[					
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'default' => [
							[	
								'set_active' => 'inactive',
								'list_title' => esc_html__( '01. How Do I Book A Trip On Your Website?', 'themesflat-core' ),
								'list_content' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." ),
							],
							[
								'set_active' => 'active',
								'list_title' => esc_html__( '02. What Payment Methods Do You Accept?', 'themesflat-core' ),
								'list_content' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." ),
							],
							[
								'set_active' => 'inactive',
								'list_title' => esc_html__( '03. Can I Make Changes To My Reservation After Booking?', 'themesflat-core' ),
								'list_content' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." ),
							],
							[
								'set_active' => 'inactive',
								'list_title' => esc_html__( '04. What Is Your Cancellation Policy?', 'themesflat-core' ),
								'list_content' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." ),
							],
							[
								'set_active' => 'inactive',
								'list_title' => esc_html__( '05. Do You Offer Group Booking Discounts?', 'themesflat-core' ),
								'list_content' => esc_html__( "Once your account is set up and you've familiarized yourself with the platform, you are ready to start using our services. Whether it's accessing specific features, making transactions, or utilizing our tools, you'll find everything you need at your fingertips." ),
							],
						
						],
						'title_field' => '{{{ list_title }}}',
					]
				);

			$this->end_controls_section();
        // /.End Accordion		

		// Start General Style 
	        $this->start_controls_section( 
	        	'section_style_general',
	            [
	                'label' => esc_html__( 'General', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	         $this->add_control(
				'wrap_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-core' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'default' => 'left',
					'selectors' => [
						'{{WRAPPER}} .tf-accordion' => 'text-align: {{VALUE}}',
					],
				]
			);
	        
	        $this->end_controls_section();    
	    // /.End General Style

        // Start Icon Style 
	        $this->start_controls_section( 
	        	'section_style_icon',
	            [
	                'label' => esc_html__( 'Icon', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );
	        $this->add_control(
				'heading_icon_left',
				[
					'label' => esc_html__( 'Icon Left', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
	                    'icon_position' => ['icon_before', 'icon_before_after'],
	                ],
				]
			);			

			$this->add_responsive_control(
				'icon_font_size',
				[
					'label' => esc_html__( 'Icon Font Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-icon' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-accordion .accordion-title svg' => 'width: {{SIZE}}{{UNIT}};',
					],
					
				]
			);		
			
			$this->add_control( 
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-title .accordion-icon' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-accordion .accordion-title  svg' => 'fill: {{VALUE}}',
					]
				]
			); 		
	        
	        $this->end_controls_section();    
	    // /.End Icon Style

	    // Start Title Style 
	        $this->start_controls_section( 
	        	'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-accordion .tf-accordion-item .title-text',
				]
			);			 

			$this->add_control( 'title_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-accordion .tf-accordion-item .title-text' => 'color: {{VALUE}}',
							],
						]
					);	
	        
	        $this->end_controls_section();    
	    // /.End Title Style

	    // Start Content Style 
	        $this->start_controls_section( 
	        	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control( 'content_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' => 'color: {{VALUE}}',
					],
				]
			);	        		
    		
			
	        $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'content_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .accordion-content' ,
						'{{WRAPPER}} .tf-accordion .accordion-content p' ,
					],
				]
			);

			$this->add_control( 
				'icon_color2',
				[
					'label' => esc_html__( 'Color Shape Bottom', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-accordion .tf-accordion-item::before' => 'border-bottom-color: {{VALUE}}',
					]
				]
			); 	
			

	     	$this->end_controls_section(); 
	    // /.End Content Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$accordion_item = $html_title = $icon_title = $icon_accodion_close = $icon_accodion_open = $icon_accodion_right_close = $icon_accodion_right_open = $html_content = $set_active = '';		

		foreach ($settings['accordion_list'] as $key => $value) {


			if ( $settings['icon_style'] == 'icon' ) {
				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_close =  \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon_accodion'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_close =  \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon_accodion_right'] );
				}

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_open =  \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon_accodion_active'] );
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_open =  \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon_accodion_right_active'] );
				}

			} else if( $settings['icon_style'] == 'image' ) {
				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_close = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion']['url'] ); 
				}
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_close = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_right']['url'] );
				}

				if ( $settings['icon_position'] == 'icon_before' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_open = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_active']['url'] ); 
				} 
				if ( $settings['icon_position'] == 'icon_after' || $settings['icon_position'] == 'icon_before_after' ) {
					$icon_accodion_right_open = sprintf( '<img src="%1$s" alt=""/>', $settings['image_accodion_right_active']['url'] );
				}
			}

			if ( $settings['icon_style'] != 'none' ) {
				$icon_title = sprintf('		
				<span class="wrap-accordion-icon wrap-accordion-icon-left">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
				, $icon_accodion_close, $icon_accodion_open );

				$icon_title_right = sprintf('		
				<span class="wrap-accordion-icon wrap-accordion-icon-right">		
				<span class="accordion-icon accordion-icon-close">%1$s</span>
				<span class="accordion-icon accordion-icon-open">%2$s</span>
				</span>'
				, $icon_accodion_right_close, $icon_accodion_right_open );
			}

			if ($value['list_title'] != '') {
				if ($settings['icon_position'] == 'icon_before_after') {
					$html_title = sprintf('<div class="accordion-title %4$s %5$s">%2$s <span class="title-text">%1$s</span> %3$s</div>', $value['list_title'], $icon_title, $icon_title_right, $settings['icon_position'], $value['set_active']);
				}else if ($settings['icon_position'] == 'icon_before') {
					$html_title = sprintf('<div class="accordion-title %3$s %4$s">%2$s <span class="title-text">%1$s</span></div>', $value['list_title'], $icon_title, $settings['icon_position'], $value['set_active']);
				}else{
					$html_title = sprintf('<div class="accordion-title %3$s %4$s"><span class="title-text">%1$s</span> %2$s</div>', $value['list_title'], $icon_title_right, $settings['icon_position'], $value['set_active']);
				}
				
			}


			if ( $value['list_content_text_type'] == 'template' ) {

				if ( !empty($value['list_content_template']) ) {
		            $frontend = new \Elementor\Frontend;
		            $html_content = sprintf('<div class="accordion-content">%1$s</div>', $frontend->get_builder_content_for_display($value['list_content_template'], true));
		        }
			}else {
				$html_content = sprintf('<div class="accordion-content">%1$s</div>', do_shortcode( $value['list_content'] ));
			}			

			$accordion_item .= sprintf('<div class="tf-accordion-item %3$s">%1$s %2$s</div>', $html_title, $html_content, $value['set_active']);
		}


		echo sprintf ( 
			'<div class="tf-accordion"> 
				%1$s
            </div>',
            $accordion_item
        );
		
	}	

}