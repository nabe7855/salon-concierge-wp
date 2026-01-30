<?php
/**
 * Template Name: System Page
 */
get_header(); ?>

<div class="bg-gray-50 min-h-screen font-sans selection:bg-salon-gold selection:text-white">
    <!-- Hero Section -->
    <section class="relative bg-botanical-primary text-white py-20 md:py-32 overflow-hidden">
        <div class="absolute top-0 right-0 w-2/3 h-full opacity-10 pointer-events-none">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-salon-gold rounded-full blur-[120px]"></div>
            <div class="absolute top-0 right-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=2000')] bg-cover bg-center mix-blend-overlay"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold font-heading leading-tight mb-8">
                    <span class="text-salon-gold">取りこぼしゼロ</span>と<br />
                    <span class="text-salon-gold">顧客満足度</span>を両立する、<br />
                    高機能な受電インフラ。
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed max-w-xl">
                    機会損失を防ぎ、売上を最大化する。<br />
                    徹底的に磨き上げられた2つの独自システムが、<br />
                    貴社の店舗運営を劇的に進化させます。
                </p>
            </div>
        </div>
    </section>

    <!-- Logic Section -->
    <section class="py-24 bg-white relative">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="md:w-1/2 relative">
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-salon-light rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-salon-gold/20 rounded-full mix-blend-multiply filter blur-xl opacity-70"></div>
                    <div class="relative z-10 bg-white p-4 md:p-8 rounded-2xl md:rounded-3xl shadow-2xl border border-gray-100">
                        <div class="aspect-video bg-gray-100 rounded-xl md:rounded-2xl overflow-hidden relative">
                            <img src="<?php echo salon_img('/images/4.jpg'); ?>" alt="DX Network" class="object-cover w-full h-full opacity-90 hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-bold font-heading text-botanical-primary mb-6">なぜ、高品質な<br />代行ができるのか？</h2>
                    <div class="w-20 h-1 bg-salon-gold mb-8"></div>
                    <p class="text-gray-600 leading-loose mb-8">それは、オペレーターのスキルだけに頼らない<br /><strong class="text-botanical-primary border-b border-salon-gold/50">「仕組み」があるから</strong>です。</p>
                    <p class="text-gray-600 leading-relaxed text-sm">弊社は独自の<strong>CTIシステム（電話統合）</strong>と<strong>CRMシステム（顧客管理）</strong>をシームレスに連携。<br />着信と同時にお客様情報を表示し、過去の履歴に基づいた「個客」対応を実現します。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTI Section -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col-reverse md:flex-row items-center gap-16">
                <!-- Text Area -->
                <div class="md:w-1/2">
                    <span class="text-salon-gold font-bold tracking-widest text-sm block mb-2">SYSTEM 01</span>
                    <h2 class="text-3xl font-bold font-heading text-botanical-primary mb-6">CTIシステム<span class="block text-xs font-normal text-gray-400 mt-2 tracking-wider uppercase">Computer Telephony Integration</span></h2>
                    <div class="w-20 h-1 bg-salon-gold mb-8"></div>
                    <div class="space-y-4">
                        <?php
                        $ctiFeatures = array(
                            array('title' => 'ポップアップ表示', 'desc' => '受電と同時に顧客カルテをPC画面に自動表示。お名前を呼ぶ「おもてなし」を、着信の瞬間からスタートできます。', 'icon' => 'monitor', 'img' => 'https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?auto=format&fit=crop&q=80&w=1000'),
                            array('title' => '全通話 常時録音', 'desc' => '全ての通話をクラウドに自動記録。「言った・言わない」のトラブルを未然に防ぎ、応対品質の改善にも活用します。', 'icon' => 'mic', 'img' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?auto=format&fit=crop&q=80&w=1000'),
                            array('title' => 'セキュリティ連携', 'desc' => '大切な顧客情報は、堅牢なセキュリティ下で管理。CTI連携により、手動検索の手間とミスを同時に削減します。', 'icon' => 'shield-check', 'img' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&q=80&w=1000'),
                            array('title' => '複数回線の同時通話', 'desc' => '話し中でも他のお電話を逃しません。複数のオペレーターが同時に対応できるため、お待たせすることなく受電率を最大化します。', 'icon' => 'phone-forwarded', 'img' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&q=80&w=1000'),
                            array('title' => '月度報告書の送付', 'desc' => '毎月の受電件数や内容を詳しくまとめたレポートを提出。サロン運営の分析や改善に役立つ貴重なデータをご提供します。', 'icon' => 'file-text', 'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000'),
                        );
                        foreach ($ctiFeatures as $idx => $feature) :
                        ?>
                            <div class="cti-tab-btn flex gap-4 p-5 rounded-2xl transition-all duration-300 cursor-pointer group/item border border-transparent hover:bg-gray-50 <?php echo $idx === 0 ? 'bg-salon-light border-salon-gold/20 shadow-md translate-x-2' : ''; ?>" data-target="cti-<?php echo $idx; ?>" data-img="<?php echo $feature['img']; ?>">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 transition-all duration-500 <?php echo $idx === 0 ? 'bg-botanical-primary text-white' : 'bg-gray-100 text-botanical-primary'; ?>">
                                    <?php salon_icon($feature['icon'], 'w-5 h-5'); ?>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-700 group-hover/item:text-botanical-primary <?php echo $idx === 0 ? 'text-botanical-primary' : ''; ?>"><?php echo $feature['title']; ?></h3>
                                    <div class="opacity-<?php echo $idx === 0 ? '100' : '0'; ?> mt-2 content-area transition-all duration-500">
                                        <p class="text-gray-500 text-sm leading-relaxed"><?php echo $feature['desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Image Area -->
                <div class="w-full md:w-1/2">
                    <div class="relative bg-gray-900 p-2 md:p-4 rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden aspect-[16/10] border-4 border-gray-800 flex flex-col">
                        <div class="flex items-center px-4 gap-1.5 h-6 bg-gray-800/50 backdrop-blur-sm shrink-0">
                            <div class="w-2 h-2 rounded-full bg-red-500/50"></div>
                            <div class="w-2 h-2 rounded-full bg-yellow-500/50"></div>
                            <div class="w-2 h-2 rounded-full bg-green-500/50"></div>
                        </div>
                        <div class="relative flex-1 overflow-hidden">
                            <img id="cti-display-img" src="<?php echo $ctiFeatures[0]['img']; ?>" class="w-full h-full object-cover object-top transition-all duration-700">
                            <!-- UI Overlay -->
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur p-3 rounded-lg shadow-xl border border-white/50 animate-bounce transition-all duration-500 overflow-hidden max-w-[140px]">
                                <div class="flex items-center gap-2 mb-1">
                                    <div class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></div>
                                    <span class="text-[10px] font-bold text-gray-800">着信中...</span>
                                </div>
                                <p class="text-[11px] font-bold text-botanical-primary truncate">ポップアップ表示</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CRM Section -->
    <section class="py-24 bg-botanical-primary text-white overflow-hidden relative">
        <div class="container mx-auto px-6 max-w-6xl relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <!-- Text Area -->
                <div class="md:w-1/2">
                    <span class="text-salon-gold font-bold tracking-widest text-sm block mb-2">SYSTEM 02</span>
                    <h2 class="text-3xl font-bold font-heading mb-6">CRMシステム<span class="block text-xs font-normal text-gray-400 mt-2 tracking-wider">Customer Relationship Management</span></h2>
                    <div class="w-20 h-1 bg-salon-gold mb-8"></div>
                    <div class="space-y-4">
                        <?php
                        $crmFeatures = array(
                            array('title' => '予約状況の確認', 'desc' => '全店舗の空き枠をリアルタイムで一元管理。複雑なシフトも直感的なUIで瞬時に把握し、予約の取りこぼしを防ぎます。', 'icon' => 'clock', 'img' => salon_img('/images/images/features/feature-system.png')),
                            array('title' => '顧客情報の管理', 'desc' => '来店履歴や好みの詳細までをデジタルカルテ化。過去のデータを武器に、個別の「おもてなし」を実現します。', 'icon' => 'users', 'img' => salon_img('/images/customer_management_luxury_1768682781900.png')),
                            array('title' => 'セラピストの登録', 'desc' => 'スタッフのスキルや稼働状況をきめ細かく設定可能。現場の負担を最小限に抑えつつ、最適な人員配置をサポートします。', 'icon' => 'zap', 'img' => salon_img('/images/therapist_registry_luxury_1768682795692.png')),
                            array('title' => '売上レポート', 'desc' => '日々の売上データを自動集計。セラピスト別、コース別の集計も可能で、経営状況をリアルタイムに可視化します。', 'icon' => 'bar-chart-3', 'img' => salon_img('/images/sales_report_luxury_1768682812756.png')),
                        );
                        foreach ($crmFeatures as $idx => $feature) :
                        ?>
                            <div class="crm-tab-btn flex gap-4 p-5 rounded-2xl transition-all duration-300 cursor-pointer group/item border border-transparent hover:bg-white/5 <?php echo $idx === 0 ? 'bg-white/10 border-white/20 shadow-xl translate-x-2' : ''; ?>" data-target="crm-<?php echo $idx; ?>" data-img="<?php echo $feature['img']; ?>">
                                <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 transition-all duration-500 <?php echo $idx === 0 ? 'bg-salon-gold text-botanical-primary' : 'bg-white/10 text-salon-gold'; ?>">
                                    <?php salon_icon($feature['icon'], 'w-5 h-5'); ?>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-white/80 group-hover/item:text-white <?php echo $idx === 0 ? 'text-salon-gold' : ''; ?>"><?php echo $feature['title']; ?></h3>
                                    <div class="opacity-<?php echo $idx === 0 ? '100' : '0'; ?> mt-2 content-area transition-all duration-500">
                                        <p class="text-gray-300 text-sm leading-relaxed"><?php echo $feature['desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <p class="mt-8 text-[10px] text-white/40 italic leading-relaxed">
                            ※こちらのCRMシステムはMr.Ventyのサポート対象です。
                        </p>
                    </div>
                </div>
                <!-- Image Area -->
                <div class="w-full md:w-1/2">
                    <div class="relative bg-white/10 backdrop-blur-md border border-white/20 p-2 md:p-4 rounded-2xl md:rounded-3xl shadow-2xl overflow-hidden aspect-[16/10] w-full flex flex-col">
                        <div class="flex items-center gap-2 px-2 pb-4 border-b border-white/10 shrink-0">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
                        </div>
                        <div class="relative flex-1 overflow-hidden mt-2">
                            <img id="crm-display-img" src="<?php echo $crmFeatures[0]['img']; ?>" class="w-full h-full object-cover object-top rounded-xl transition-all duration-700">
                            <!-- UI Overlay -->
                            <div class="absolute bottom-4 left-4 bg-salon-gold/90 backdrop-blur p-3 rounded-lg shadow-xl border border-white/30 animate-pulse overflow-hidden max-w-[150px]">
                                <p class="text-[10px] font-black text-botanical-primary uppercase mb-1">Status</p>
                                <p class="text-[12px] font-bold text-botanical-primary">予約状況の確認</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Web Solutions Section -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <span class="text-salon-gold font-bold tracking-widest text-sm block mb-2 uppercase">Web Solution</span>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-botanical-primary">店舗運営を加速させる<br class="md:hidden" />ウェブソリューション</h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Web Reservation -->
                <div class="group bg-gray-50 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col">
                    <div class="aspect-video overflow-hidden">
                        <img src="<?php echo salon_img('/images/images/features/feature-preparation.png'); ?>" alt="Web Reservation" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="text-2xl font-bold text-botanical-primary mb-4 font-heading">WEB予約システム</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-1">
                            24時間365日、お客様がいつでも予約可能な環境を構築。CTI・CRMと完全に同期し、ダブルブッキングを自動で防ぎながら、成約率を最大化へと導きます。
                        </p>
                        <div class="pt-6 border-t border-gray-200">
                            <span class="inline-flex items-center gap-2 text-salon-gold font-bold text-sm">
                                <?php salon_icon('check-circle', 'w-4 h-4'); ?>
                                リアルタイム自動同期機能
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Web Production -->
                <div class="group bg-gray-50 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 flex flex-col">
                    <div class="aspect-video overflow-hidden">
                        <img src="<?php echo salon_img('/images/images/features/feature-web-v2.png'); ?>" alt="Web Production" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-2xl font-bold text-botanical-primary font-heading">独自ホームページ制作</h3>
                            <div class="text-right">
                                <p class="text-[10px] font-bold text-salon-gold uppercase">Special Price</p>
                                <p class="text-lg font-black text-botanical-primary tracking-tighter">¥20,000<span class="text-[10px] font-normal ml-0.5">〜</span></p>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-1">
                            集客力に特化した、レスポンシブ対応の高品質なサイトを制作。予約システムと直結することで、管理画面一つでサイト内の情報もリアルタイムに更新可能です。
                        </p>
                        <div class="pt-6 border-t border-gray-200 flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-400">月額 ¥10,000〜</span>
                            <a href="#" class="text-salon-gold hover:text-botanical-primary transition-colors"><?php salon_icon('arrow-right', 'w-5 h-5'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing Section -->
    <section class="py-24 bg-white text-center">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl font-bold font-heading text-gray-800 mb-8">システムがあるからこそ、<br /><span class="text-botanical-primary">人間味のある対応</span>ができる。</h2>
            <p class="text-gray-500 leading-loose mb-12">私たちはテクノロジーを「効率化」のためだけには使いません。<br />面倒な作業をシステムに任せることで、生まれた時間と心の余裕を、お客様への「おもてなし」に注ぐために使うのです。<br /><strong>それが、Salon Conciergeの流儀です。</strong></p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-block bg-salon-pink text-white px-12 py-4 rounded-full font-bold shadow-lg hover:shadow-xl hover:bg-opacity-90 transition-all transform hover:-translate-y-1">導入のご相談はこちら</a>
        </div>
    </section>
</div>

<script>
document.querySelectorAll('.cti-tab-btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        document.getElementById('cti-display-img').src = this.dataset.img;
        document.querySelectorAll('.cti-tab-btn').forEach(b => {
            b.classList.remove('bg-salon-light', 'border-salon-gold/20', 'shadow-md', 'translate-x-2');
            b.querySelector('.content-area').classList.add('opacity-0');
            b.querySelector('h3').classList.remove('text-botanical-primary');
            b.querySelector('.w-12').classList.remove('bg-botanical-primary', 'text-white');
            b.querySelector('.w-12').classList.add('bg-gray-100', 'text-botanical-primary');
        });
        this.classList.add('bg-salon-light', 'border-salon-gold/20', 'shadow-md', 'translate-x-2');
        this.querySelector('.content-area').classList.remove('opacity-0');
        this.querySelector('h3').classList.add('text-botanical-primary');
        this.querySelector('.w-12').classList.add('bg-botanical-primary', 'text-white');
        this.querySelector('.w-12').classList.remove('bg-gray-100', 'text-botanical-primary');
    });
});

document.querySelectorAll('.crm-tab-btn').forEach(btn => {
    btn.addEventListener('mouseenter', function() {
        document.getElementById('crm-display-img').src = this.dataset.img;
        document.querySelectorAll('.crm-tab-btn').forEach(b => {
            b.classList.remove('bg-white/10', 'border-white/20', 'shadow-xl', 'translate-x-2');
            b.querySelector('.content-area').classList.add('opacity-0');
            b.querySelector('h3').classList.remove('text-salon-gold');
            b.querySelector('.w-12').classList.remove('bg-salon-gold', 'text-botanical-primary');
            b.querySelector('.w-12').classList.add('bg-white/10', 'text-salon-gold');
        });
        this.classList.add('bg-white/10', 'border-white/20', 'shadow-xl', 'translate-x-2');
        this.querySelector('.content-area').classList.remove('opacity-0');
        this.querySelector('h3').classList.add('text-salon-gold');
        this.querySelector('.w-12').classList.add('bg-salon-gold', 'text-botanical-primary');
        this.querySelector('.w-12').classList.remove('bg-white/10', 'text-salon-gold');
    });
});
</script>

<?php get_footer(); ?>
