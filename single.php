<?php get_header(); ?>

<div class="bg-[#fcfcfc] min-h-screen pb-20 font-sans">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Breadcrumb -->
        <div class="bg-white border-b border-gray-100">
            <div class="container mx-auto px-4 py-3 text-[10px] text-gray-400">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-salon-pink transition-colors">トップ</a> &gt; 
                <a href="<?php echo esc_url(home_url('/column')); ?>" class="hover:text-salon-pink transition-colors">コラム</a> &gt; 
                <span class="text-gray-600 font-bold"><?php the_title(); ?></span>
            </div>
        </div>

        <article class="pt-16 pb-24">
            <div class="container mx-auto px-4 max-w-4xl">
                <div class="bg-white rounded-[32px] overflow-hidden shadow-sm border border-gray-100 p-8 md:p-16">
                    <header class="mb-12 text-center">
                        <div class="flex items-center justify-center gap-4 mb-6">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                            ?>
                                <span class="text-xs font-bold text-salon-pink bg-salon-pink/5 px-3 py-1 rounded-full uppercase tracking-tighter"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <div class="flex items-center gap-1.5 text-xs text-gray-400">
                                <?php salon_icon('calendar', 'w-3.5 h-3.5'); ?> <?php echo get_the_date('Y.m.d'); ?>
                            </div>
                        </div>
                        <h1 class="text-2xl md:text-4xl font-bold text-gray-800 leading-relaxed mb-8"><?php the_title(); ?></h1>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="rounded-3xl overflow-hidden mb-12">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="prose prose-lg max-w-none text-gray-700 leading-loose">
                        <?php the_content(); ?>
                    </div>

                    <footer class="mt-20 pt-12 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <div class="flex gap-4">
                                <?php previous_post_link('%link', salon_icon_html('chevron-left', 'w-5 h-5') . ' 前の記事', true); ?>
                            </div>
                            <a href="<?php echo esc_url(home_url('/column')); ?>" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center hover:bg-gray-100 transition-colors">
                                <?php salon_icon('grid', 'w-5 h-5 text-gray-400'); ?>
                            </a>
                            <div class="flex gap-4">
                                <?php next_post_link('%link', '次の記事 ' . salon_icon_html('chevron-right', 'w-5 h-5'), true); ?>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
