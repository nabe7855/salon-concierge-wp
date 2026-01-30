<?php get_header(); ?>

<div class="bg-[#fcfcfc] min-h-screen pb-20 font-sans">
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-100">
        <div class="container mx-auto px-4 py-3 text-[10px] text-gray-400">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-salon-pink transition-colors">トップ</a> &gt; <span class="text-gray-600 font-bold">検索結果</span>
        </div>
    </div>

    <!-- Decoration Row -->
    <div class="h-2 bg-gradient-to-r from-salon-tan via-salon-pink/20 to-salon-tan opacity-30"></div>

    <section class="pt-16 pb-24">
        <div class="container mx-auto px-4 max-w-6xl">
            <!-- Page Header -->
            <div class="flex flex-col items-center mb-20 text-center">
                <div class="bg-salon-pink/5 p-4 rounded-full mb-6 text-salon-pink">
                    <?php salon_icon('search', 'w-8 h-8'); ?>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-wider mb-4">
                    「<?php echo get_search_query(); ?>」の検索結果
                </h1>
                <div class="w-12 h-1 bg-salon-pink rounded-full mb-4"></div>
                <p class="text-xs text-gray-400 uppercase tracking-widest font-medium">Search Results</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main List Column -->
                <div class="lg:col-span-2 space-y-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="group bg-white rounded-[32px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100">
                                <a href="<?php the_permalink(); ?>" class="flex flex-col md:flex-row">
                                    <div class="md:w-1/3 overflow-hidden">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-48 md:h-full object-cover group-hover:scale-110 transition-transform duration-700')); ?>
                                        <?php else : ?>
                                            <img src="<?php echo salon_img('/images/placeholder.png'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 md:h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        <?php endif; ?>
                                    </div>
                                    <div class="md:w-2/3 p-8 flex flex-col justify-between">
                                        <div>
                                            <div class="flex items-center gap-4 mb-4">
                                                <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) :
                                                ?>
                                                    <span class="text-[10px] font-bold text-salon-pink bg-salon-pink/5 px-2 py-0.5 rounded uppercase tracking-tighter"><?php echo esc_html($categories[0]->name); ?></span>
                                                <?php endif; ?>
                                                <div class="flex items-center gap-1.5 text-[10px] text-gray-400">
                                                    <?php salon_icon('calendar', 'w-3 h-3'); ?> <?php echo get_the_date('Y.m.d'); ?>
                                                </div>
                                            </div>
                                            <h2 class="text-lg font-bold text-gray-800 mb-4 group-hover:text-salon-pink transition-colors line-clamp-2 leading-relaxed"><?php the_title(); ?></h2>
                                            <div class="text-sm text-gray-500 line-clamp-3 leading-relaxed mb-6">
                                                <?php echo wp_trim_words(get_the_excerpt(), 60); ?>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2 text-xs font-bold text-salon-pink tracking-wider">
                                            READ MORE <?php salon_icon('arrow-right', 'w-3.5 h-3.5 group-hover:translate-x-2 transition-transform'); ?>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile; ?>

                        <!-- Pagination -->
                        <?php
                        global $wp_query;
                        echo '<div class="flex justify-center gap-2 pt-10">';
                        echo paginate_links(array(
                            'total' => $wp_query->max_num_pages,
                            'current' => max(1, get_query_var('paged')),
                            'prev_next' => false,
                            'type' => 'plain',
                            'before_page_number' => '<span class="w-10 h-10 rounded-full bg-white text-gray-400 flex items-center justify-center font-bold text-sm shadow-sm hover:bg-salon-pink hover:text-white transition-all">',
                            'after_page_number' => '</span>',
                        ));
                        echo '</div>';
                        ?>

                    <?php else : ?>
                        <div class="text-center py-20 bg-white rounded-[32px] border border-gray-100 italic text-gray-400">
                            「<?php echo get_search_query(); ?>」に一致する記事は見つかりませんでした。
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar Column -->
                <div class="lg:col-span-1 space-y-10">
                    <!-- Search Box -->
                    <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-800 mb-6 flex items-center gap-2"><?php salon_icon('search', 'w-4 h-4'); ?> SEARCH</h3>
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="relative">
                                <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="キーワードを入力" class="w-full bg-salon-light border border-salon-tan/30 rounded-full px-6 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-salon-pink/20">
                            </div>
                        </form>
                    </div>

                    <!-- Category Box -->
                    <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-800 mb-6 flex items-center gap-2"><?php salon_icon('tag', 'w-4 h-4'); ?> CATEGORY</h3>
                        <ul class="space-y-4">
                            <?php
                            $cats = get_categories();
                            foreach ($cats as $cat) :
                            ?>
                                <li>
                                    <a href="<?php echo get_category_link($cat->term_id); ?>" class="w-full flex items-center justify-between text-sm text-gray-500 hover:text-salon-pink transition-colors group">
                                        <?php echo esc_html($cat->name); ?> (<?php echo $cat->count; ?>)
                                        <?php salon_icon('chevron-right', 'w-3.5 h-3.5 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all'); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
