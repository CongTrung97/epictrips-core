<?php
if(!class_exists('Flex_Slide_Widget')){
	class Flex_Slide_Widget extends \Elementor\Widget_Base {

		public function get_name() {
	        return 'flex-slider';
	    }
	    
	    public function get_title() {
	        return esc_html__( 'TF E Slider', 'themesflat-core' );
	    }

	    public function get_icon() {
	        return 'eicon-slider-push';
	    }
	    
	    public function get_categories() {
	        return [ 'themesflat_addons' ];
	    }

	    public function get_style_depends(){
		    return ['slide-flexslider','tf-flex-slider'];
		}
	    public function get_script_depends() {
	    	return ['slide-flexslider', 'tf-flex-slider'];
	  	}

		protected function register_controls() {
			/* Start Flex Slide Option*/
				$this->start_controls_section('section_flex_slider',
		            [
		                'label'         => esc_html__('General','themesflat-core'),
		            ]
		        );
		        
				$this->add_control( 'animation_images',
		            [
		                'label' => esc_html__( 'Background Effect', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'Fade', 'themesflat-core' ),
		                    'bg_zoomIn' => esc_html__( 'Zoom In', 'themesflat-core' ),
		                    'bg_zoomOut' => esc_html__( 'Zoom Out', 'themesflat-core' ),
		                ],
		            ]
		        );
		        $this->add_control( 'bg_images_size',
		            [
		                'label' => esc_html__( 'Background Size', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'Default', 'themesflat-core' ),
		                    'auto' => esc_html__( 'Auto', 'themesflat-core' ),
		                    'cover' => esc_html__( 'Cover', 'themesflat-core' ),
		                    'contain' => esc_html__( 'Contain', 'themesflat-core' ),
		                ],
		            ]
		        );
		        $this->add_control( 'bg_images_position',
		            [
		                'label' => esc_html__( 'Background Position', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'Default', 'themesflat-core' ),
		                	'center center' => esc_html__( 'Center Center', 'themesflat-core' ),
		                	'center left' => esc_html__( 'Center Left', 'themesflat-core' ),
		                	'center right' => esc_html__( 'Center Right', 'themesflat-core' ),
		                	'top center' => esc_html__( 'Top Center', 'themesflat-core' ),
		                	'top left' => esc_html__( 'Top Left', 'themesflat-core' ),
		                	'top right' => esc_html__( 'Top Right', 'themesflat-core' ),
		                	'bottom center' => esc_html__( 'Bottom Center', 'themesflat-core' ),
		                	'bottom left' => esc_html__( 'Bottom Left', 'themesflat-core' ),
		                	'bottom right' => esc_html__( 'Bottom Right', 'themesflat-core' ),
		                ],
		            ]
		        );
		        $this->add_control( 'slideshow_autoplay',
		            [
		                'label'         => esc_html__( 'Infinite Loop', 'themesflat-core' ),
		                'type'          => \Elementor\Controls_Manager::SWITCHER,
		                'label_on'      => esc_html__( 'On', 'themesflat-core' ),
		                'label_off'     => esc_html__( 'Off', 'themesflat-core' ),
		                'return_value'  => 'true',
		                'default'       => 'false',
		            ]
		        );
		        $this->add_control( 'slideshowSpeed',
					[
						'label' => esc_html__( 'Duration (ms)', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 1000,
								'max' => 10000,
								'step' => 100,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 3000,
						],
					]
				);
				$this->add_control( 'content_into_grid',
		            [
		                'label'         => esc_html__( 'Content Area Into Grid?', 'themesflat-core' ),
		                'type'          => \Elementor\Controls_Manager::SWITCHER,
		                'label_on'      => esc_html__( 'On', 'themesflat-core' ),
		                'label_off'     => esc_html__( 'Off', 'themesflat-core' ),
		                'return_value'  => 'yes',
		                'default'       => 'yes',
		            ]
		        );
		        $this->add_control( 'content_container',
					[
						'label' => esc_html__( 'Content Area Container Width', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 500,
								'max' => 1600,
								'step' => 1,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 1295,
						],
						'selectors' => [
							'{{WRAPPER}} .flex_caption.container' => 'max-width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'content_into_grid' => 'yes',
		                ]
					]
				);		
		        $repeater = new \Elementor\Repeater();
				$repeater->add_control( 'flexslider_image',
		            [
		                'label'     => esc_html__( 'Image', 'themesflat-core' ), 
		                'type'      => \Elementor\Controls_Manager::MEDIA, 
		                'dynamic' => [
		                    'active' => true,
		                ],
		                'default' => [
		                    'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR_THEME."assets/img/default.jpg",
		                ], 
		            ]
		        );
		        $repeater->add_control( 'color_overlay',
		            [
		                'label'     => esc_html__( 'Color Overlay', 'themesflat-core' ),
		                'type'      => \Elementor\Controls_Manager::COLOR,
		                'default'	=> '',
		            ]
		        ); 
		        $repeater->add_control('title_text',
		        	[
		                'label'   => esc_html__( 'Title', 'themesflat-core' ),
		                'type'    => \Elementor\Controls_Manager::TEXTAREA,
		                'default' => 'Discover The World <br> With Our Tours', 
						
		            ]
		    	);
		    	$repeater->add_control( 'title_animation',
		            [
		                'label' => esc_html__( 'Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'fromTop',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'title_text[value]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'title_delay',
		            [
		                'label' => esc_html__( 'Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'captionDelay6',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'title_text[value]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_1',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
					]
				);
		    	$repeater->add_control('subtitle_text',
		        	[
		                'label'   => esc_html__( 'Subtitle', 'themesflat-core' ),
		                'type'    => \Elementor\Controls_Manager::TEXTAREA,
		                'default' => '',                    
		            ]
		    	); 
		    	$repeater->add_control( 'subtitle_animation',
		            [
		                'label' => esc_html__( 'Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'fromTop',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'subtitle_text[value]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'subtitle_delay',
		            [
		                'label' => esc_html__( 'Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'captionDelay8',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'subtitle_text[value]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_2',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
					]
				);
		    	$repeater->add_control('desc_text',
		        	[
		            'label'         => esc_html__('Desciption','themesflat-core'),
		            'type'        => \Elementor\Controls_Manager::TEXTAREA,
		            'default'     => 'We offer a variety of tours to exotic destinations and cultural experiences with expert <br> guides who share insights into local history.',
		        ]);	
		        $repeater->add_control( 'desc_animation',
		            [
		                'label' => esc_html__( 'Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'fromTop',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'desc_text[value]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'desc_delay',
		            [
		                'label' => esc_html__( 'Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => 'captionDelay2',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'desc_text[value]!' => '',
		                ]
		            ]
		        ); 
		        $repeater->add_control( 'hr_3',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
					]
				);
				$repeater->add_control( 'shape_one', 
		        	[
		                'label' => esc_html__( 'Shape One', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::MEDIA
		            ]
		        );
		        $repeater->add_control( 'index_shape_one',
					[
						'label' => esc_html__( 'z-index Shape One', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => -1,
						'max' => 1000,
						'step' => 1,
						'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_one' => 'z-index: {{SIZE}}',
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ],
					]
				);
		        $repeater->add_responsive_control( 'shape_one_width',
		            [
		                'label' => esc_html__( 'Width Shape One', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_one' => 'width: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_one_height',
		            [
		                'label' => esc_html__( 'Height Shape One', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_one' => 'height: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_one_offset_x',
		            [
		                'label' => esc_html__( 'Offset X Shape One', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_one' => 'left: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_one_offset_y',
		            [
		                'label' => esc_html__( 'Offset Y Shape One', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_one' => 'top: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_control( 'shape_one_animation',
		            [
		                'label' => esc_html__( 'Shape One Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'shape_one_delay',
		            [
		                'label' => esc_html__( 'Shape One Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_one[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_shape_one',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'shape_one[url]!' => '',
		                ]
					]
				);
				$repeater->add_control( 'shape_two', 
		        	[
		                'label' => esc_html__( 'Shape Two', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::MEDIA
		            ]
		        );
		        $repeater->add_control( 'index_shape_two',
					[
						'label' => esc_html__( 'z-index Shape Two', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => -1,
						'max' => 1000,
						'step' => 1,
						'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_two' => 'z-index: {{SIZE}}',
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ],
					]
				);
		        $repeater->add_responsive_control( 'shape_two_width',
		            [
		                'label' => esc_html__( 'Width Shape Two', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_two' => 'width: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_two_height',
		            [
		                'label' => esc_html__( 'Height Shape Two', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_two' => 'height: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_two_offset_x',
		            [
		                'label' => esc_html__( 'Offset X Shape Two', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_two' => 'left: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_two_offset_y',
		            [
		                'label' => esc_html__( 'Offset Y Shape Two', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_two' => 'top: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_control( 'shape_two_animation',
		            [
		                'label' => esc_html__( 'Shape Two Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'shape_two_delay',
		            [
		                'label' => esc_html__( 'Shape Two Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_two[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_shape_two',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'shape_two[url]!' => '',
		                ]
					]
				);
				$repeater->add_control( 'shape_three', 
		        	[
		                'label' => esc_html__( 'Shape Three', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::MEDIA
		            ]
		        );
		        $repeater->add_control( 'index_shape_three',
					[
						'label' => esc_html__( 'z-index Shape Three', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => -1,
						'max' => 1000,
						'step' => 1,
						'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_three' => 'z-index: {{SIZE}}',
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ],
					]
				);
		        $repeater->add_responsive_control( 'shape_three_width',
		            [
		                'label' => esc_html__( 'Width Shape Three', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_three' => 'width: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_three_height',
		            [
		                'label' => esc_html__( 'Height Shape Three', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_three' => 'height: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_three_offset_x',
		            [
		                'label' => esc_html__( 'Offset X Shape Three', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_three' => 'left: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_three_offset_y',
		            [
		                'label' => esc_html__( 'Offset Y Shape Three', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_three' => 'top: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_control( 'shape_three_animation',
		            [
		                'label' => esc_html__( 'Shape Three Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'shape_three_delay',
		            [
		                'label' => esc_html__( 'Shape Three Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_three[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_shape_three',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'shape_three[url]!' => '',
		                ]
					]
				);
				$repeater->add_control( 'shape_four', 
		        	[
		                'label' => esc_html__( 'Shape Four', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::MEDIA
		            ]
		        );
		        $repeater->add_control( 'index_shape_four',
					[
						'label' => esc_html__( 'z-index Shape Four', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => -1,
						'max' => 1000,
						'step' => 1,
						'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_four' => 'z-index: {{SIZE}}',
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ],
					]
				);
		        $repeater->add_responsive_control( 'shape_four_width',
		            [
		                'label' => esc_html__( 'Width Shape Four', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_four' => 'width: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_four_height',
		            [
		                'label' => esc_html__( 'Height Shape Four', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_four' => 'height: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_four_offset_x',
		            [
		                'label' => esc_html__( 'Offset X Shape Four', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_four' => 'left: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_four_offset_y',
		            [
		                'label' => esc_html__( 'Offset Y Shape Four', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_four' => 'top: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_control( 'shape_four_animation',
		            [
		                'label' => esc_html__( 'Shape Four Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'shape_four_delay',
		            [
		                'label' => esc_html__( 'Shape Four Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_four[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'hr_shape_four',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'shape_four[url]!' => '',
		                ]
					]
				);
				$repeater->add_control( 'shape_five', 
		        	[
		                'label' => esc_html__( 'Shape Five', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::MEDIA
		            ]
		        );
		        $repeater->add_control( 'index_shape_five',
					[
						'label' => esc_html__( 'z-index Shape Five', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => -1,
						'max' => 1000,
						'step' => 1,
						'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_five' => 'z-index: {{SIZE}}',
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ],
					]
				);
		        $repeater->add_responsive_control( 'shape_five_width',
		            [
		                'label' => esc_html__( 'Width Shape Five', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_five' => 'width: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_five_height',
		            [
		                'label' => esc_html__( 'Height Shape Five', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => 0,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => 0,
		                        'max' => 100,
		                    ],
		                ],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_five' => 'height: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_five_offset_x',
		            [
		                'label' => esc_html__( 'Offset X Shape Five', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_five' => 'left: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_responsive_control( 'shape_five_offset_y',
		            [
		                'label' => esc_html__( 'Offset Y Shape Five', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SLIDER,
		                'size_units' => [ 'px', '%' ],
		                'range' => [
		                    'px' => [
		                        'min' => -2000,
		                        'max' => 2000,
		                        'step' => 1,
		                    ],
		                    '%' => [
		                        'min' => -200,
		                        'max' => 200,
		                    ],
		                ],	                
		                'default' => [
							'unit' => 'px',
							'size' => 0,
						],
		                'selectors' => [
		                    '{{WRAPPER}} {{CURRENT_ITEM}}_shape_five' => 'top: {{SIZE}}{{UNIT}}',
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ],
		            ]
		        );
		        $repeater->add_control( 'shape_five_animation',
		            [
		                'label' => esc_html__( 'Shape Five Animation', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
		                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
		                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
		                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
		                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
		                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
		                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
		                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
		                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
		                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
		                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
		                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
		                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
		                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
		                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
		                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
		                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
		                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
		                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
		                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
		                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
		                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
		                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
		                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
		                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
		                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
		                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ]
		            ]
		        );
		        $repeater->add_control( 'shape_five_delay',
		            [
		                'label' => esc_html__( 'Shape Five Delay', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::SELECT,
		                'default' => '',
		                'options' => [
		                	'' => esc_html__( 'None', 'themesflat-core' ),
		                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
		                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
		                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
		                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
		                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
		                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
		                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
		                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
		                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
		                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
		                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
		                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
		                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
		                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
		                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
		                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
		                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
		                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
		                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
		                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
		                ],
		                'condition' => [
		                    'shape_five[url]!' => '',
		                ]
		            ]
		        );
		        $this->add_control('flexslider_list',
		            [
		                'label'  => esc_html__('Images Slide','themesflat-core'),
		                'type'   => \Elementor\Controls_Manager::REPEATER,
		                'fields' => $repeater->get_controls(),
		                'default' => [
		                    [ '' => '' ],
		                    [ '' => '' ],
		                    [ '' => '' ]
		                ]
		            ]
		        );
		        $this->end_controls_section();
	        /* End Flex Slide Option*/

	        /* Start Arrow Setting*/
				$this->start_controls_section('section_directionnav',
		            [
		                'label'         => esc_html__('Arrow Setting','themesflat-core'),
		            ]
		        );
		        $this->add_control( 'directionnav',
		            [
		                'label'         => esc_html__( 'Arrow', 'themesflat-core' ),
		                'type'          => \Elementor\Controls_Manager::SWITCHER,
		                'label_on'      => esc_html__( 'On', 'themesflat-core' ),
		                'label_off'     => esc_html__( 'Off', 'themesflat-core' ),
		                'return_value'  => 'true',
		                'default'       => 'true',
		            ]
		        );
		    	$this->add_control( 'prev_icon', [
		                'label' => esc_html__( 'Prev Icon (Not working width svg)', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => ' epictrips-icon-arrow-left',
							'library' => 'theme_icon',
						],
		                // 'type' => \Elementor\Controls_Manager::ICON,
		                // 'default' => 'fa fa-angle-left', 
		                'condition' => [
		                    'directionnav' => 'true',
		                ]
		            ]
		        );
		    	$this->add_control( 'next_icon', [
		                'label' => esc_html__( 'Next Icon (Not working width svg)', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => ' epictrips-icon-arrow-right',
							'library' => 'theme_icon',
						],
		                // 'type' => \Elementor\Controls_Manager::ICON,
		                // 'default' => 'fa fa-angle-right', 
		                'condition' => [
		                    'directionnav' => 'true',
		                ]
		            ]
		        );
		    	
		        $this->add_responsive_control( 'fontsize_directionnav',
					[
						'label' => esc_html__( 'Font Size', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a,{{WRAPPER}} .flexslider .flex-direction-nav i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
		        $this->add_control( 'hr_10',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
		    	$this->add_responsive_control( 'w_size_directionnav',
					[
						'label' => esc_html__( 'Width', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 200,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_responsive_control( 'h_size_directionnav',
					[
						'label' => esc_html__( 'Height', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 200,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);			
				$this->add_control( 'hr_11',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_responsive_control( 'directionnav_horizontal_position_prev',
					[
						'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 2000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a.flex-prev' => 'right: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_responsive_control( 'directionnav_horizontal_position_next',
					[
						'label' => esc_html__( 'Horizontal Position Next', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 2000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a.flex-next' => 'right: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'hr_12',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_responsive_control( 'directionnav_vertical_position',
					[
						'label' => esc_html__( 'Vertical Position Prev', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a.flex-prev' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);

				$this->add_responsive_control( 'directionnav_vertical_position2',
					[
						'label' => esc_html__( 'Vertical Position Next', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a.flex-next' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'directionnav_color',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
		            ]
		        );
		        $this->add_control( 'directionnav_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		               
		                'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
		            ]
		        );
		        $this->add_control( 'directionnav_hover_bg_color',
		            [
		                'label' => esc_html__( 'Hover Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'selectors' => [
							'{{WRAPPER}} .flexslider .flex-direction-nav a:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
						],
						'condition' => [
		                    'directionnav' => 'true',
		                ]
		            ]
		        );
				$this->end_controls_section();
	        /* End Arrow Setting*/

	        /* Start Bullets Setting*/
				$this->start_controls_section('section_controlnav',
		            [
		                'label'         => esc_html__('Bullets Setting','themesflat-core'),
		            ]
		        );
		        $this->add_control( 'controlnav',
		            [
		                'label'         => esc_html__( 'Bullets', 'themesflat-core' ),
		                'type'          => \Elementor\Controls_Manager::SWITCHER,
		                'label_on'      => esc_html__( 'On', 'themesflat-core' ),
		                'label_off'     => esc_html__( 'Off', 'themesflat-core' ),
		                'return_value'  => 'true',
		                'default'       => 'false',
		                'description'	=> 'Just show when you have two slide',
		            ]
		        );	
		        $this->add_responsive_control( 'controlnav_border_radius',
					[
						'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav li a,{{WRAPPER}} .flexslider .flex-control-nav li a::after' => 'border-radius: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'controlnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'hr_7',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);
		    	$this->add_responsive_control( 'w_size_controlnav',
					[
						'label' => esc_html__( 'Width', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav li a' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				); 
				$this->add_responsive_control( 'h_size_controlnav',
					[
						'label' => esc_html__( 'Height', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav li a' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'hr_8',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);  
				$this->add_responsive_control( 'controlnav_horizontal_position',
					[
						'label' => esc_html__( 'Horizontal Position', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 2000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav' => 'left: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);
				$this->add_responsive_control( 'controlnav_vertical_position',
					[
						'label' => esc_html__( 'Vertical Position', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px', '%' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 1000,
								'step' => 1,
							],
							'%' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 20,
						],
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav' => 'bottom: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'hr_9',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
						'condition' => [
		                    'controlnav' => 'true',
		                ]
					]
				);
				$this->add_control( 'controlnav_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                
		                'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav li a' => 'background: {{VALUE}}',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
		            ]
		        );
		        $this->add_control( 'controlnav_hover_bg_color',
		            [
		                'label' => esc_html__( 'Active Background Color', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		               
		                'selectors' => [
							'{{WRAPPER}} .flexslider .flex-control-nav li a:hover,{{WRAPPER}} .flexslider .flex-control-nav li a.flex-active' => 'background: {{VALUE}}',
							' {{WRAPPER}} .flexslider .flex-control-nav li a::after' => 'border-color: {{VALUE}}',
						],
						'condition' => [
		                    'controlnav' => 'true',
		                ]
		            ]
		        );     
				$this->end_controls_section();
	        /* End Bullets Setting*/

	        /* Start Button Setting */
		        $this->start_controls_section('section_button_setting',
		            [
		                'label'         => esc_html__('Buttons','themesflat-core'),
		            ]
		        );
		        $repeater = new \Elementor\Repeater();
		        $repeater->start_controls_tabs( 'button_tabs' );
		        	$repeater->start_controls_tab( 'button_content_tab',
			            [
			                'label' => esc_html__( 'Content', 'themesflat-core' ),
			            ]
			        	);
				        $repeater->add_control( 'btn_title', 
				        	[
				                'label' => esc_html__( 'Button Title', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::TEXT,
				                'label_block' => true,
				                'default' => 'Let’s Get Started'
				            ]
				        );
				        $repeater->add_control( 'btn_icon', 
				        	[
				                'label' => esc_html__( 'Icon', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::ICONS,
				            ]
				        );
				        $repeater->add_control( 'svg_width',
							[
								'label' => __( 'Width Icon SVG', 'themesflat-core' ),
								'type' => \Elementor\Controls_Manager::SLIDER,
								'size_units' => [ 'px', 'em' ],
								'range' => [
									'px' => [
										'min' => 0,
										'max' => 100,
										'step' => 1,
									],
									'em' => [
										'min' => 0,
										'max' => 100,
										'step' => 0.5,
									],
								],
								'default' => [
									'unit' => 'px',
									'size' => 20,
								],
								'selectors' => [
									'{{WRAPPER}} .button-group a.button-one svg' => 'width: {{SIZE}}{{UNIT}};',
									'{{WRAPPER}} .button-group a.button-one i' => 'font-size: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'btn_icon[value]!' => '',
								],
							]
						);
				        $repeater->add_control( 'icon_button_align',
							[
								'label' => esc_html__( 'Icon Position', 'themesflat-core' ),
								'type' => \Elementor\Controls_Manager::SELECT,
								'default' => 'btn-icon-right',
								'options' => [
									'btn-icon-left' => esc_html__( 'Before', 'themesflat-core' ),
									'btn-icon-right' => esc_html__( 'After', 'themesflat-core' ),
								],
								'condition' => [
									'btn_icon[value]!' => '',
								],
							]
						);
				        $repeater->add_control( 'icon_indent_left',
							[
								'label' => esc_html__( 'Icon Spacing Left', 'themesflat-core' ),
								'type' => \Elementor\Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 50,
									],
								],
								'default' => [
									'size' => 5,
								],
								'selectors' => [
									'{{WRAPPER}} {{CURRENT_ITEM}} .btn-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'btn_icon[value]!' => '',
									'icon_button_align[value]' => 'btn-icon-left',
								],
							]
						);
						$repeater->add_control( 'icon_indent_right',
							[
								'label' => esc_html__( 'Icon Spacing Right', 'themesflat-core' ),
								'type' => \Elementor\Controls_Manager::SLIDER,
								'range' => [
									'px' => [
										'max' => 50,
									],
								],
								'default' => [
									'size' => 5,
								],
								'selectors' => [
									'{{WRAPPER}} {{CURRENT_ITEM}} .btn-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
								],
								'condition' => [
									'btn_icon[value]!' => '',
									'icon_button_align[value]' => 'btn-icon-right',
								],
							]
						);
				        $repeater->add_control( 'btn_url', 
				        	[
				                'label' => esc_html__( 'Button URL', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::URL,
				                'default' => [
				                    'url' => '#'
				                ]
				            ]
				        );
				        $repeater->add_control( 'btn_animation',
				            [
				                'label' => esc_html__( 'Animation', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::SELECT,
				                'default' => 'fromTop',
				                'options' => [
				                	'' => esc_html__( 'None', 'themesflat-core' ),
				                	'fromTop' => esc_html__( 'From Top', 'themesflat-core' ),
				                    'fromBottom' => esc_html__( 'From Bottom', 'themesflat-core' ),
				                    'fromLeft' => esc_html__( 'From Left', 'themesflat-core' ),
				                    'fromRight' => esc_html__( 'From Right', 'themesflat-core' ),
				                    'vivify pulsate' => esc_html__( 'Pulsate', 'themesflat-core' ),
				                    'vivify ball' => esc_html__( 'Ball', 'themesflat-core' ),
				                    'vivify pullUp' => esc_html__( 'Pull Up', 'themesflat-core' ),
				                    'vivify pullDown' => esc_html__( 'Pull Down', 'themesflat-core' ),
				                    'vivify pullLeft' => esc_html__( 'Pull Left', 'themesflat-core' ),
				                    'vivify pullRight' => esc_html__( 'Pull Right', 'themesflat-core' ),
				                    'vivify jumpInLeft' => esc_html__( 'Jump In Left', 'themesflat-core' ),
				                    'vivify jumpInRight' => esc_html__( 'Jump In Right', 'themesflat-core' ),
				                    'vivify rollInLeft' => esc_html__( 'Roll In Left', 'themesflat-core' ),
				                    'vivify rollInRight' => esc_html__( 'Roll In Right', 'themesflat-core' ),
				                    'vivify rollInTop' => esc_html__( 'Roll In Top', 'themesflat-core' ),
				                    'vivify rollInBottom' => esc_html__( 'Roll In Bottom', 'themesflat-core' ),
				                    'vivify popIn' => esc_html__( 'Pop In', 'themesflat-core' ),
				                    'vivify popInLeft' => esc_html__( 'Pop In Left', 'themesflat-core' ),
				                    'vivify popInRight' => esc_html__( 'Pop In Right', 'themesflat-core' ),
				                    'vivify popInTop' => esc_html__( 'Pop In Top', 'themesflat-core' ),
				                    'vivify popInBottom' => esc_html__( 'Pop In Bottom', 'themesflat-core' ),
				                    'vivify swoopInLeft' => esc_html__( 'Swoop In Left', 'themesflat-core' ),
				                    'vivify swoopInRight' => esc_html__( 'Swoop In Right', 'themesflat-core' ),
				                    'vivify swoopInTop' => esc_html__( 'Swoop In Top', 'themesflat-core' ),
				                    'vivify swoopInBottom' => esc_html__( 'Swoop In Bottom', 'themesflat-core' ),
				                    'vivify flip' => esc_html__( 'Flip', 'themesflat-core' ),
				                    'vivify spin' => esc_html__( 'Spin', 'themesflat-core' ),
				                ],
				                'condition' => [
				                    'btn_title[value]!' => '',
				                ]
				            ]
				        );
				        $repeater->add_control( 'btn_delay',
				            [
				                'label' => esc_html__( 'Delay', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::SELECT,
				                'default' => '',
				                'options' => [
				                	'' => esc_html__( 'None', 'themesflat-core' ),
				                	'captionDelay1' => esc_html__( 'Delay 0.1 Seconds', 'themesflat-core' ),
				                	'captionDelay2' => esc_html__( 'Delay 0.2 Seconds', 'themesflat-core' ),
				                	'captionDelay3' => esc_html__( 'Delay 0.3 Seconds', 'themesflat-core' ),
				                	'captionDelay4' => esc_html__( 'Delay 0.4 Seconds', 'themesflat-core' ),
				                	'captionDelay5' => esc_html__( 'Delay 0.5 Seconds', 'themesflat-core' ),
				                	'captionDelay6' => esc_html__( 'Delay 0.6 Seconds', 'themesflat-core' ),
				                	'captionDelay7' => esc_html__( 'Delay 0.7 Seconds', 'themesflat-core' ),
				                	'captionDelay8' => esc_html__( 'Delay 0.8 Seconds', 'themesflat-core' ),
				                	'captionDelay9' => esc_html__( 'Delay 0.9 Seconds', 'themesflat-core' ),
				                	'captionDelay10' => esc_html__( 'Delay 1 Seconds', 'themesflat-core' ),
				                	'captionDelay11' => esc_html__( 'Delay 1.1 Seconds', 'themesflat-core' ),
				                	'captionDelay12' => esc_html__( 'Delay 1.2 Seconds', 'themesflat-core' ),
				                	'captionDelay13' => esc_html__( 'Delay 1.3 Seconds', 'themesflat-core' ),
				                	'captionDelay14' => esc_html__( 'Delay 1.4 Seconds', 'themesflat-core' ),
				                	'captionDelay15' => esc_html__( 'Delay 1.5 Seconds', 'themesflat-core' ),
				                	'captionDelay16' => esc_html__( 'Delay 1.6 Seconds', 'themesflat-core' ),
				                	'captionDelay17' => esc_html__( 'Delay 1.7 Seconds', 'themesflat-core' ),
				                	'captionDelay18' => esc_html__( 'Delay 1.8 Seconds', 'themesflat-core' ),
				                	'captionDelay19' => esc_html__( 'Delay 1.9 Seconds', 'themesflat-core' ),
				                	'captionDelay20' => esc_html__( 'Delay 2 Seconds', 'themesflat-core' ),
				                ],
				                'condition' => [
				                    'btn_title[value]!' => '',
				                ]
				            ]
				        );
		        	$repeater->end_controls_tab();

		        	$repeater->start_controls_tab( 'button_style_tab',
			            [
			                'label' => esc_html__( 'Style', 'themesflat-core' ),
			            ]
			        	);
				        $repeater->add_control( 'hr_btn_divider',
				            [
				                'type' => \Elementor\Controls_Manager::DIVIDER,
				            ]
				        );
				        $repeater->add_group_control(
				            \Elementor\Group_Control_Typography::get_type(),
				            [
				                'name' => 'btn_typography',
				                'label' => esc_html__( 'Typography', 'themesflat-core' ),
				                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
				            ]
				        );
				        $repeater->add_responsive_control( 'btn_padding',
				            [
				                'label' => esc_html__( 'Padding', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::DIMENSIONS,
				                'size_units' => [ 'px', '%', 'em' ],
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				                ],
				            ]
				        );
				        $repeater->add_responsive_control( 'btn_border_radius',
				            [
				                'label' => esc_html__( 'Border Radius', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::DIMENSIONS,
				                'size_units' => [ 'px', '%', 'em' ],
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				                ],
				            ]
				        );
				        $repeater->add_responsive_control( 'btn_border_width',
				            [
				                'label' => esc_html__( 'Border Width', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::DIMENSIONS,
				                'size_units' => [ 'px', '%', 'em' ],
				               
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				                ],
				            ]
				        );
				        $repeater->add_responsive_control( 'btn_margin',
							[
								'label' => esc_html__( 'Margin', 'themesflat-core' ),
								'type' => \Elementor\Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', 'em', '%' ],
								'selectors' => [
									'{{WRAPPER}} {{CURRENT_ITEM}}' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								],
								'separator' => 'before',
							]
						);
				    $repeater->end_controls_tab();

			        $repeater->start_controls_tab( 'style_normal_btn',
			            [
			                'label' => esc_html__( 'Normal', 'themesflat-core' ),
			            ]
			        	);
			        	$repeater->add_control( 'font_color', 
			        		[
				                'label' => esc_html__( 'Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}, {{WRAPPER}} {{CURRENT_ITEM}} svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
				                ],

				            ]
				        );
				        $repeater->add_control( 'bg_color',
				            [
				                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				               
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background: {{VALUE}}',
				                ],
				            ]
				        );
				        $repeater->add_control( 'border_color',
				            [
				                'label' => esc_html__( 'Border Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				               
				                'selectors' => [
				                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-color: {{VALUE}}',
				                ],
				            ]
				        );
				    $repeater->end_controls_tab();
				    
				    $repeater->start_controls_tab( 'style_hover_btn',
			            [
			                'label' => esc_html__( 'Hover', 'themesflat-core' ),
			            ]
			        	);
				        $repeater->add_control( 'hover_font_color', 
				        	[
				                'label' => esc_html__( 'Font Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				                'selectors' => array(
				                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover, {{WRAPPER}} {{CURRENT_ITEM}}:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
				                )
				            ]
				        );
				        $repeater->add_control( 'hover_bg_color', 
				            [
				                'label' => esc_html__( 'Background Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				               
				                'selectors' => array(
				                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'background: {{VALUE}}',
				                )
				            ]
				        );
				        $repeater->add_control( 'hover_border_color', 
				        	[
				                'label' => esc_html__( 'Border Color', 'themesflat-core' ),
				                'type' => \Elementor\Controls_Manager::COLOR,
				               
				                'selectors' => array(
				                    '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'border-color: {{VALUE}}',
				                )
				            ]
				        );
			        $repeater->end_controls_tab();
			        
				$repeater->end_controls_tabs();
		        $this->add_control('buttons',
		            [
		                'label'  => esc_html__('Create Buttons','themesflat-core'),
		                'type'   => \Elementor\Controls_Manager::REPEATER,
		                'fields' => $repeater->get_controls(),
		                'title_field' => '{{{ btn_title }}}',
						'default' => [
							[ 
								'btn_title' => 'Let’s Get Started',
							],
						],
		            ]
		        );

		        $this->end_controls_section();
	        /* End Button Setting */        

	        /* Start Tab General Style */
		        $this->start_controls_section( 'section_text_style',
		            [
		                'label' => esc_html__( 'General', 'themesflat-core' ),
		                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		            ]
		        );
		        $this->add_responsive_control( 'align',
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
						'default' => 'left',
						'selectors' => [
							'{{WRAPPER}} .flexslider .flex_caption' => 'text-align: {{VALUE}};',
						],
					]
				);
		        $this->end_controls_section();
	        /* End Tab General Style */ 

	        /* Start Tab Color Style */
		        $this->start_controls_section( 'section_text_style_color',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-core' ),
		                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		            ]
		        );
		        
		        $this->add_control( 'title_color',
		            [
		                'label' => esc_html__( 'Color Title', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                
		                'selectors' => [
							'{{WRAPPER}} .flex_caption .title' => 'color: {{VALUE}}',
						],
		            ]
		        );	
				
		        $this->add_control( 'desc_color',
		            [
		                'label' => esc_html__( 'Color Desc', 'themesflat-core' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                
		                'selectors' => [
							'{{WRAPPER}} .flex_caption .desc' => 'color: {{VALUE}}',
						],
		            ]
		        );
		        $this->end_controls_section();    
		    /* End Tab Color Style */

		    /* Start Tab Typography Style */
		        $this->start_controls_section( 'section_text_style_typography',
		            [
		                'label' => esc_html__( 'Typography', 'themesflat-core' ),
		                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		            ]
		        );
		       
		        $this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'title_typography',
						'label' => esc_html__( 'Typography Title', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .flex_caption .title',
					]
				);	
				
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'desc_typography',
						'label' => esc_html__( 'Typography Desc', 'themesflat-core' ),
						'selector' => '{{WRAPPER}} .flex_caption .desc',
					]
				);
		        $this->end_controls_section();    
		    /* End Tab Typography Style */

		    /* Start Tab Spacing Style */
		        $this->start_controls_section( 'section_text_style_spacing',
		            [
		                'label' => esc_html__( 'Spacing', 'themesflat-core' ),
		                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		            ]
		        );		

				$this->add_responsive_control( 
					'padding_general',
					[
						'label' => esc_html__( 'Padding General', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em' ],
						
						'selectors' => [
							'{{WRAPPER}} .flex_caption ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	
			
				$this->add_responsive_control( 
					'margin_title',
					[
						'label' => esc_html__( 'Margin Title', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em' ],
						
						'selectors' => [
							'{{WRAPPER}} .flex_caption .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);	
				$this->add_responsive_control( 
					'margin_desc',
					[
						'label' => esc_html__( 'Margin Desc', 'themesflat-core' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em' ],
						
						'selectors' => [
							'{{WRAPPER}} .flex_caption .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
		        $this->end_controls_section();    
		    /* End Tab Spacing Style */ 
		}

		protected function render($instance = []) {
			$settings = $this->get_settings_for_display();
			$title_html = $subtitle_html = $desc_html = $btn_html = $wrap_btn_html = $icon_btn_html = $class = $margin_top = $class_btn = $overlay_html = $content_into_grid_container = '';

			
			if ($settings['buttons']) {
				foreach ( $settings['buttons'] as $key => $value ) {
					if( $key < 3 ) {
						if ( $value['icon_button_align'] == 'btn-icon-left' ) {
							$btn_html .= sprintf('<li class="'.$value['btn_delay'].' '.$value['btn_animation'].'">
											<a href="'.$value['btn_url']['url'].'" class="button-one elementor-repeater-item-'.$value['_id'].'"><span class="btn-icon-left">%s</span> '.$value['btn_title'].'</a>
										</li>', \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $value['btn_icon'], [ 'aria-hidden' => 'true' ] ));
						}else {
							$btn_html .= sprintf('<li class="'.$value['btn_delay'].' '.$value['btn_animation'].'">
											<a href="'.$value['btn_url']['url'].'" class="button-one elementor-repeater-item-'.$value['_id'].'">'.$value['btn_title'].' <span class="btn-icon-right">%s</span></a>
										</li>', \Elementor\Addon_Elementor_Icon_manager_vitour::render_icon( $value['btn_icon'], [ 'aria-hidden' => 'true' ] ));
						}			
						
					}
				}
				$wrap_btn_html = '<ul class="button-group"> '.$btn_html.'</ul>';			
			}

			?>
			<div class="flexslider <?php echo esc_attr($class); ?> " data-animation_images="<?php echo esc_attr($settings['animation_images']); ?>" data-autoplay="<?php echo esc_attr($settings['slideshow_autoplay']); ?>" data-slideshowSpeed="<?php echo esc_attr($settings['slideshowSpeed']['size']); ?>" data-directionnav="<?php echo esc_attr($settings['directionnav']); ?>" data-controlnav="<?php echo esc_attr($settings['controlnav']); ?>" data-prevtext="<?php  echo esc_attr($settings['prev_icon']['value']); ?>" data-nexttext="<?php echo esc_attr($settings['next_icon']['value']); ?>">
				<ul class="slides">
					<?php foreach ( $settings['flexslider_list'] as $value ) {
						if ($value['subtitle_text'] != '') {
							$subtitle_html = '<h3 class="sub-title '.$value['subtitle_delay'].' '.$value['subtitle_animation'].'">'.$value['subtitle_text'].'</h3>';
						}
						if ($value['title_text'] != '') {				
							$title_html = '<h1 class="title '.$value['title_delay'].' '.$value['title_animation'].'">'.$value['title_text'].'</h1>';
						}
						if ($value['desc_text'] != '') {
							$desc_html = '<p class="desc '.$value['desc_delay'].' '.$value['desc_animation'].'">'.$value['desc_text'].'</p>';
						}

						if ( $value['color_overlay'] != '' ) {
							$overlay_html = '<div class="overlay" style="background:'.$value['color_overlay'].'"></div>';
						}

						$shape_html = '';
						if ( $value['shape_one']['url'] != '' ) {
							$shape_html .= '<img src="'.$value['shape_one']['url'].'" alt="shape" class="bg_shape elementor-repeater-item-'.$value['_id'].'_shape_one '.$value['shape_one_animation'].' '.$value['shape_one_delay'].'">';
						}
						if ( $value['shape_two']['url'] != '' ) {
							$shape_html .= '<img src="'.$value['shape_two']['url'].'" alt="shape" class="bg_shape elementor-repeater-item-'.$value['_id'].'_shape_two '.$value['shape_two_animation'].' '.$value['shape_two_delay'].'">';
						}	
						if ( $value['shape_three']['url'] != '' ) {
							$shape_html .= '<img src="'.$value['shape_three']['url'].'" alt="shape" class="bg_shape elementor-repeater-item-'.$value['_id'].'_shape_three '.$value['shape_three_animation'].' '.$value['shape_three_delay'].'">';
						}
						if ( $value['shape_four']['url'] != '' ) {
							$shape_html .= '<img src="'.$value['shape_four']['url'].'" alt="shape" class="bg_shape elementor-repeater-item-'.$value['_id'].'_shape_four '.$value['shape_four_animation'].' '.$value['shape_four_delay'].'">';
						}
						if ( $value['shape_five']['url'] != '' ) {
							$shape_html .= '<img src="'.$value['shape_five']['url'].'" alt="shape" class="bg_shape elementor-repeater-item-'.$value['_id'].'_shape_five '.$value['shape_five_animation'].' '.$value['shape_five_delay'].'">';
						}

						if ( $settings['content_into_grid'] == 'yes' ) {
							$content_into_grid_container = "container";
						}

						$bg_images_size = 'cover';
						if ( $settings['bg_images_size'] != '' ) {
							$bg_images_size = $settings['bg_images_size'];
						}

						$bg_images_position = '50%';
						if ( $settings['bg_images_position'] != '' ) {
							$bg_images_position = $settings['bg_images_position'];
						}
						echo sprintf(
								'<li class="item-slide">
									<div class="bgimg %s" style="background-image:url(%s); background-size: %s; background-position: %s;"></div>
									%s
									%s
									<div class="flex_caption %s">
		                        		%s
		                        		%s
		                        		%s
		                        		%s
				                    </div>	                    
				                    
								</li>',
								$settings['animation_images'],
								$value['flexslider_image']['url'],
								$bg_images_size,
								$bg_images_position,
								$overlay_html,	
								$shape_html,
								$content_into_grid_container,			
								$subtitle_html,
								$title_html,
								$desc_html,
								$wrap_btn_html					
								
						);					
					} ?>
				</ul> 
			</div>
			<?php
		}

	}
}