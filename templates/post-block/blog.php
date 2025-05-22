<?php $cat_blog = get_the_terms(get_the_ID(),'category',);

$thumb_id = get_post_thumbnail_id(); // получаем ID текущего изображения
$thumb_url = kama_thumb_src([
	'src' => wp_get_attachment_url($thumb_id),
	'w'   => 592,
	'h'   => 240,
	'crop' => true,
	'alt' => get_the_title(),
]);
?>


<div class="blog-content__item">
	<a href="<?php the_permalink(); ?>" class="blog-content__wrapp">
		<div class="blog-content__image">
            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
		</div>
		<div class="blog-content__info">
			<div class="blog-content__date">
				<?php echo $cat_blog[0]->name ?>・<?php the_time('d F Y'); ?>
			</div>
			<div class="blog-content__title">
				<?php the_title(); ?>
			</div>
		</div>
	</a>
</div>
