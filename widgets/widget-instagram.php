<?php
class TFInstagram_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-instagram';
    }
    
    public function get_title() {
        return esc_html__( 'TF Instagram', 'themesflat-core' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons_core' ];
    }

    public function get_style_depends() {
		return ['tf-instagram'];
	}

    protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'themesflat-core' ),
			]
		);

		// $this->add_control(
		// 	'style',
		// 	[
		// 		'label' => esc_html__( 'Style', 'themesflat-core' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'default' => 'style1',
		// 		'options' => [
		// 			'style1'  => esc_html__( 'Style 1', 'themesflat-core' ),
		// 			// 'style2' => esc_html__( 'Style 2', 'themesflat-core' ),
		// 		],
		// 	]
		// );

		$this->add_control(
			'access_token',
			[
				'label'       => esc_html__( 'Instagram Access Token', 'themesflat-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				// 'description' => wp_kses_post( __( '(<a href="https://www.youtube.com/watch?v=X2ndbJAnQKM" target="_blank">Lookup your Access Token</a>)', 'themesflat-core' ) ),
			]
		);

        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-instagram',
					'library' => 'brands',
				],
                
            ]
        );

		$this->add_control(
			'limit',
			[
				'label'   => esc_html__( 'Item Limit', 'themesflat-core' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 200,
				'step'    => 1,
				'default' => 5,
			]
		);


		       

        $this->add_control(
            'columns',
            [
                'label' => esc_html__( 'Columns', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'columns-5',
                'options' => [
                    'columns-1' => esc_html__( '1', 'themesflat-core' ),
                    'columns-2' => esc_html__( '2', 'themesflat-core' ),
                    'columns-3' => esc_html__( '3', 'themesflat-core' ),
                    'columns-4' => esc_html__( '4', 'themesflat-core' ),
                    'columns-5' => esc_html__( '5', 'themesflat-core' ),
                    'columns-6' => esc_html__( '6', 'themesflat-core' ),
                    'columns-7' => esc_html__( '7', 'themesflat-core' ),
                    'columns-8' => esc_html__( '8', 'themesflat-core' ),
                    'columns-9' => esc_html__( '9', 'themesflat-core' ),
                    'columns-10' => esc_html__( '10', 'themesflat-core' ),
                ],                    
            ]
        ); 

        $this->add_control(
            'columns_tab',
            [
                'label' => esc_html__( 'Columns Tablet', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'columns-tb-3',
                'options' => [
                    'columns-tb-1' => esc_html__( '1', 'themesflat-core' ),
                    'columns-tb-2' => esc_html__( '2', 'themesflat-core' ),
                    'columns-tb-3' => esc_html__( '3', 'themesflat-core' ),
                    'columns-tb-4' => esc_html__( '4', 'themesflat-core' ),
                    'columns-tb-5' => esc_html__( '5', 'themesflat-core' ),
                    'columns-tb-6' => esc_html__( '6', 'themesflat-core' ),
                    'columns-tb-7' => esc_html__( '7', 'themesflat-core' ),
                ],                    
            ]
        ); 

        

        $this->add_control(
            'columns_mob',
            [
                'label' => esc_html__( 'Columns Mobile (767 > 500)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'columns-mb-2',
                'options' => [
                    'columns-mb-1' => esc_html__( '1', 'themesflat-core' ),
                    'columns-mb-2' => esc_html__( '2', 'themesflat-core' ),
                    'columns-mb-3' => esc_html__( '3', 'themesflat-core' ),
                    'columns-mb-4' => esc_html__( '4', 'themesflat-core' ),
                    'columns-mb-5' => esc_html__( '5', 'themesflat-core' ),
                ],                    
            ]
        ); 

        $this->add_control(
            'columns_mob2',
            [
                'label' => esc_html__( 'Columns Mobile (< 500)', 'themesflat-core' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'columns-mb2-1',
                'options' => [
                    'columns-mb2-1' => esc_html__( '1', 'themesflat-core' ),
                    'columns-mb2-2' => esc_html__( '2', 'themesflat-core' ),
                    'columns-mb2-3' => esc_html__( '3', 'themesflat-core' ),
                ],                    
            ]
        ); 

		$this->end_controls_section();

        // Start Style Setting
			$this->start_controls_section(
				'section_products_style',
				[
					'label' => esc_html__( 'General', 'themesflat-core' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'column_gap',
				[
					'label'     => esc_html__( 'Columns Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wrap-instagram ' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'row_gap',
				[
					'label'     => esc_html__( 'Rows Gap', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .wrap-instagram' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
					],
				]
			);



            $this->add_control(
				'icon_size',
				[
					'label'     => esc_html__( 'Icon Size', 'themesflat-core' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .instagram-item .feature .icon i' => 'font-size: {{SIZE}}{{UNIT}}',
					],
				]
			);
			
			$this->add_control( 
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .instagram-item .feature .icon i' => 'color: {{VALUE}}',					
					],
					
				]
			);

	        
			$this->end_controls_section();
		// /.End Setting 
	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$content_enable = isset( $settings['content_enable'] ) ? $settings['content_enable'] : '';
		$limit         = ! empty( $settings['limit'] ) ? $settings['limit'] : 6;
	
		$token         = ! empty( $settings['access_token'] ) ? $settings['access_token'] : 'IGQWRQclBnRE9SYWY2RUZAOMnhxV2hYTUNOcmpfMjJpQ3ZAPUThXTEs5ekp3NHE1R3ZAJMTJjcHE2eXpHX0oweHRINUxVUWtMZAUkyVFJ5eG9odTZAPQV96eUs3RThBa2U2c05EcE1oRklKYmtUcE8xdEVJVU5RaE5EMDQZD';
        
		$response      = wp_remote_get( 'https://graph.instagram.com/me/media?fields=id%2Ccaption%2Cmedia_type%2Cmedia_url%2Ccomment%2Clike%2Cpermalink%2Cusername%2Cthumbnail_url&limit=' . esc_attr( $limit ) . '&access_token=' . esc_attr( $token ) );

		$response2      = wp_remote_get( 'https://graph.instagram.com/me/?fields=username&access_token=' . esc_attr( $token ) );
		$response3      = wp_remote_get( 'https://graph.instagram.com/me/?fields=media_count&access_token=' . esc_attr( $token ) );

		

		if ( is_wp_error( $response ) ) {
			echo '<p>' . esc_html__( 'Incorrect user ID specified.', 'themesflat-core' ) . '</p>';

			return;
		}
		$response_body = json_decode( $response['body'] );



		if ( empty( $response_body ) ) {
			echo '<p>' . esc_html__( 'Incorrect user ID specified.', 'themesflat-core' ) . '</p>';

			return;
		}

		if ( ! isset( $response_body->data ) || ! is_array( $response_body->data ) || count( $response_body->data ) == 0 ) {
			echo '<p>' . esc_html__( 'Incorrect user ID specified.', 'themesflat-core' ) . '</p>';

			return;
		}


		foreach ( $response_body->data as $item ) {
			$image              = [];
			$image['permalink'] = $item->permalink;
			$image['image_src'] = $item->media_url;
			$type = $item->media_type;
			if ( $type == "VIDEO" ) {
				$image['image_src'] = $item->thumbnail_url;
			}
		}

		$this->add_render_attribute( 'instagram_btn', 'target', '_blank' );

		?>
		<div class="tf-instagram">
 
            <div class="wrap-instagram <?php echo $settings['columns']. ' '. $settings['columns_tab']. ' '.  $settings['columns_mob']. ' '. $settings['columns_mob2']; ?>">
                <?php
                foreach ( $response_body->data as $item ) {
                    $image              = [];
                    $image['permalink'] = $item->permalink;
                    $image['image_src'] = $item->media_url;
                    $type = $item->media_type;
                    if ( $type == "VIDEO" ) {
                        $image['image_src'] = $item->thumbnail_url;
                    }
                   
                    ?>
                    <div class="instagram-item">
                        <a href="<?php echo $image['permalink']; ?>">
                            <div class="feature" >
                                <img src="<?php echo $image['image_src']; ?>" alt="Image">
                                <?php if ( $settings['icon'] != '') { ?>
                                <div class="icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                                <?php } ?>
                            </div>
						</a>
                        
                       
                    </div>
                <?php 
                }
                ?>
			</div>
		</div>
		<?php


	}






}