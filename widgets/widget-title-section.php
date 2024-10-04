<?php
class TFTitle_Section_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-title-section';
    }
    
    public function get_title() {
        return esc_html__( 'TF Title Section', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['tf-title-section'];
	}

	public function get_script_depends() {
		return ['split', 'tf-title'];
	}

	protected function register_controls() {
		// Start Tab Setting        
			$this->start_controls_section( 'section_tabs',
	            [
	                'label' => esc_html__('Title Section', 'themesflat-core'),
	            ]
	        );	 
		

			$this->add_control( 
				'animation_heading',
				[
					'label' => esc_html__( 'Enable Animation Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Enable', 'themesflat-core' ),
					'label_off' => esc_html__( 'Disable', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 01', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 02', 'themesflat-core' ),
					],
				]
			);		

			$this->add_control( 
	        	'html_tag',
				[
					'label' => esc_html__( 'HTML Tag', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h3',
					'options' => [
						'h1' => esc_html__( 'H1', 'themesflat-core' ),
						'h2' => esc_html__( 'H2', 'themesflat-core' ),
						'h3' => esc_html__( 'H3', 'themesflat-core' ),
						'h4' => esc_html__( 'H4', 'themesflat-core' ),
						'h5' => esc_html__( 'H5', 'themesflat-core' ),
						'h6' => esc_html__( 'H6', 'themesflat-core' ),
						'span' => esc_html__( 'span', 'themesflat-core' ),
						'p' => esc_html__( 'p', 'themesflat-core' ),
						'div' => esc_html__( 'div', 'themesflat-core' ),
					],
				]
			);		
	

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,	
					'rows' => 10,				
					'default' => wp_kses( 'Our Popular Tours', 'themesflat-core' ),
					'label_block' => true,
				]
			);



			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,					
					'default' => esc_html__( 'Discover the most loved and highly recommended tours chosen by travelers.', 'themesflat-core' ),
					'label_block' => true,
				]
			);	

			$this->add_responsive_control(
				'align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'default' => 'center',
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
						]
					],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section' => 'text-align: {{VALUE}}',
					],
					'condition' => [
						'style' => 'style1'
					]
				]
			);
	        
			$this->end_controls_section();
        // /.End Tab Setting         

		// Start Read More        
			$this->start_controls_section( 
				'section_button',
				[
					'label' => esc_html__('Button', 'themesflat-core'),
				]
			);
			$this->add_control(
				'show_button',
				[
					'label' => esc_html__( 'Show Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			);
			
			$this->add_control( 
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'View All Categories', 'themesflat-core' ),
					'condition' => [
						'show_button'	=> 'yes',
					],
				]
			);
			$this->add_control(
				'link_btn',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
					'condition' => [
						'show_button' => 'yes'
					]
				]
			);
			$this->end_controls_section();
		// /.End Read More	    

	    // Start Style
	        $this->start_controls_section( 'section_style',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-core' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	



			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .heading',
				]
			); 
			

			$this->add_control( 
				'heading_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'color: {{VALUE}}',					
					],
					
				]
			);	
			
			$this->add_responsive_control(
				'heading_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					
				]
			);
			
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_desc',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-title-section .title-section .description',
					
				]
			); 

			$this->add_control( 
				'description_color_desc',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .description' => 'color: {{VALUE}}',					
					],
				]
			);		

			$this->add_responsive_control(
				'description_margin_desc',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section .title-section .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			// Button
			$this->add_control(
				'h_sub_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_sub_button',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-title-section.has-btn .heading-button',
					
				]
				
			); 

			$this->add_control( 
				'color_sub_button',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section.has-btn .heading-button' => 'color: {{VALUE}}',	
						'{{WRAPPER}} .tf-title-section.has-btn .heading-button::after' => 'background: {{VALUE}}',	
										
					],
					
				]
			);

			$this->add_control( 
				'color_button_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-title-section.has-btn .heading-button:hover' => 'color: {{VALUE}}',	
						'{{WRAPPER}} .tf-title-section.has-btn .heading-button:hover::after' => 'background: {{VALUE}}',					
					],
					
				]
			);


			$this->add_responsive_control(
				'margin_sub_button',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-title-section.has-btn .heading-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					
				]
			);		


        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$style_button = $settings['show_button'] == 'yes' ? 'has-btn' : '';

		$this->add_render_attribute( 'tf_title_section', ['id' => "tf-title-section-{$this->get_id()}", 'class' => ['tf-title-section tf-split-text ',$settings['style'], $style_button], 'data-tabid' => $this->get_id()] );

		$animation = ! empty( $settings['hover_animation'] ) ? 'elementor-animation-' . esc_attr( $settings['hover_animation'] . ' inline-block' ) : '';

		$animation_heading = $settings['animation_heading'] == 'yes' ? 'data-splitting' : '';

		$data_heading = sprintf( 'data-title="%1$s"', $settings['heading'] );

		// $stroke_heading = $settings['stroke_heading'] == 'yes' ? $data_heading : '';

		$heading = $description = $sub_title = $button = '';	


		
		if (!empty($settings['link_btn'])) {
			$target = $settings['link_btn']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $settings['link_btn']['nofollow'] ? ' rel="nofollow"' : '';
		}


		
		if ($settings['heading'] != '') {
			$heading = sprintf( '<%1$s class="heading" %3$s>%2$s</%1$s >',$settings['html_tag'], $settings['heading'], $animation_heading);
			// $heading = sprintf( '<%1$s class="heading" >%2$s</%1$s >',$settings['html_tag'], $settings['heading']);
		}

		if ($settings['description'] != '') {
			$description = sprintf( '<div class="description">%1$s</div>', $settings['description'] );
		}


		if ($settings['show_button'] == 'yes') {
			$button = sprintf( '<a href="%2$s" class="heading-button" %3$s %4$s>%1$s </a>', $settings['button_text'], $settings['link_btn']['url'],  $target, $nofollow);
		}
		
		
			$content = sprintf( '
				<div class="title-section">
					%1$s
					<div class="content">
					%2$s
					%3$s
					</div>
				</div>' ,  $heading, $description, $button );
			echo sprintf ( 
				'<div %1$s> 
					%2$s                
				</div>',
				$this->get_render_attribute_string('tf_title_section'),
				$content
			);	
		

		
		
	}

}

