<?php
class TFVideo_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf_video_popup';
    }
    
    public function get_title() {
        return esc_html__( 'TF Video', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-youtube';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['magnific-popup','tf-video'];
	}

	public function get_script_depends() {
		return ['magnific-popup','tf-video'];
	}

	protected function register_controls() {
		// Start Tab Video        
			$this->start_controls_section( 'section_video',
	            [
	                'label' => esc_html__('Video', 'themesflat-core'),
	            ]
	        );

	        $this->add_control(
				'video_type',
				[
					'label' => esc_html__( 'Source', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'youtube',
					'options' => [
						'youtube' => esc_html__( 'YouTube', 'themesflat-core' ),
						'vimeo' => esc_html__( 'Vimeo', 'themesflat-core' ),
					],
				]
			);
	        $this->add_control(
				'youtube_url',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter your URL', 'themesflat-core' ) . ' (YouTube)',
					'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
					'label_block' => true,
					'condition' => [
						'video_type' => 'youtube',
					],
				]
			);

			$this->add_control(
				'vimeo_url',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter your URL', 'themesflat-core' ) . ' (Vimeo)',
					'default' => 'https://vimeo.com/235215203',
					'label_block' => true,
					'condition' => [
						'video_type' => 'vimeo',
					],
				]
			);

			$this->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-play',
						'library' => 'theme_icon',
					],
				]
			);
     
	        
			$this->end_controls_section();
        // /.End Tab Video

        // Start General
	        $this->start_controls_section( 'section_general',
	            [
	                'label' => esc_html__( 'General', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 
	        $this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Left', 'themesflat-core' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-core' ),
							'icon' => 'eicon-text-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'themesflat-core' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'default' => 'center',
					'toggle' => true,
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup' => 'justify-content: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'border_width',
				[
					'label' => esc_html__( 'Border Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 20,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .wrap-icon' => 'border-width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf_ani-pulsebox-4:before' => 'border-width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'border_style',
				[
					'label' => esc_html__( 'Border Type', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'solid',
					'options' => [
						'solid' => esc_html__( 'Solid', 'themesflat-core' ),
						'double' => esc_html__( 'Double', 'themesflat-core' ),
						'dotted' => esc_html__( 'Dotted', 'themesflat-core' ),
						'dashed' => esc_html__( 'Dashed', 'themesflat-core' ),
						'groove' => esc_html__( 'Groove', 'themesflat-core' ),
					],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .wrap-icon' => 'border-style: {{VALUE}}',
						'{{WRAPPER}} .tf_ani-pulsebox-4:before' => 'border-style: {{VALUE}}',
					],
				]
			);
			$this->add_control( 
				'border_color',
				[
					'label' => esc_html__( 'Border Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#fff',
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .wrap-icon' => 'border-color: {{VALUE}}',
						'{{WRAPPER}} .tf_ani-pulsebox-4:before' => 'border-color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'default' => [
						'top' => '50',
						'right' => '50',
						'bottom' => '50',
						'left' => '50',
						'unit' => '%',
						'isLinked' => true,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .wrap-icon, {{WRAPPER}} .tf-video-popup .video-icon,{{WRAPPER}} .tf-video-popup .wrap-icon::after ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf_ani-linear-gradient:before, {{WRAPPER}} .tf_ani-linear-gradient:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf_ani-pulsebox-4:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			
			$this->add_responsive_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .wrap-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	
			$this->add_control(
				'tf_animation',
				[
					'label' => esc_html__( 'Animation', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'tf_ani-default',
					'options' => [
						'tf_ani-default' => esc_html__( 'Default', 'themesflat-core' ),
						'tf_ani-linear-gradient' => esc_html__( 'Linear Gradient', 'themesflat-core' ),
						'tf_ani-pulsebox-1' => esc_html__( 'Pulse Box 1', 'themesflat-core' ),
						'tf_ani-pulsebox-2' => esc_html__( 'Pulse Box 2', 'themesflat-core' ),
						'tf_ani-pulsebox-3' => esc_html__( 'Pulse Box 3', 'themesflat-core' ),
						'tf_ani-pulsebox-3' => esc_html__( 'Pulse Box 3', 'themesflat-core' ),
						'tf_ani-pulsebox-4' => esc_html__( 'Pulse Box 4', 'themesflat-core' ),
					]
				]
			);		
	    	$this->end_controls_section();    
	    // /.End General       

	    // Start Icon Video
	        $this->start_controls_section( 'section_icon_video',
	            [
	                'label' => esc_html__( 'Icon Video', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );
	        $this->add_responsive_control(
				'size',
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
					'default' => [
						'unit' => 'px',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .video-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 40,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .video-icon' => 'font-size: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .tf-video-popup .video-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'margin_icon',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-video-popup .video-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon' => 'color: {{VALUE}}; fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'icon_background',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon' => 'background-color: {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'border_width_icon',
						[
							'label' => esc_html__( 'Border Size', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 20,
									'step' => 1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 0,
							],
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon' => 'border-width: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'border_style_icon',
						[
							'label' => esc_html__( 'Border Type', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'solid',
							'options' => [
								'solid' => esc_html__( 'Solid', 'themesflat-core' ),
								'double' => esc_html__( 'Double', 'themesflat-core' ),
								'dotted' => esc_html__( 'Dotted', 'themesflat-core' ),
								'dashed' => esc_html__( 'Dashed', 'themesflat-core' ),
								'groove' => esc_html__( 'Groove', 'themesflat-core' ),
							],
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon' => 'border-style: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'border_color_icon',
						[
							'label' => esc_html__( 'Border Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon' => 'border-color: {{VALUE}}',
							],
						]
					);	

					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow',
							'label' => esc_html__( 'Box Shadow', 'plugin-domain' ),
							'selector' => '{{WRAPPER}} .tf-video-popup .video-icon',
						]
					);
					
					$this->add_control( 
						'icon_color_line',
						[
							'label' => esc_html__( 'Color Line ', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup  .wrap-icon::after' => 'border-color: {{VALUE}}',
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
							'label' => esc_html__( 'Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon:hover' => 'color: {{VALUE}}; fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'icon_background_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon:hover' => 'background-color: {{VALUE}};',
							],
						]
					);				

					$this->add_control( 
						'border_color_icon_hover',
						[
							'label' => esc_html__( 'Border Color', 'themesflat-core' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-video-popup .video-icon:hover' => 'border-color: {{VALUE}}',
							],
						]
					);							
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();   
			        
        	$this->end_controls_section();    
	    // /.End Icon Video 

	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_video_popup', ['id' => "tf-video-popup-{$this->get_id()}", 'class' => ['tf-video-popup'], 'data-tabid' => $this->get_id()] );

		$blurred_text = $icon = $video_url = '';

		$video_url = $settings[ $settings['video_type'] . '_url' ];

		$icon = \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ]);


        echo sprintf ( 
			'<div %1$s>
				<div class="wrap-icon">				
					<a class="video-icon popup-video %4$s" href="%2$s">%3$s</a>
				</div>				
            </div>',
            $this->get_render_attribute_string('tf_video_popup'),
            $video_url,
            $icon,
            $settings['tf_animation']
        );	
		
	}

}