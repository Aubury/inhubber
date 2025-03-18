 <?php $cat = get_the_terms(get_the_ID(), 'library_cat'); ?>

<div class="library-content__item">
    <a href="<?php the_permalink() ?>" class="library-content__wrapp" style="background-color: #F8F7FA;">
       <div class="library-content__image">
		   <div style="
					   background:url(<?php echo kama_thumb_src('w=264 &h=352 &crop=false  &alt='.get_the_title( ).''); ?>) top/cover no-repeat; 
					   margin-left: 70px; margin-top: 35px;
					   height: 352px; width: 264px;
					   "
				>
		   </div>
       </div>
       <div class="library-content__info">
          <?php if ($cat && !is_wp_error($cat) && is_array($cat) && !empty($cat)): ?>
          <?php $category_name = $cat[0]->name; ?>
          <div class="library-content__label">
             <?php echo $category_name; ?>
          </div>
          <?php endif; ?>
          <div class="library-content__title">
             <?php the_title(); ?>
          </div>
       </div>
    </a>
 </div>
