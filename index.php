get_header(); ?>

<div class="bg-[#fcfcfc] min-h-screen pb-20 font-sans">
    <div class="container mx-auto px-4 py-3 text-[10px] text-gray-400">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-salon-pink transition-colors">トップ</a> &gt; <span class="text-gray-600 font-bold"><?php the_title(); ?></span>
    </div>

    <section class="pt-16 pb-24">
        <div class="container mx-auto px-4 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <div class="lg:col-span-2">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article class="bg-white rounded-[32px] p-8 md:p-12 shadow-sm border border-gray-100 mb-8 prose max-w-none">
                            <h1 class="text-3xl font-bold mb-8"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </article>
                    <?php endwhile; endif; ?>
                </div>

                <div class="lg:col-span-1 space-y-10">
                    <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-800 mb-6 flex items-center gap-2"><?php salon_icon('search', 'w-4 h-4'); ?> SEARCH</h3>
                        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="relative">
                                <input type="search" name="s" placeholder="キーワードを入力" class="w-full bg-gray-50 border border-gray-100 rounded-full px-6 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-salon-pink/20">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
