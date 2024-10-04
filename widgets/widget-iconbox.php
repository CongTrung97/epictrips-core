<?php
class TFIconBox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tficonbox';
    }
    
    public function get_title() {
        return esc_html__( 'TF Icon Box', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-iconbox'];
	}

	public function get_script_depends() {
		return [ 'appear','anime' ];
	}


	protected function _register_controls() {
        // Start Icon Box Setting        
			$this->start_controls_section( 
				'section_tficonbox',
	            [
	                'label' => esc_html__('Icon Box', 'themesflat-core'),
	            ]
	        );

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
						'style3' => esc_html__( 'Style 3', 'themesflat-core' ),
						'style4' => esc_html__( 'Style 4', 'themesflat-core' ),
						
					],
				]
			);

			$this->add_control(
				'icon_style',
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
							'icon' => 'fa fa-paint-brush',
						],
						'image' => [
							'title' => esc_html__( 'Image', 'themesflat-core' ),
							'icon' => 'eicon-image',
						],
					],
					'default' => 'icon',
					'toggle' => false,
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'epictrips-icon-deal',
						'library' => 'theme_icon',
					],
					'condition' => [
						'icon_style' => 'icon',
					],
				]
			);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder.jpg",
					],
					'condition' => [
						'icon_style' => 'image',
					],
				]
			);

			$this->add_control(
				'title_text',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Adventure Plan', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'description_text',
				[
					'label' => 'Description',
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Pellentesque habitant morbi tristique senectus netus et malesuada fames ac', 'themesflat-core' ),
				]
			);	
			
			$this->add_control(
				'button_text',
				[
					'label' => 'Button Text',
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'button_url',
				[
					'label' => 'Button link',
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '#', 'themesflat-core' ),
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' => esc_html__( 'Icon button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'icon-vitour-arrow-right2',
						'library' => 'theme_icon',
					],
				]
			);

			// $this->add_control(
			// 	'position',
			// 	[
			// 		'label' => esc_html__( 'Icon Position', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::CHOOSE,
			// 		'default' => 'top',
			// 		'options' => [
			// 			'left' => [
			// 				'title' => esc_html__( 'Left', 'themesflat-core' ),
			// 				'icon' => 'eicon-h-align-left',
			// 			],
			// 			'top' => [
			// 				'title' => esc_html__( 'Top', 'themesflat-core' ),
			// 				'icon' => 'eicon-v-align-top',
			// 			],
			// 			'right' => [
			// 				'title' => esc_html__( 'Right', 'themesflat-core' ),
			// 				'icon' => 'eicon-h-align-right',
			// 			],
			// 		],
			// 	]
			// );
			
	        $this->end_controls_section();
        // /.End Icon Box Setting


	// Start General
		$this->start_controls_section( 
			'section_style_general',
			[
				'label' => esc_html__( 'General', 'themesflat-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		); 

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
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
				'selectors' => [
					'{{WRAPPER}} .tficonbox' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'style' => ['style1']
				]
			]
		);

		$this->add_responsive_control( 
			'padding_general',
			[
				'label' => esc_html__( 'Padding', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tficonbox' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],					
			]
		);	

		$this->add_responsive_control( 
			'margin_general',
			[
				'label' => esc_html__( 'Margin', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tficonbox' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);  


		


		$this->end_controls_section();
    // /.End General 

	// Start Image Style 
		$this->start_controls_section( 
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'themesflat-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'icon_style' => 'image',
				],
			]
		);

		$this->add_control( 
			'image_size_height',
			[
				'label' => esc_html__( 'Width', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tficonbox .wrap-image img ' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control( 
			'image_padding',
			[
				'label' => esc_html__( 'Padding', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tficonbox .wrap-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control( 
			'image_margin',
			[
				'label' => esc_html__( 'Margin', 'themesflat-core' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tficonbox .wrap-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
    // /.End Image

		// Start Icon Style 
		    $this->start_controls_section( 
		    	'section_style_icon',
	            [
	                'label' => esc_html__( 'Icon', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
						'icon_style' => 'icon',
					],
	            ]
	        ); 

			$this->add_control(
				'icon_vertical_style',
				[
					'label' => esc_html__( 'Vertical Align', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'start' => esc_html__( 'Top', 'themesflat-core' ),
						'center' => esc_html__( 'Center', 'themesflat-core' ),
						'end' => esc_html__( 'Bottom', 'themesflat-core' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox' => '-webkit-box-align: {{VALUE}};',
						'{{WRAPPER}} .tficonbox' => '-webkit-align-items: {{VALUE}};',
						'{{WRAPPER}} .tficonbox' => '-ms-flex-align: {{VALUE}};',
						'{{WRAPPER}} .tficonbox' => 'align-items: {{VALUE}};',
					],
					'condition' => [
						'position!' => 'top',
					],
				]
			);

			$this->add_control(
				'icon_line',
				[
					'label' => esc_html__( 'Line', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'block' => esc_html__( 'Show', 'themesflat-core' ),
						'none' => esc_html__( 'Hide', 'themesflat-core' ),
					],
					'default' => 'none',
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon::after ' => 'display: {{VALUE}};',
					],
					'condition' => [
						'position!' => 'top',
					],
				]
			);

			$this->add_control( 
	        	'icon_line_size_height',
				[
					'label' => esc_html__( 'Height', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon::after ' => 'height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_line' => 'block',
					],
				]
			);

			$this->add_control( 
	        	'icon_line_size',
				[
					'label' => esc_html__( 'Line Spacing', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => -300,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon::after ' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'icon_line' => 'block',
					],
				]
			);

			$this->add_control(
				'icon_line_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon::after' => 'background-color: {{VALUE}};',
					],
					'condition' => [
						'icon_line' => 'block',
					],
				]
			);

		

	        
	        $this->add_control( 
	        	'icon_size',
				[
					'label' => esc_html__( 'Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon-inner i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tficonbox .wrap-icon-inner svg,{{WRAPPER}} .tficonbox .wrap-icon-inner img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);


			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .wrap-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 'icon_tabs' );				

				$this->start_controls_tab( 
					'icon_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-core' ),						
					]
				);

				$this->add_control( 
					'icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox .wrap-icon-inner, {{WRAPPER}} .tficonbox .wrap-icon-inner svg,{{WRAPPER}} .tficonbox .wrap-icon-inner i' => 'color: {{VALUE}}; fill: {{VALUE}}',
							'{{WRAPPER}} .tficonbox .wrap-icon .wrap-icon-inner svg path' => 'stroke: {{VALUE}};',
							'{{WRAPPER}} .tficonbox .wrap-icon .wrap-icon-inner svg path' => 'fill: {{VALUE}};',
						],
					]
				);

				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'icon_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-core' ),
					]
				);

				$this->add_control( 
					'icon_color_hover',
					[
						'label' => esc_html__( 'Icon Color', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .tficonbox:hover .wrap-icon-inner, {{WRAPPER}} .tficonbox:hover .wrap-icon-inner i' => 'color: {{VALUE}}; fill: {{VALUE}}',
							'{{WRAPPER}} .tficonbox:hover .wrap-icon .wrap-icon-inner svg path' => 'stroke: {{VALUE}};',
							'{{WRAPPER}} .tficonbox:hover .wrap-icon .wrap-icon-inner svg path' => 'fill: {{VALUE}};',
						],
					]
				);

			

					
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Icon Style

	    // Start Content Style 
		    $this->start_controls_section( 
		    	'section_style_content',
	            [
	                'label' => esc_html__( 'Content', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );  

			$this->add_control(
				'heading_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);		

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .tficonbox .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .title, {{WRAPPER}} .tficonbox .title a' => 'color: {{VALUE}};',
					],
				]
			);	

			

			$this->add_control(
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tficonbox .title a:hover' => 'color: {{VALUE}};',
					],
					'condition' => [
						'link[url]!' => ''
					],
				]
			);	

			$this->add_control(
				'heading_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .tficonbox .description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .description' => 'color: {{VALUE}};',
					]
				]
			);		 
			
			$this->add_responsive_control( 
				'desc_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .tficonbox .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,					
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'selector' => '{{WRAPPER}} .tficonbox .tf-button a',
				]
			);

			$this->add_control(
				'button_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox .tf-button a' => 'color: {{VALUE}};',
					]
				]
			);	
			
			$this->add_control(
				'button_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tficonbox.style3 .tf-button a:hover,{{WRAPPER}} .tficonbox.style4 .tf-button a:hover,{{WRAPPER}} .tficonbox.style5 .tf-button a:hover,{{WRAPPER}} .tficonbox.style6 .tf-button a:hover' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tficonbox.style1:hover .tf-button a' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tficonbox.style2:hover .tf-button a' => 'color: {{VALUE}};',
					]
				]
			);

		    $this->end_controls_section();
    	// /.End Content Style

	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		if (!empty($settings['link'])) {
			$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
		}


		$migrated = isset( $settings['__fa4_migrated']['icon_button'] );	
		$is_new = empty( $settings['icon_bt'] );

		if ($settings['image'] != '') {
			$url = esc_attr($settings['image']['url']);
			$image = sprintf( '<img src="%1s" alt="image">',$url);
		}

		?>
		<?php if ($settings['style'] == 'style3') { ?>
			<div class="tficonbox <?php //echo esc_attr($settings['position']); ?> <?php echo esc_attr($settings['style']); ?>">
				<div class="content-top">
					<?php if ($settings['icon_style'] == 'icon'): ?>
						<div class="wrap-icon ">
							<div class="wrap-icon-inner  <?php echo esc_attr($settings['icon_style']); ?> ">
								<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							</div>
						</div>
					<?php elseif($settings['icon_style'] == 'image'): ?>
						<div class="wrap-image">
							<?php echo $image; ?>
						</div>
					<?php endif; ?>
					<?php if ($settings['title_text'] != '') { ?>
						<h4 class="title"><?php echo esc_attr($settings['title_text']); ?></h4>
					<?php } ?>
				</div>

				<div class="content">
					<div class="inner">
						
						<?php if ($settings['description_text'] != '') { ?>
							<?php echo sprintf('<div class="description">%s</div>', $settings['description_text']); ?>
						<?php } ?>
						<?php if ($settings['button_text'] != '') { ?>
						<div class="tf-button"><a href="<?php echo esc_attr($settings['button_url']); ?>"><?php echo esc_attr($settings['button_text']); ?><?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="tficonbox <?php //echo esc_attr($settings['position']); ?> <?php echo esc_attr($settings['style']); ?>">
				<?php if ($settings['icon_style'] == 'icon'): ?>
					<div class="wrap-icon ">
						<div class="wrap-icon-inner  <?php echo esc_attr($settings['icon_style']); ?> ">
							<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</div>
					</div>
				<?php elseif($settings['icon_style'] == 'image'): ?>
					<div class="wrap-image">
						<?php echo $image; ?>
					</div>
				<?php endif; ?>

				<div class="content">
					<div class="inner">
						<?php if ($settings['title_text'] != '') { ?>
							<h4 class="title"><?php echo esc_attr($settings['title_text']); ?></h4>
						<?php } ?>
						<?php if ($settings['description_text'] != '') { ?>
							<?php echo sprintf('<div class="description">%s</div>', $settings['description_text']); ?>
						<?php } ?>
						<?php if ($settings['button_text'] != '' ) { ?>
						<div class="tf-button"><a href="<?php echo esc_attr($settings['button_url']); ?>"><?php echo esc_attr($settings['button_text']); ?><?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php }  ?>
		<?php
	}	

}