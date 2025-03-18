<?php get_header() ?>

    <section class="single-offer">
        <div class="container">
            <div class="single-offer__wrapper">
                <h1>
                    <?php pll_e('Inhubber Events'); ?>
                </h1>
                <div class="single-offer__text">
                    <?php pll_e("Learn the best practices for organizing your work, handling contracts, and stay focused on what's important."); ?>

                </div>
            </div>
        </div>
    </section>
    <section class="events-content">
        <div class="container">
            <?php
			function get_timestamp_from_month_year_name($month_year_name, $locale = 'en_US') {
				
				$fmt = new IntlDateFormatter(
					$locale,
					IntlDateFormatter::FULL,
					IntlDateFormatter::NONE,
					'UTC',
					IntlDateFormatter::GREGORIAN,
					'MMMM yyyy'
				);

				$fmt->setLenient(false);
				return $fmt->parse($month_year_name);
			}

			// Get the current language from the WordPress environment
			$current_language = get_locale(); // 'de_DE' for German, 'en_US' for English, etc.

			$dates = get_terms([
				'taxonomy' => 'events_cat',
			]);

			foreach ($dates as $date) {
				$date->timestamp = get_timestamp_from_month_year_name($date->name, $current_language);
			}

			usort($dates, function ($a, $b) {
				return $a->timestamp - $b->timestamp;
			});	
            ?>
			
            <?php if ($dates): ?>
                <?php foreach ($dates as $date): ?>
                    <?php
                    $events = new WP_Query([
                        'post_type' => 'events',
                        'posts_per_page' => -1,
                        'tax_query' => [[
                            'taxonomy' => 'events_cat',
                            'field' => 'term_id',
                            'terms' => $date->term_id
                        ]],
                        'meta_key' => '_crb_event_start_date', // sorting by meta field
                        'orderby' => 'meta_value', // 'meta_value' for string dates in the format "Sep-11"
                        'order' => 'ASC' // ascending order
                    ]);
                    ?>
					
                    <?php if ($events->have_posts()) : ?>

					<div class="events-content__wrapper">
                        <div class="events-content__date">
                            <?php echo $date->name ?>
                        </div>

							<div class="events-content__items">
                                <?php while ($events->have_posts()) : $events->the_post(); ?>
                                    <div class="events-content__item">
                                        <a href="<?php echo carbon_get_post_meta(get_the_ID(), 'crb_event_link') ?>"
                                           target="_blank" class="events-content__item-wrapp">
                                            <div class="events-content__item-box">
                                                <?php $newDate = explode("-", carbon_get_post_meta(get_the_ID(), 'crb_event_start_date')); ?>
												
                                                <div class="events-content__item-date">
                                                    <div class="events-content__item-month">
                                                        <?php echo $newDate[1]; ?>
                                                    </div>
                                                    <div class="events-content__item-number">
                                                        <?php echo $newDate[2]; ?>
                                                    </div>
                                                </div>
                                                <div class="btn-fill"
                                                     href="<?php echo carbon_get_post_meta(get_the_ID(), 'crb_event_register') ?>">
                                                    <?php pll_e('Register'); ?>
                                                </div>
                                            </div>
                                            <div class="events-content__item-info">
                                                <div class="events-content__item-title">
                                                    <?php the_title(); ?>
                                                </div>
                                                <div class="events-content__item-text">
                                                    <?php echo carbon_get_post_meta(get_the_ID(), 'crb_event_desk') ?>
                                                </div>
                                            </div>
                                            <div class="events-content__item-right">
                                                <?php if ($photo = carbon_get_post_meta(get_the_ID(), 'crb_event_slider')): ?>
                                                    <div class="events-content__item-avatars">
                                                        <?php foreach ($photo as $item): ?>
                                                            <div class="events-content__item-avatar">
                                                                <?php echo wp_get_attachment_image($item['photo'], 'full',); ?>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="btn-fill"><?php pll_e('Register'); ?></div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
	                    </div>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>


<?php get_template_part('templates/footer-everything') ?>

<?php get_footer() ?>