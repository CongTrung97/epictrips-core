<?php
class TFListCarousel extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list-carousel';
    }
    
    public function get_title() {
        return esc_html__( 'TF Features Carousel', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	public function get_script_depends() {
		return ['owl-carousel','tf-testimonial'];
	}

	protected function register_controls() {
        // Start Carousel Setting        
			$this->start_controls_section( 
				'section_carousel',
	            [
	                'label' => esc_html__('TF Slider  Listing', 'themesflat-core'),
	            ]
	        );	

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'media',
				[
					'label' => esc_html__( 'Media', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/placeholder-2.jpg",
					],
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Name', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Chevrolet Suburban 2021 mo', 'themesflat-core' ),
				]
			);

			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-core' ),
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
					],
				]
			);

			$repeater->add_control(
				'badge',
				[
					'label' => esc_html__( 'Badge', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '28', 'themesflat-core' ),
				]
			);

			$this->add_control( 
				'carousel_list',
				[					
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[ 
							'name' => 'Chevrolet Suburban 2021 mo',
							'badge' => '20',
						],
						[ 
							'name' => 'Donald C. Mitchell',
							'badge' => '10',
						],
						[ 
							'name' => 'Chevrolet Suburban 2021 mo',
							'badge' => '28',
						],
						[ 
							'name' => 'Chevrolet Suburban 2021 mo',
							'badge' => '15',
						],
					],					
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'thumbnail',
				]
			);

			$this->add_control(
	        	'layout',
				[
					'label' => esc_html__( 'Columns', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '3',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
					],
				]
			);

			$this->add_control( 
	        	'layout_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
						'3' => esc_html__( '3', 'themesflat-core' ),
					],
				]
			);

			$this->add_control( 
	        	'layout_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-core' ),
						'2' => esc_html__( '2', 'themesflat-core' ),
					],
				]
			);
			
			$this->end_controls_section();
        // /.End Carousel	

        // Start Style        
			$this->start_controls_section( 
				'section_style',
	            [
	                'label' => esc_html__('Style', 'themesflat-core'),
	            ]
	        );	

			$this->add_control(
				'h_before_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_before_title',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-list-carousel .item .name',
				]
			);
			$this->add_control( 
				'color_before_title',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-list-carousel .item .name, {{WRAPPER}} .tf-list-carousel .item .name a' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control(
				'h_heading',
				[
					'label' => esc_html__( 'Badge', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography_heading',
					'label' => esc_html__( 'Typography', 'themesflat-core' ),
					'selector' => '{{WRAPPER}} .tf-list-carousel .item .badge',
				]
			); 
			$this->add_control( 
				'color_heading',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-list-carousel .item .badge' => 'color: {{VALUE}}',					
					],
				]
			);

			$this->add_control( 
				'color_heading_bg',
				[
					'label' => esc_html__( 'BackgroundColor', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .tf-list-carousel .item .badge' => 'background: {{VALUE}}',					
					],
				]
			);

	        $this->end_controls_section();
        // /.End Style

        // Start Bullet        
			$this->start_controls_section( 
				'section_bullet',
	            [
	                'label' => esc_html__('Bullet', 'themesflat-core'),
	            ]
	        );

	        $this->add_control( 
				'carousel_bullet',
				[
					'label' => esc_html__( 'Bullet', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-core' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-core' ),
					'return_value' => 'yes',
					'default' => 'yes',				
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

	        $this->end_controls_section();
        // /.End Bullet
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		?>
		<div class="tf-list-carousel" data-column="<?php echo esc_attr($settings['layout']) ?>" data-column2="<?php echo esc_attr($settings['layout_tablet']) ?>"  data-column3="<?php echo esc_attr($settings['layout_mobile']) ?>"data-loop="true" data-auto="false" data-spacer="24" data-dot="<?php echo esc_attr($settings['carousel_bullet']) ?>">
				<div class="wrap-testimonial">
                	<div class="owl-carousel owl-theme">
						<?php foreach ($settings['carousel_list'] as $carousel): ?>
							<?php 
								$target = $carousel['link']['is_external'] ? ' target="_blank"' : '';
								$nofollow = $carousel['link']['nofollow'] ? ' rel="nofollow"' : '';
								$url = esc_attr($carousel['link']['url']);	
							?>
                            <div class="item">
                                <div class="images">
                                    <?php if ($carousel['media']['id']): ?>
                                        <img src="<?php echo esc_url(\Elementor\Group_Control_Image_Size::get_attachment_image_src( $carousel['media']['id'], 'thumbnail', $settings )); ?>" alt="image">
                                    <?php else: ?>
                                        <img src="<?php echo esc_attr($carousel['media']['url']); ?>" alt="image">
                                    <?php endif ?>
                                </div>
                                <?php if ($carousel['name'] != ''): ?>
                                    <h5 class="name">
										<?php if (!empty($url)): ?>
											<a href="<?php echo $url ?>" <?php echo $target; echo $nofollow; ?>><?php echo esc_attr($carousel['name']); ?></a>
										<?php else: ?> 
											<?php echo esc_attr($carousel['name']); ?>
										<?php endif; ?> 
									</h5>
                                <?php endif; ?> 
                                <?php if ($carousel['badge'] != ''): ?>
                                    <span class="badge">
                                        <?php echo esc_attr($carousel['badge']); ?>
                                    </span>
                                <?php endif; ?> 
                            </div>
					    <?php endforeach;?>
					</div>
				</div>
		</div>
		<?php	
	}

}