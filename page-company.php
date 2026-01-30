<?php
/**
 * Template Name: Company Page
 */
get_header(); ?>

<div class="bg-white min-h-screen pb-20 font-sans">
    <!-- Hero Section -->
    <section class="relative min-h-[500px] md:min-h-[600px] flex items-center overflow-hidden bg-white">
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-full h-full opacity-[0.03]" style="background-image: radial-gradient(#1B4332 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#c5a085]/5 rounded-full blur-3xl"></div>
        </div>

        <div class="absolute top-0 right-0 w-1/2 h-full hidden lg:block">
            <div class="absolute inset-0 bg-gray-50 origin-right transform -skew-x-12 translate-x-32 scale-y-110"></div>
            <div class="absolute inset-0 bg-[#3a5f56]/5 origin-right transform -skew-x-6 translate-x-16"></div>
        </div>

        <div class="container-custom relative z-10 py-16 md:py-24">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <!-- Left Side: Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center gap-3 mb-6">
                        <span class="w-8 md:w-12 h-px bg-[#c5a085]"></span>
                        <span class="text-[#c5a085] font-bold tracking-[0.4em] text-[10px] md:text-xs uppercase">About Our Vision</span>
                    </div>

                    <h1 class="relative mb-8 md:mb-10">
                        <span class="block text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-bold font-heading text-[#3a5f56] leading-tight mb-2">
                            <span class="keep-phrase">どんな難題だって</span>
                        </span>
                        <span class="block text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold font-heading text-[#3a5f56]/60 leading-tight">
                            <span class="keep-phrase">情熱と技術で</span><br class="hidden sm:block" /><span class="keep-phrase">越えていく。</span>
                        </span>
                        <div class="absolute -left-4 top-0 w-1 h-2/3 bg-[#c5a085]/50 rounded-full hidden lg:block"></div>
                    </h1>

                    <p class="text-gray-500 text-sm md:text-base leading-loose max-w-lg mb-10 mx-auto lg:mx-0">
                        <span class="keep-phrase">ビジネスを取り巻く課題を、</span><span class="keep-phrase">人の温もりとITの力で解決する。</span><br class="hidden sm:block" />
                        <span class="keep-phrase">そんな新しい可能性に満ちた未来を</span><span class="keep-phrase">創造するのがSalon Conciergeです。</span><br class="hidden sm:block" />
                        <span class="keep-phrase">未来へ先回りするパートナーをお探しなら、</span><span class="keep-phrase">ぜひご相談ください。</span>
                    </p>

                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 md:gap-6">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-salon-pink"></div>
                            <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase">Innovation</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-[#c5a085]"></div>
                            <span class="text-[10px] font-bold tracking-tighter text-gray-400 uppercase">Hospitality</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Integrated Image -->
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative z-10 group">
                        <div class="relative rounded-[32px] md:rounded-[100px] overflow-hidden aspect-[4/3] md:aspect-square shadow-2xl">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=1200" alt="Modern Office" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-tr from-[#3a5f56]/20 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="py-24 bg-gray-50/50 relative">
        <div class="container mx-auto px-6 max-w-5xl relative z-10">
            <div class="flex flex-col items-center text-center">
                <span class="text-[#c5a085] font-bold tracking-widest text-xs mb-4 uppercase">Philosophy</span>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-[#3a5f56] mb-12">企業理念</h2>

                <div class="relative mb-8 md:mb-16 px-6 md:px-12 py-10 md:py-16 bg-white/50 backdrop-blur-sm rounded-[32px] md:rounded-[40px] border border-white/50 shadow-sm max-w-3xl mx-auto">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#3a5f56] text-white p-3 rounded-2xl shadow-lg">
                        <?php salon_icon('sparkles', 'w-6 h-6'); ?>
                    </div>
                    <h3 class="text-xl md:text-3xl font-bold text-gray-800 leading-tight mb-8">
                        <span class="keep-phrase">「最高峰の対話力で、</span><br class="sm:hidden" /><span class="keep-phrase">サロンの可能性を</span><span class="keep-phrase">最大化する。」</span>
                    </h3>
                    <div class="space-y-6 text-gray-600 leading-loose text-base md:text-lg">
                        <p>
                            <span class="keep-phrase">電話の一本一本に、</span><span class="keep-phrase">サロンの未来が宿っています。</span><br class="hidden sm:block" />
                            <span class="keep-phrase">私たちはその重要性を</span><span class="keep-phrase">深く理解し、</span><span class="keep-phrase">業界トップクラスの応対スキルで</span><span class="keep-phrase">お客様の期待を超える感動を</span><span class="keep-phrase">届けます。</span>
                        </p>
                        <div class="pt-6 border-t border-gray-100 italic font-medium text-[#3a5f56] break-words-jp">
                            <span class="keep-phrase">メンズエステ特有の市場環境を</span><span class="keep-phrase">熟知した専門集団として、</span><span class="keep-phrase">貴社のビジネスに確かな</span><span class="keep-phrase">付加価値をプラスし、</span><span class="keep-phrase">唯一無二の存在として</span><span class="keep-phrase">支え抜きます。</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-16">
                <span class="text-[#c5a085] font-bold tracking-widest text-xs mb-4 uppercase">Values</span>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-[#3a5f56]">大切にしている価値観</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php 
                $values = [
                    ['id' => 1, 'title' => '安心・安全の提供', 'desc' => 'セラピスト様・店舗様・お客様、すべての関係者に安心感を与える対応を。トラブルを未然に防ぎ、円滑な運営を支える“影の立役者”としての責任を果たします。'],
                    ['id' => 2, 'title' => '誠実さと信頼', 'desc' => 'お客様の大切な“第一印象”を担う存在として、常に誠実で丁寧な対応を心がけています。小さな信頼の積み重ねが、長期的なパートナーシップを築く礎になると信じています。'],
                    ['id' => 3, 'title' => 'プロフェッショナル意識', 'desc' => '専門性とスキルの向上に妥協せず、すべてのスタッフがプロとしての意識を持ち、高品質なサービスを提供し続けます。'],
                    ['id' => 4, 'title' => '店舗様ファーストの精神', 'desc' => '私たちは「受付業務の代行」ではなく、「売上のサポート」をするパートナーでありたいと考えています。店舗様の方針やこだわりに寄り添い、それぞれに最適な対応を徹底致します。'],
                    ['id' => 5, 'title' => 'ITシステムの最適化', 'desc' => '私たちは、業務効率と顧客満足度の向上を実現するため、ご利用いただく店舗様やセラピスト様、そしてお客様の声を反映させながら、ITシステムの継続的な開発と改善を日々進めています。'],
                    ['id' => 6, 'title' => '働く人に誇りを', 'desc' => '電話受付という仕事にプライドを持ち、自信を持って対応できる環境づくり。スタッフ一人ひとりが輝ける場を提供します。']
                ];
                foreach($values as $v): ?>
                    <div class="group bg-gray-50/50 p-6 md:p-8 rounded-[32px] border border-transparent hover:border-[#c5a085]/20 hover:bg-white hover:shadow-xl transition-all duration-500">
                        <div class="flex gap-6 items-start">
                            <div class="w-12 h-12 md:w-14 md:h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center shrink-0 group-hover:bg-[#3a5f56] group-hover:text-white transition-colors duration-500">
                                <?php salon_icon('diamond', 'text-[#c5a085] group-hover:text-white w-6 h-6'); ?>
                            </div>
                            <div>
                                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-3 group-hover:text-[#3a5f56] transition-colors">
                                    <span class="text-[#c5a085] mr-2 text-sm italic opacity-50">0<?php echo $v['id']; ?></span><?php echo $v['title']; ?>
                                </h3>
                                <p class="text-sm text-gray-500 leading-relaxed group-hover:text-gray-600 transition-colors"><?php echo $v['desc']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Company Overview Section -->
    <section class="py-20 md:py-32 bg-[#3a5f56] relative overflow-hidden">
        <div class="container-custom relative z-10">
            <div class="text-center mb-12 md:mb-16">
                <span class="text-[#c5a085] font-bold tracking-widest text-xs mb-4 uppercase">Overview</span>
                <h2 class="text-2xl md:text-4xl font-bold font-heading text-white">会社概要</h2>
            </div>

            <div class="bg-white rounded-[32px] md:rounded-[40px] shadow-2xl overflow-hidden p-6 sm:p-8 md:p-16 max-w-4xl mx-auto">
                <div class="space-y-0">
                    <?php 
                    $info = [
                        ['label' => '会社名', 'content' => '合同会社オスカン'],
                        ['label' => '所在地', 'content' => '東京都港区浜松町2-2-15 ダイヤビル2F'],
                        ['label' => '事業内容', 'content' => '電話受付代行／コンサルティング／店舗運営コンサルティング／WEBシステム・ホームページ制作／広告運用代行'],
                        ['label' => '電話番号', 'content' => '080-1017-5318'],
                        ['label' => 'ウェブサイトURL', 'content' => '<a href="https://osukan.com/" target="_blank" class="hover:text-[#3a5f56] underline">https://osukan.com/</a>'],
                        ['label' => 'メールアドレス', 'content' => 'info-callcenter@osukan.com'],
                        ['label' => '設立年月', 'content' => '2018年7月'],
                        ['label' => '代表者名', 'content' => '一条 蓮'],
                        ['label' => '従業員数', 'content' => '20名'],
                        ['label' => '資本金', 'content' => '500万円'],
                        ['label' => '取引銀行', 'content' => 'GMOあおぞら銀行']
                    ];
                    foreach($info as $row): ?>
                        <div class="flex flex-col md:flex-row border-b border-gray-100 py-5 md:py-6 last:border-0 group hover:bg-gray-50/50 transition-colors px-4 -mx-4 rounded-xl">
                            <span class="md:w-1/3 font-bold text-gray-400 text-[10px] md:text-sm mb-1 md:mb-0 uppercase tracking-wider"><?php echo $row['label']; ?></span>
                            <span class="md:w-2/3 text-gray-700 font-medium text-sm md:text-base"><?php echo $row['content']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Access Section -->
    <section class="py-24 bg-gray-50/50">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <span class="text-[#c5a085] font-bold tracking-widest text-xs mb-4 uppercase">Access</span>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-[#3a5f56]">アクセス</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-start">
                <div class="lg:col-span-2 space-y-12">
                    <div class="bg-white p-10 rounded-[40px] shadow-sm border border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 border-b border-[#c5a085]/20 pb-4">合同会社オスカン</h3>
                        <div class="space-y-6">
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 rounded-full bg-[#3a5f56]/5 flex items-center justify-center shrink-0">
                                    <span class="text-[#c5a085] font-bold text-xs">ADD</span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-400 mb-1">所在地</p>
                                    <p class="text-gray-700 leading-relaxed text-sm">〒105-0013<br />東京都港区浜松町2-2-15 ダイヤビル2F</p>
                                </div>
                            </div>
                            <div class="flex gap-4 items-start">
                                <div class="w-10 h-10 rounded-full bg-[#3a5f56]/5 flex items-center justify-center shrink-0">
                                    <span class="text-[#c5a085] font-bold text-xs">STA</span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-400 mb-1">最寄り駅</p>
                                    <p class="text-gray-700 text-sm">JR山手線・京浜東北線「浜松町駅」より徒歩3分<br />都営大江戸線・浅草線「大門駅」より徒歩3分</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#3a5f56] p-10 rounded-[40px] text-white shadow-xl">
                        <h4 class="text-xl font-bold mb-4 flex items-center gap-3 text-[#c5a085]">
                            <i data-lucide="sparkles" class="w-5 h-5"></i>ご来社について
                        </h4>
                        <p class="text-sm leading-loose opacity-80">ご相談・面談は完全予約制となっております。<br />事前にお問い合わせフォームや公式LINEにてご予約をお願いいたします。</p>
                        <div class="mt-8">
                            <a href="<?php echo home_url('/contact'); ?>" class="inline-flex items-center justify-center w-full bg-[#d4a373] text-white px-8 py-4 rounded-full font-bold shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-1">お問い合わせフォームへ ≫</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white p-2 md:p-4 rounded-[40px] shadow-2xl border border-gray-100 overflow-hidden relative">
                        <div class="aspect-[4/3] relative rounded-[32px] overflow-hidden">
                            <iframe src="https://maps.google.com/maps?q=東京都港区浜松町２丁目２－１５ダイヤビル２Ｆ&t=&z=15&ie=UTF8&iwloc=&output=embed" class="absolute inset-0 w-full h-full" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
