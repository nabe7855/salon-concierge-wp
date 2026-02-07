    </main>

    <!-- Mobile Floating Navigation -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 z-50 px-2 pb-4 pt-2 bg-gradient-to-t from-white via-white/80 to-transparent">
        <div class="flex items-stretch gap-1.5 h-14 md:h-18 max-w-md mx-auto">
            <?php 
            $phone_number = get_option('salon_phone_number', '080-1017-5318');
            $line_url = get_option('salon_line_url', '#');
            ?>
            <!-- Phone Button -->
            <a href="tel:<?php echo esc_attr(str_replace('-', '', $phone_number)); ?>" class="flex-1 bg-botanical-primary-light text-white rounded-xl shadow-lg flex flex-col items-center justify-center hover:opacity-90 transition-opacity">
                <?php salon_icon('phone', 'w-5 h-5 mb-0.5'); ?>
                <span class="text-[9px] font-bold text-white leading-none">9:30-翌4:00</span>
            </a>

            <!-- LINE Button -->
            <a href="<?php echo esc_url($line_url); ?>" class="flex-1 bg-white border-2 border-botanical-primary-light text-botanical-primary rounded-xl shadow-lg flex flex-col items-center justify-center hover:bg-gray-50 transition-colors">
                <div class="bg-[#06C755] text-white rounded-full p-0.5 mb-1 px-1.5 text-[8px] font-black leading-none flex items-center justify-center h-5 w-10">LINE</div>
                <span class="text-[9px] font-bold leading-none">24時間受付</span>
            </a>

            <!-- Inquiry Button -->
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="flex-[1.2] bg-botanical-primary text-white rounded-xl shadow-lg flex flex-col items-center justify-center text-center px-1 hover:opacity-90 transition-opacity">
                <span class="text-[9px] font-bold leading-tight">お問い合わせフォーム</span>
                <span class="text-[8px] font-medium mt-0.5 text-white/80 leading-none">24h受付</span>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <div class="flex items-center gap-2 mb-6">
                        <?php salon_icon('leaf', 'w-6 h-6 text-sage-400'); ?>
                        <span class="text-xl font-bold text-white tracking-tighter">SalonConcierge</span>
                    </div>
                    <p class="text-sm leading-relaxed mb-6">
                        メンズエステサロン運営の経験を活かし、オーナー様に代わってお電話を承ります。24時間受付のLINEでもお気軽にご相談ください。
                    </p>
                    <div class="flex gap-4">
                        <a href="<?php echo esc_url(get_option('salon_line_url', '#')); ?>" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sage-600 transition-colors">
                            <?php salon_icon('message-circle', 'w-5 h-5 text-white'); ?>
                        </a>
                        <a href="tel:<?php echo esc_attr(str_replace('-', '', get_option('salon_phone_number', '080-1017-5318'))); ?>" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-sage-600 transition-colors">
                            <?php salon_icon('phone', 'w-5 h-5 text-white'); ?>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-6 border-l-4 border-sage-500 pl-3">サービスメニュー</h3>
                    <ul class="grid grid-cols-1 gap-3 text-sm">
                        <?php
                        $footer_links = array(
                            array('name' => 'サービス詳細・料金', 'path' => '/services'),
                            array('name' => 'システム詳細', 'path' => '/system'),
                            array('name' => 'よくあるご質問', 'path' => '/faq'),
                            array('name' => 'お問い合わせフォーム', 'path' => '/contact'),
                            array('name' => '求人情報', 'path' => '/jobs'),
                            array('name' => '会社概要', 'path' => '/company'),
                            array('name' => 'コラム', 'path' => '/column'),
                        );
                        foreach ($footer_links as $link) : ?>
                            <li>
                                <a href="<?php echo esc_url(home_url($link['path'])); ?>" class="hover:text-sage-400 transition-colors flex items-center gap-1">
                                    <?php salon_icon('chevron-right', 'w-3 h-3'); ?> <?php echo esc_html($link['name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="lg:col-span-2">
                    <h3 class="text-white font-bold mb-6 border-l-4 border-sage-500 pl-3">お問い合わせ</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-800 p-4 rounded-xl border border-gray-700">
                            <div class="flex items-center gap-3 mb-2">
                                <?php salon_icon('phone', 'w-5 h-5 text-sage-400'); ?>
                                <span class="text-white font-bold">お電話でのご相談</span>
                            </div>
                            <p class="text-xl text-white font-bold mb-1"><?php echo esc_html(get_option('salon_phone_number', '080-1017-5318')); ?></p>
                            <p class="text-xs">受付時間: 9:30 - 翌6:00</p>
                        </div>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="bg-sage-600 hover:bg-sage-700 p-4 rounded-xl flex flex-col justify-center transition-colors text-white">
                            <div class="flex items-center gap-3 mb-2">
                                <?php salon_icon('mail', 'w-5 h-5 text-white'); ?>
                                <span class="text-white font-bold">メールフォーム</span>
                            </div>
                            <p class="text-xs text-sage-100">24時間受付中・順次ご返信</p>
                        </a>
                    </div>
                    <div class="mt-4">
                        <a href="<?php echo esc_url(get_option('salon_line_url', '#')); ?>" class="block w-full bg-[#06C755] hover:bg-[#05b34c] text-white py-3 rounded-xl text-center font-bold flex items-center justify-center gap-2 transition-colors">
                            <?php salon_icon('message-circle', 'w-5 h-5'); ?> LINEでお問い合わせ（24時間受付）
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-xs pb-20 md:pb-0">
                <p>&copy; <?php echo date('Y'); ?> SalonConcierge. All rights reserved.</p>
                <div class="mt-4 flex flex-wrap justify-center gap-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white">特定商取引法に基づく表記</a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white">プライバシーポリシー</a>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white">利用規約</a>
                    <a href="<?php echo esc_url(home_url('/wp-admin')); ?>" class="hover:text-white">管理者ログイン</a>
                </div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
