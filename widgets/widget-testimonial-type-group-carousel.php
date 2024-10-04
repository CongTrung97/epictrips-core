<?php
class TFTestimonialTypeGroupCarousel_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-testimonial-carousel-type-group';
    }
    
    public function get_title() {
        return esc_html__( 'TF Testimonial Carousel', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['swiper-min','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['swiper-min','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('Testimonial Carousel', 'themesflat-core'),
	            ]
	        );	

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style4',
					'options' => [
						'style4' => esc_html__( 'Style 1', 'themesflat-core' ),
						'style1' => esc_html__( 'Style 2', 'themesflat-core' ),
						'style2' => esc_html__( 'Style 3', 'themesflat-core' ),
					],
				]
			);

			$this->add_control(
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
					],
					// 'selectors' => [
					// 	'{{WRAPPER}} .tf-testimonial' => 'text-align: {{VALUE}};',
					// ],
					// 'condition' => [
					// 	'style' => 'style1',
					// ],
				]
			);
			
			

			$this->add_control( 
				'show_icon',
				[
					'label' => esc_html__( 'Show Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'style' => ['style4','style1'],
					],
				]
			);
			

			$this->add_control(
				'icon_quote',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-quote-right',
						'library' => 'solid',
					],
					'condition' => [
						'style' => ['style4','style1'],
					],
				]
			);	 


			$this->add_control( 
				'show_rating',
				[
					'label' => esc_html__( 'Show Rating', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/testimonial-img.jpg",
					],
					'description' => 'Only working by style 1 and style 2'
					
				]
			);

			$this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => wp_kses_post( 'What They Are Say!', 'themesflat-core' ),
					'label_block' => true,
					'description' => 'Only working by style 1'
				]
			);

			$repeater->add_control(
				'rating',
				[
					'label' => esc_html__( 'Rating (Only style 1 and 3)', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '100',
					'options' => [
						'0'   => esc_html__( '0 stars', 'themesflat-core' ),
						'20'  => esc_html__( '1 star', 'themesflat-core' ),
						'40'  => esc_html__( '2 stars', 'themesflat-core' ),
						'60'  => esc_html__( '3 stars', 'themesflat-core' ),
						'80'  => esc_html__( '4 stars', 'themesflat-core' ),
						'100' => esc_html__( '5 stars', 'themesflat-core' ),
					],
					
				]
			);

			$repeater->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'rows' => 10,
					'default' => esc_html__( "I've used this travel booking site multiple times and have never been disappointed. The search filters are great for narrowing down options, and the prices are always competitive.", 'themesflat-core' ),
				]
			);	

			

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Pete Jones', 'themesflat-core' ),
					'description' => 'Only working by style 1 and style 3'
				]
			);

			$repeater->add_control(
				'position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Founder, Themesflat', 'themesflat-core' ),
					'description' => 'Only working by style 1 and style 3'
				]
			);

			$repeater->add_control(
				'avatar',
				[
					'label' => esc_html__( 'Choose Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/team-1.jpg",
					],
					'description' => 'Only working by style 2 and style 3'
				]
			);

			// $repeater->add_control(
			// 	'img_icon',
			// 	[
			// 		'label' => esc_html__( 'Choose Image Icon', 'themesflat-core' ),
			// 		'type' => \Elementor\Controls_Manager::MEDIA,
			// 		'default' => [
			// 			'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/team-1.jpg",
			// 		],
					
			// 	]
			// );

           
		

			$this->add_control( 
				'carousel_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[ 
							'name' => 'Pete Jones',
							'position' => 'Founder, Themesflat',
							'description'=> "I've used this travel booking site multiple times and have never been disappointed. The search filters are great for narrowing down options, and the prices are always competitive.",
						],
						[ 
							'name' => 'Jane Cooper',
							'position' => 'NewYork, USA',
							'description'=> '"This travel site is my go-to for booking adventures. The range of tour options is fantastic, and I appreciate the detailed descriptions and reviews that help me make informed decisions.”',
						],
						[ 
							'name' => 'Annette Black',
							'position' => 'NewYork, USA',
							'description'=> "I've used this travel booking site multiple times and have never been disappointed. The search filters are great for narrowing down options, and the prices are always competitive.",
						],
					],					
				]
			);

			$this->add_control(
				'h_image_size_avatar',
				[
					'label' => esc_html__( 'Image Size Avatar', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_avatar',
					'default' => 'full',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail_image',
					'default' => 'full',
				]
			);

			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style        
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'themesflat-core'),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

	        $this->add_control(
				'h_general',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
				]
			);

			
			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'style!' => ['style4'],
					],
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_heading',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial .heading',
					'condition' => [
						'style!' => ['style4'],
					],
				]
			); 
			$this->add_control( 
				'color_heading',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .heading' => 'color: {{VALUE}}',					
					],
					'condition' => [
						'style!' => ['style4'],
					],
				]
			);


	        $this->add_control(
				'h_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'icon_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .icon-quote i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-testimonial .icon-quote svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .icon-quote' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-testimonial .icon-quote svg' => 'fill: {{VALUE}}',
					],
				]
			);

	        $this->add_control(
				'h_name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial .name',
				]
			);
			$this->add_control(
				'name_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .name' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'margin_name',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);	
			
			$this->add_control(
				'h_position',
				[
					'label' => esc_html__( 'Position', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'position_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial .position',
				]
			);
			$this->add_control(
				'position_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .position' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'margin_position',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .position' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-testimonial .description',
				]
			);
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .description' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'margin_description',
				[
					'label' => esc_html__( 'Margin', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-testimonial .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	        $this->end_controls_section();
        // /.End Style

        // Start Arrow        
			$this->start_controls_section( 
				'section_arrow',
	            [
	                'label' => esc_html__('Pagination', 'themesflat-core'),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
					'condition' => [
						'style' => ['style3','style2','style4']
					]
	            ]
	        );

	        $this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Pagination', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',				
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
					'condition' => [
						'style' => ['style3','style2','style4']
					]
				]
			);

	       
	        $this->end_controls_section();
        // /.End Arrow
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
	

		$icon_quote = \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $settings['icon_quote'], [ 'aria-hidden' => 'true' ] );

		?>

		<?php if($settings['style'] == 'style1') { ?>
			<div  class="tf-testimonial <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['text_align']); ?>">
				
				<div class="swiper testimonial-swiper-content">
					<div class="swiper-wrapper">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="wrap-image">
										<?php if ($carousel['image']['id']): ?>
											<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['image']['id'], 'thumbnail_image', $settings )); ?>" alt="image">
										<?php else: ?>
											<img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
										<?php endif ?>	
										<?php if ( $settings['show_icon'] == 'yes' ) { ?><?php if ($icon_quote != '') { echo '<div class="icon-quote">' . $icon_quote . '</div>'; } ?> <?php } ?>
									</div>
									<div class="wrap-content">
										<?php if ($settings['show_rating'] == 'yes'): ?>
											<div class="rating">
												<span class="testimonial-star-rating"><span style="width:<?php echo esc_attr($carousel['rating']); ?>%"></span></span>
											</div>
										<?php endif; ?>									
										<?php if ($carousel['description'] != '') { ?> <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div> <?php } ?>
									</div>									
								</div>
							</div>
						<?php endforeach;?>
					</div>
					
				</div>
				<?php if ( $settings['carousel_arrow'] == 'yes' ) { ?>
						<!-- <div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div> -->
					<?php } ?>
				<div thumbsSlider="" class="swiper testimonial-swiper-thumb">
					<div class="swiper-wrapper">
					<?php foreach ($settings['carousel_list'] as $carousel): ?>	
						<div class="swiper-slide">
							<div class="avatar">
								<?php if ($carousel['avatar']['id']): ?>
									<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['avatar']['id'], 'thumbnail_avatar', $settings )); ?>" alt="avatar">
								<?php else: ?>
									<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
								<?php endif ?>										
							</div>
							
						</div>
					<?php endforeach;?>
					</div>
					
				</div>				
			</div>
		<?php } elseif ($settings['style'] == 'style2') { ?>
			<div  class="tf-testimonial <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['text_align']); ?>">
				<div class="swiper testimonial-swiper-slider2">
					<div class="swiper-wrapper">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="swiper-slide">
								<div class="wrap-content">
									
									<?php if ($settings['show_rating'] == 'yes'): ?>
										<div class="rating">
											<span class="testimonial-star-rating"><span style="width:<?php echo esc_attr($carousel['rating']); ?>%"></span></span>
										</div>
									<?php endif; ?>
									<?php if ($carousel['description'] != '') { ?> <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div> <?php } ?>

									<div class="wrap-infor">
										<div class="wrap-avatar">
											<div class="avatar">
												<?php if ($carousel['avatar']['id']): ?>
													<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['avatar']['id'], 'thumbnail_avatar', $settings )); ?>" alt="avatar">
												<?php else: ?>
													<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="avatar">
												<?php endif ?>										
											</div>
											<div class="infor">
											<?php if ($carousel['name'] != '') { ?> <div class="name"><?php echo esc_attr($carousel['name']); ?></div> <?php } ?>
												<?php if ($carousel['position'] != '') { ?> <div class="position"><?php echo esc_attr($carousel['position']); ?></div> <?php } ?>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						<?php endforeach;?>
					</div>
					
				</div>
				<?php if ( $settings['carousel_arrow'] == 'yes' ) { ?>
						<!-- <div class="swiper-button-next swiper-button-next2"></div>
						<div class="swiper-button-prev swiper-button-prev2"></div> -->
						<div class="swiper-pagination swiper-pagination2"></div>
					<?php } ?>

				
			</div>
		<?php } elseif ($settings['style'] == 'style4') { ?>
			<div  class="tf-testimonial <?php echo esc_attr($settings['style']); ?> <?php echo esc_attr($settings['text_align']); ?>">
				
				<div class="swiper testimonial-swiper-slider4">
					<div class="swiper-wrapper">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>			
							<div class="swiper-slide">
								<div class="testimonial-item">
									<div class="wrap-image">
										<?php if ($carousel['image']['id']): ?>
											<img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['image']['id'], 'thumbnail_image', $settings )); ?>" alt="image">
										<?php else: ?>
											<img src="<?php echo esc_attr($carousel['image']['url']); ?>" alt="image">
										<?php endif ?>	
										<?php if ( $settings['show_icon'] == 'yes' ) { ?><?php if ($icon_quote != '') { echo '<div class="icon-quote">' . $icon_quote . '</div>'; } ?> <?php } ?>
									</div>
									<div class="wrap-content">
										<?php if ($settings['heading']): ?>
											<div class="heading"><?php echo sprintf( '%1$s', $settings['heading'] ); ?></div>
										<?php endif; ?>
										<?php if ($settings['show_rating'] == 'yes'): ?>
											<div class="rating">
												<span class="testimonial-star-rating"><span style="width:<?php echo esc_attr($carousel['rating']); ?>%"></span></span>
											</div>
										<?php endif; ?>
										<?php if ($carousel['description'] != '') { ?> <div class="description"><?php echo sprintf( '%1$s', $carousel['description'] ); ?></div> <?php } ?>
										<div class="wrap-avatar">											
											<div class="infor">
											<?php if ($carousel['name'] != '') { ?> <div class="name"><?php echo esc_attr($carousel['name']); ?></div> <?php } ?>
												<?php if ($carousel['position'] != '') { ?> <div class="position"><?php echo esc_attr($carousel['position']); ?></div> <?php } ?>
											</div>
										</div>
																		
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>
					
				</div>
				<?php if ( $settings['carousel_arrow'] == 'yes' ) { ?>
						<!-- <div class="swiper-button-next swiper-button-next4"></div>
						<div class="swiper-button-prev swiper-button-prev4"></div> -->
						<div class="swiper-pagination swiper-pagination4"></div>
					<?php } ?>
			</div>
		<?php
		}
	}

}