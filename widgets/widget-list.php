<?php
class TFList_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-list';
    }
    
    public function get_title() {
        return esc_html__( 'TF Process', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-form-vertical';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function _register_controls() {
		// Start List Setting        
			$this->start_controls_section( 'section_setting',
	            [
	                'label' => esc_html__('Setting', 'themesflat-core'),
	            ]
	        );

            $this->add_control(
				'number',
				[
					'label' => esc_html__( 'Number', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( '1', 'themesflat-core' ),
					'label_block' => true,
				]
			);

            $this->add_control(
				'heading',
				[
					'label' => esc_html__( 'Heading', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::TEXT,					
					'default' => esc_html__( 'Register for free', 'themesflat-core' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,					
					'default' => esc_html__( 'For 15 years, we raising the standard of used car 
                    most innovative and reliable used vehicle program', 'themesflat-core' ),
					'label_block' => true,
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
                        '{{WRAPPER}} .tf-list' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
		
	        
	    $this->end_controls_section();
        // /.End List Setting  

	}	

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_list', ['id' => "tf-list-{$this->get_id()}", 'class' => ['tf-list'], 'data-tabid' => $this->get_id() ] );
		
        ?>
        <div <?php echo $this->get_render_attribute_string('tf_list') ?>>
		    <?php if ($settings['number'] != ''): ?>
		    	<div class="number">
                    <?php echo esc_html($settings['number']); ?>
                </div>
            <?php endif; ?>   
            <?php if ($settings['heading'] != ''): ?>
		    	<h3 class="heading">
                    <?php echo esc_html($settings['heading']); ?>
                </h3>
            <?php endif; ?>
            <?php if ($settings['description'] != ''): ?>
		    	<p class="description">
                    <?php echo esc_html($settings['description']); ?>
                </p>
            <?php endif; ?>
	    </div>
        <?php 		
	}

}