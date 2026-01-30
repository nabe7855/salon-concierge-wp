<?php
/**
 * Template Name: Services Page
 */
get_header(); ?>

<div class="bg-salon-light/30 min-h-screen font-sans">
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-botanical-primary pt-24 pb-20 md:pt-32 md:pb-24">
        <div class="absolute inset-0 bg-black/10 z-0"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

        <div class="container mx-auto px-4 max-w-6xl relative z-10 text-center text-white">
            <h1 class="text-3xl md:text-5xl font-bold font-heading mb-8 leading-tight tracking-wide flex flex-col items-center">
                <span class="whitespace-nowrap">最高水準の品質のサービスを</span>
                <span class="whitespace-nowrap"><span class="text-salon-gold">業界最安値</span>でお届けします。</span>
            </h1>
            <p class="text-white/80 max-w-2xl mx-auto mb-16 leading-relaxed text-sm md:text-base font-light">
                メンズエステ経営の課題を、運営サポートとITシステムの力で包括的に解決。<br class="hidden md:block" />
                オーナー様は、本来の「経営」と「キャストマネジメント」に集中してください。
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left relative z-20">
                <!-- STEP 1 -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all">
                    <span class="block text-white/60 text-xs font-bold tracking-widest mb-2">STEP 1</span>
                    <h3 class="text-lg font-bold mb-2">初期費用</h3>
                    <div class="flex items-end gap-1 mb-2">
                        <span class="text-4xl font-bold font-heading">5</span>
                        <span class="text-sm opacity-80 pb-1">万円</span>
                    </div>
                    <div class="inline-block bg-white text-botanical-primary text-[10px] px-2 py-1 rounded-full font-bold mb-4">期間限定 (通常10万円)</div>
                    <p class="text-[11px] opacity-70 leading-relaxed border-t border-white/20 pt-3">システム設定、HP調整、導入研修など、開始に必要な準備をすべて含みます。</p>
                </div>

                <!-- STEP 2 -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all">
                    <span class="block text-white/60 text-xs font-bold tracking-widest mb-2">STEP 2</span>
                    <h3 class="text-lg font-bold mb-2">月額基本料金</h3>
                    <div class="flex items-end gap-1 mb-4">
                        <span class="text-4xl font-bold font-heading">3</span>
                        <span class="text-sm opacity-80 pb-1">万円</span>
                    </div>
                    <ul class="text-xs opacity-80 space-y-2 mb-4">
                        <li class="flex items-center gap-2"><?php salon_icon('check-circle', 'text-salon-gold w-3.5 h-3.5'); ?> 全部屋数・キャスト数 無制限</li>
                        <li class="flex items-center gap-2"><?php salon_icon('check-circle', 'text-salon-gold w-3.5 h-3.5'); ?> システム利用料込み</li>
                        <li class="flex items-center gap-2"><?php salon_icon('check-circle', 'text-salon-gold w-3.5 h-3.5'); ?> 24時間365日サポート</li>
                    </ul>
                </div>

                <!-- STEP 3 -->
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all">
                    <span class="block text-white/60 text-xs font-bold tracking-widest mb-2">STEP 3</span>
                    <h3 class="text-lg font-bold mb-2">成約報酬</h3>
                    <div class="flex items-end gap-1 mb-4">
                        <span class="text-4xl font-bold font-heading">1,000</span>
                        <span class="text-sm opacity-80 pb-1">円/件</span>
                    </div>
                    <p class="text-[11px] opacity-70 leading-relaxed border-t border-white/20 pt-3">成果が出た分だけのお支払い。<br />問合せやキャンセルは含みません。<br /><span class="text-salon-gold font-bold mt-1 block">※月間500件以上で割引あり</span></p>
                </div>
            </div>
            <p class="text-white/60 text-[10px] mt-8 text-right px-4">※価格はすべて税抜き表示です。</p>
        </div>
    </section>

    <!-- Service Details -->
    <section class="py-20 bg-salon-light/50">
        <div class="container mx-auto px-4 max-w-5xl">
            <div class="text-center mb-12">
                <h2 class="text-2xl text-botanical-primary font-bold font-heading mb-4">サービス詳細</h2>
                <p class="text-gray-500 text-sm">必要な機能はすべて揃っています。</p>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button onclick="switchTab('support')" id="tab-support" class="tab-btn flex items-center gap-2 px-8 py-4 rounded-full font-bold transition-all shadow-md bg-salon-gold text-white scale-105">
                    <?php salon_icon('phone', 'w-[18px] h-[18px]'); ?> 運営サポート(無料)
                </button>
                <button onclick="switchTab('system')" id="tab-system" class="tab-btn flex items-center gap-2 px-8 py-4 rounded-full font-bold transition-all shadow-md bg-white text-gray-500 hover:bg-gray-50">
                    <?php salon_icon('sparkles', 'w-[18px] h-[18px]'); ?> ITシステム(無料)
                </button>
                <button onclick="switchTab('option')" id="tab-option" class="tab-btn flex items-center gap-2 px-8 py-4 rounded-full font-bold transition-all shadow-md bg-white text-gray-500 hover:bg-gray-50">
                    <?php salon_icon('zap', 'w-[18px] h-[18px]'); ?> オプション(有料)
                </button>
            </div>

            <!-- Tab Content -->
            <div id="content-support" class="tab-content grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
                <?php foreach (DETAILED_FREE_SERVICES as $item) : ?>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left group hover:shadow-md transition-shadow h-full hover:border-salon-gold/30">
                        <div class="bg-gray-50 p-3 rounded-xl mb-4 text-salon-gold group-hover:bg-opacity-80 transition-colors">
                            <?php salon_icon($item['icon'], 'w-[24px] h-[24px]'); ?>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2"><?php echo esc_html($item['title']); ?></h3>
                        <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="content-system" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
                <?php foreach (DETAILED_FREE_SYSTEMS as $item) : ?>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left group hover:shadow-md transition-shadow h-full hover:border-botanical-primary/30">
                        <div class="bg-gray-50 p-3 rounded-xl mb-4 text-botanical-primary group-hover:bg-opacity-80 transition-colors">
                            <?php salon_icon($item['icon'], 'w-[24px] h-[24px]'); ?>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2"><?php echo esc_html($item['title']); ?></h3>
                        <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="content-option" class="tab-content hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
                <?php foreach (DETAILED_PAID_SERVICES as $item) : ?>
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-start text-left group hover:shadow-md transition-shadow h-full hover:border-gray-700/30">
                        <div class="bg-gray-50 p-3 rounded-xl mb-4 text-gray-700 group-hover:bg-opacity-80 transition-colors">
                            <?php salon_icon($item['icon'], 'w-[24px] h-[24px]'); ?>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2 flex items-center gap-2">
                            <?php echo esc_html($item['title']); ?>
                            <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded">Option</span>
                        </h3>
                        <p class="text-xs text-gray-500 leading-relaxed"><?php echo esc_html($item['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer CTA -->
    <section class="bg-botanical-primary text-white py-20 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-salon-gold/20 rounded-full blur-[80px]"></div>
        <div class="container mx-auto px-4 max-w-4xl relative z-10 text-center">
            <h2 class="text-2xl md:text-3xl font-bold font-heading mb-8">最短3日で導入スタート</h2>
            <p class="text-white/80 mb-12 max-w-xl mx-auto text-sm">お申込みから運用開始まで、専任のコンシェルジュがフルサポートいたします。まずは現在の状況をお聞かせください。</p>
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 mb-12">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-white text-botanical-primary font-bold flex items-center justify-center mb-2">1</div>
                        <span>お問い合わせ</span>
                    </div>
                    <?php salon_icon('chevron-right', 'hidden md:block text-white/50 w-5 h-5'); ?>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-white text-botanical-primary font-bold flex items-center justify-center mb-2">2</div>
                        <span>ヒアリング</span>
                    </div>
                    <?php salon_icon('chevron-right', 'hidden md:block text-white/50 w-5 h-5'); ?>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-white text-botanical-primary font-bold flex items-center justify-center mb-2">3</div>
                        <span>システム設定</span>
                    </div>
                    <?php salon_icon('chevron-right', 'hidden md:block text-white/50 w-5 h-5'); ?>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-salon-gold text-white font-bold flex items-center justify-center mb-2 shadow-lg scale-110">4</div>
                        <span class="font-bold text-salon-gold">運用開始</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="tel:080-1017-5318" class="bg-white text-botanical-primary py-4 px-10 rounded-full font-bold shadow-lg hover:shadow-xl hover:bg-gray-100 transition-all flex items-center justify-center gap-2">
                    <?php salon_icon('phone', 'w-5 h-5'); ?> 080-1017-5318
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="bg-salon-gold text-white py-4 px-10 rounded-full font-bold shadow-lg hover:shadow-xl hover:bg-yellow-600 transition-all">
                    無料相談・お見積り
                </a>
            </div>
        </div>
    </section>
</div>

<script>
function switchTab(tab) {
    // Hide all contents
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    // Show active content
    document.getElementById('content-' + tab).classList.remove('hidden');
    
    // Reset all buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('bg-salon-gold', 'bg-botanical-primary', 'bg-gray-800', 'text-white', 'scale-105');
        btn.classList.add('bg-white', 'text-gray-500');
    });
    
    // Set active button
    var activeBtn = document.getElementById('tab-' + tab);
    activeBtn.classList.remove('bg-white', 'text-gray-500');
    if(tab === 'support') activeBtn.classList.add('bg-salon-gold', 'text-white', 'scale-105');
    if(tab === 'system') activeBtn.classList.add('bg-botanical-primary', 'text-white', 'scale-105');
    if(tab === 'option') activeBtn.classList.add('bg-gray-800', 'text-white', 'scale-105');
}
</script>

<?php get_footer(); ?>
