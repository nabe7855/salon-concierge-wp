<?php get_header(); ?>

<div class="font-sans text-botanical-text bg-botanical-bg">
    <!-- Hero Section -->
    <section class="relative min-h-[80vh] md:min-h-[90vh] flex items-center pt-20 pb-4 md:pb-20 overflow-hidden">
        <!-- Background Image & Overlay -->
        <div class="absolute inset-0 z-0">
            <picture>
                <!-- Mobile optimized image -->
                <source media="(max-width: 767px)" srcset="<?php echo salon_img('/images/images/hero-mobile.png'); ?>">
                <!-- Desktop optimized image -->
                <img src="<?php echo salon_img('/images/images/hero-bg-v2.png'); ?>" alt="Call Center" class="w-full h-full object-contain object-top md:object-cover md:object-center lg:object-[center_right]">
            </picture>
            <!-- Mobile-only background color fill -->
            <div class="absolute inset-0 bg-botanical-bg -z-10 md:hidden"></div>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-gray-50/100 via-gray-50/70 to-transparent md:from-white/95 md:via-white/80 md:via-white/60 md:to-transparent"></div>
        </div>

        <div class="container-custom relative z-10 w-full">
            <div class="max-w-2xl lg:ml-0 animate-fade-in text-center md:text-left">
                <span class="inline-flex items-center gap-2 bg-botanical-primary/90 text-white px-4 py-1.5 rounded-full text-[10px] md:text-xs font-bold tracking-widest shadow-sm mb-6">
                    <?php salon_icon('leaf', 'fill-white stroke-none w-[12px] h-[12px]'); ?>
                    <span class="keep-phrase">業界No.1の応答率・継続率</span>
                </span>

                <h2 class="text-3xl md:text-5xl lg:text-7xl font-bold font-heading text-botanical-primary leading-[1.2] md:leading-[1.1] mb-6 drop-shadow-[0_0_10px_rgba(255,255,255,1)]">
                    <span class="keep-phrase">メンズエステ専門</span><br />
                    <span class="text-botanical-cta keep-phrase">電話代行サービス</span>
                </h2>

                <p class="text-lg md:text-xl font-medium text-gray-800 leading-relaxed mb-10 max-w-xl mx-auto md:mx-0 drop-shadow-[0_0_8px_rgba(255,255,255,1)]">
                    <span class="keep-phrase">お客様を逃さない</span><span class="text-botanical-primary font-bold keep-phrase">24時間365日対応</span>。<br />
                    <span class="keep-phrase">受付業務はプロに任せて</span>、<span class="keep-phrase">本業のサロン経営に集中できます</span>。
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4 mb-8">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-cta text-lg px-10 py-4 shadow-xl hover:shadow-2xl ring-4 ring-botanical-cta/20 transform hover:-translate-y-1 transition-all w-full sm:w-auto">
                        今すぐ無料相談する
                        <?php salon_icon('arrow-right', 'w-5 h-5'); ?>
                    </a>
                </div>

                <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 md:gap-5 mt-2">
                    <!-- Medals -->
                    <div class="flex flex-col items-center justify-center w-[84px] h-[84px] md:w-28 md:h-28 rounded-full bg-gradient-to-br from-[#FFFDE7] via-[#FFF59D] to-[#FBC02D] border-[3px] md:border-[4px] border-[#fff] shadow-[0_6px_10px_rgba(0,0,0,0.15),0_0_0_1px_rgba(251,192,45,1)] relative transform hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-2 rounded-full border border-[#F9A825]/30"></div>
                        <div class="flex flex-col items-center justify-center z-10 text-[#5D4037] leading-none text-center">
                            <span class="text-[9px] md:text-[11px] font-extrabold mb-0.5">Initial Cost</span>
                            <span class="text-[10px] md:text-xs font-black block scale-90 md:scale-100">初期費用</span>
                            <span class="text-base md:text-xl font-black text-[#E65100]">0円</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center w-[84px] h-[84px] md:w-28 md:h-28 rounded-full bg-gradient-to-br from-[#FFFDE7] via-[#FFF59D] to-[#FBC02D] border-[3px] md:border-[4px] border-[#fff] shadow-[0_6px_10px_rgba(0,0,0,0.15),0_0_0_1px_rgba(251,192,45,1)] relative transform hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-2 rounded-full border border-[#F9A825]/30"></div>
                        <div class="flex flex-col items-center justify-center z-10 text-[#5D4037] leading-none text-center">
                            <span class="text-[9px] md:text-[11px] font-extrabold mb-0.5">Speed</span>
                            <span class="text-[10px] md:text-xs font-black block scale-90 md:scale-100">即日</span>
                            <span class="text-xs md:text-sm font-black">スタート可</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-center w-[84px] h-[84px] md:w-28 md:h-28 rounded-full bg-gradient-to-br from-[#FFFDE7] via-[#FFF59D] to-[#FBC02D] border-[3px] md:border-[4px] border-[#fff] shadow-[0_6px_10px_rgba(0,0,0,0.15),0_0_0_1px_rgba(251,192,45,1)] relative transform hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-2 rounded-full border border-[#F9A825]/30"></div>
                        <div class="flex flex-col items-center justify-center z-10 text-[#5D4037] leading-none text-center">
                            <span class="text-[9px] md:text-[11px] font-extrabold mb-0.5">Online</span>
                            <span class="text-[13px] md:text-base font-black py-0.5">全国</span>
                            <span class="text-[10px] md:text-xs font-black">対応</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Problems Section -->
    <section class="bg-white py-16 md:py-24 border-b border-gray-100 relative overflow-hidden">
        <div class="container-custom relative z-10">
            <div class="text-center mb-16">
                <span class="text-botanical-primary font-bold tracking-widest text-xs uppercase mb-3 block opacity-70">PAIN POINTS</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-heading reveal-on-scroll">
                    <span class="keep-phrase">こんなお悩みは</span><span class="keep-phrase">ありませんか？</span>
                </h2>
                <div class="mx-auto mt-4 w-12 h-1 bg-botanical-cta rounded-full reveal-on-scroll reveal-delay-1"></div>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                <?php
                $problems = array(
                    array(
                        'image' => '/images/pain-phone.png', 
                        'text' => "電話が多すぎて、対応出来ず取りこぼしてる、、、",
                        'stats' => "応答率10%低下につき月間 約15〜30万円の損失"
                    ),
                    array(
                        'image' => '/images/pain-line.png', 
                        'text' => "LINEやWeb予約の返信が遅れ、機会損失になっている…",
                        'stats' => "返信まで3分以上経過すると、成約率は80%以上低下します"
                    ),
                    array(
                        'image' => '/images/pain-midnight.png', 
                        'text' => "深夜や早朝の問い合わせに対応できず、売上を逃している…",
                        'stats' => "深夜・早朝のアクセスは全体の25%。放置は売上の1/4を捨てるのと同じです"
                    ),
                );
                foreach ($problems as $idx => $item) :
                ?>
                    <div class="bg-white p-8 md:p-10 rounded-3xl border border-gray-100 text-center shadow-[0_4px_20px_rgba(0,0,0,0.03)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.08)] transition-all duration-500 group relative overflow-hidden flex flex-col items-center transform hover:-translate-y-2 reveal-on-scroll reveal-delay-<?php echo $idx + 1; ?>">
                        <!-- Background Accent -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-botanical-primary/5 rounded-bl-[5rem] transition-all group-hover:bg-botanical-primary/10 -z-0"></div>
                        
                        <!-- Case Tag -->
                        <span class="relative z-10 inline-block px-3 py-1 rounded-full bg-sage-100 text-botanical-primary text-[10px] font-bold tracking-widest mb-6 opacity-80 uppercase">Case 0<?php echo $idx + 1; ?></span>

                        <!-- Illustration Container -->
                        <div class="relative z-10 w-full h-60 md:h-72 mb-8 flex items-center justify-center overflow-hidden rounded-2xl bg-gray-50/50 group-hover:bg-white transition-colors duration-500">
                            <img src="<?php echo salon_img($item['image']); ?>" alt="" class="max-w-[95%] max-h-[95%] object-contain group-hover:scale-110 transition-transform duration-700">
                        </div>

                        <!-- Text content -->
                        <div class="relative z-10 px-2">
                            <p class="font-bold text-gray-800 leading-relaxed text-lg md:text-2xl mb-5">
                                <?php echo esc_html($item['text']); ?>
                            </p>
                            <p class="text-botanical-cta font-bold text-xs md:text-sm tracking-wider opacity-90 break-words-jp px-4">
                                <?php echo esc_html($item['stats']); ?>
                            </p>
                        </div>
                        
                        <!-- Indicator -->
                        <div class="mt-8 pt-6 border-t border-gray-50 w-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center gap-2 text-botanical-cta font-bold text-xs">
                           <span>詳細を解決する</span>
                           <?php salon_icon('chevron-down', 'w-3 h-3'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-16 text-center bg-gradient-to-r from-botanical-primary/5 to-botanical-primary/10 p-6 md:p-10 rounded-2xl max-w-4xl mx-auto border border-botanical-primary/10 reveal-on-scroll">
                <p class="font-bold text-botanical-primary text-lg md:text-xl font-heading leading-relaxed">
                    <span class="keep-phrase">その課題、SalonConciergeが解決します。</span><br class="hidden md:block" />
                    <span class="keep-phrase">機会損失を防ぎ、</span><span class="keep-phrase">サロンの売上最大化に貢献します。</span>
                </p>
            </div>
        </div>
        
        <!-- Wavy Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] transform rotate-180">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-[calc(100%+1.3px)] h-[60px] fill-botanical-bg/30">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C57.05,115.33,235.58,72.33,321.39,56.44Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 md:py-32 bg-botanical-bg/30 relative">
        <div class="container-custom">
            <div class="text-center mb-16 md:mb-24">
                <span class="text-botanical-cta font-bold tracking-widest text-xs uppercase mb-3 block">OUR STRENGTHS</span>
                <h2 class="text-2xl md:text-4xl font-bold text-gray-800 font-heading">
                    <span class="keep-phrase">選ばれる</span><span class="keep-phrase">6つの理由</span>
                </h2>
            </div>

            <div class="flex flex-col gap-24">
                <?php
                $features = array(
                    array(
                        'title' => 'メンズエステサロン特有の対応に特化',
                        'subtitle' => '専門性',
                        'desc' => 'SMS案内、LINE予約、セラピストとの連携など、メンズエステならではの複雑なオペレーションを完全網羅。貴店のこだわりを最大限に反映した、オーダーメイドな対応を実現します。',
                        'detail' => '業界特有のニーズを熟知した専門的な対応力',
                        'image' => '/images/images/features/feature-specialized.png'
                    ),
                    array(
                        'title' => 'オペレーター全員の対応品質を徹底',
                        'subtitle' => '高品質',
                        'desc' => '現場経験者による厳しい研修をパスした正規スタッフのみが担当。単なる「電話受け」ではなく、一本一本の電話を確実に来店へとつなげる、ホスピタリティ溢れる応対をお約束します。',
                        'detail' => '成約率を最大化する「受付プロフェッショナル集団」',
                        'image' => '/images/images/features/operators_group.png'
                    ),
                    array(
                        'title' => 'スタート前の準備を徹底',
                        'subtitle' => 'サポート',
                        'desc' => '導入前に詳細なヒアリングを行い、独自の対応マニュアルを作成。顧客情報の移行やコース設定、セラピスト管理まで、専門スタッフがすべて代行するため、手間なく即戦力の体制を構築できます。',
                        'detail' => 'スムーズな導入を支える、貴店専用の運営マニュアル',
                        'image' => '/images/images/features/feature-preparation.png'
                    ),
                    array(
                        'title' => '様々なシステムを無料でご提供',
                        'subtitle' => 'DX支援',
                        'desc' => 'CTI、WEB予約、顧客管理、IP電話まで、運営に必要なITツールをすべて無料で提供。スマホ一台で全データを一元管理できるため、日々のタスクを大幅に削減し、経営に集中できる環境を整えます。',
                        'detail' => 'DX化で運営効率を劇的に高める、無料提供システム',
                        'image' => '/images/images/features/feature-system.png'
                    ),
                    array(
                        'title' => 'ホームページ制作',
                        'subtitle' => 'Web制作',
                        'desc' => '顧客管理システムとリアルタイムで連動する、高機能なHPを低コストで制作。シフトや出勤情報の一括更新が可能になり、更新の手間を省きながら、新規客の獲得を強力にサポートします。',
                        'detail' => '予約システム直結！集客と管理を両立するサイト制作',
                        'image' => '/images/images/features/feature-web-v2.png'
                    ),
                    array(
                        'title' => '経営コンサルティング',
                        'subtitle' => '成長支援',
                        'desc' => '集客・求人の悩みから日々の運営改善まで、長年のノウハウを惜しみなく提供。広告のスペシャリストや技術講師とのネットワークも活用し、貴店の売上最大化に向けたパートナーとして歩みます。',
                        'detail' => '持続的な成長を伴走支援する、トータルコンサルティング',
                        'image' => '/images/images/features/feature-consulting-v2.png'
                    ),
                );
                foreach ($features as $idx => $feature) :
                ?>
                    <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-24 <?php echo $idx % 2 === 1 ? 'md:flex-row-reverse' : ''; ?>">
                        <div class="w-full md:w-1/2 relative group">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                <img src="<?php echo salon_img($feature['image']); ?>" alt="<?php echo esc_attr($feature['title']); ?>" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors duration-500"></div>
                            </div>
                            <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-botanical-primary/10 rounded-full -z-10 group-hover:scale-150 transition-transform duration-700 <?php echo $idx % 2 === 1 ? 'right-auto -left-6' : ''; ?>"></div>
                        </div>

                        <div class="w-full md:w-1/2 relative">
                            <div class="absolute -top-16 -left-4 text-9xl font-bold text-botanical-primary/5 font-heading select-none pointer-events-none">0<?php echo $idx + 1; ?></div>
                            <div class="relative z-10">
                                <span class="text-botanical-cta font-bold text-sm tracking-wider mb-2 block"><?php echo esc_html($feature['subtitle']); ?> 0<?php echo $idx + 1; ?></span>
                                <h3 class="text-xl md:text-3xl font-bold text-gray-800 mb-6 font-heading leading-tight"><?php echo esc_html($feature['title']); ?></h3>
                                <h4 class="text-base md:text-lg font-bold text-botanical-primary mb-6 border-b-2 border-botanical-primary/20 pb-2 inline-block"><?php echo esc_html($feature['detail']); ?></h4>
                                <div class="space-y-3">
                                    <?php
                                    $sentences = explode('。', $feature['desc']);
                                    foreach ($sentences as $sentence) :
                                        if (empty($sentence)) continue;
                                    ?>
                                        <div class="flex items-start gap-3">
                                            <div class="mt-1.5 w-1.5 h-1.5 rounded-full bg-botanical-cta flex-shrink-0"></div>
                                            <p class="text-gray-600 leading-relaxed text-base"><?php echo esc_html($sentence); ?>。</p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 md:py-32 bg-white relative">
        <div class="container-custom">
            <div class="text-center mb-16">
                <span class="text-botanical-primary font-bold tracking-widest text-xs uppercase mb-3 block opacity-70">PRICING</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-heading">
                    <span class="keep-phrase">安心の</span><span class="keep-phrase">料金プラン</span>
                </h2>
                <p class="text-gray-500 mt-4 text-sm md:text-base max-w-lg mx-auto leading-relaxed">
                    <span class="keep-phrase">初期費用0円</span><span class="keep-phrase">キャンペーン実施中。</span><br class="sm:hidden" /><span class="keep-phrase">リスクなく始められます。</span>
                </p>
            </div>

            <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                <div class="p-8 md:p-12 md:w-2/3 border-b md:border-b-0 md:border-r border-gray-100 relative">
                    <div class="absolute top-0 left-0 w-full h-2 bg-botanical-primary"></div>
                    <h3 class="text-2xl font-bold text-botanical-primary mb-8 flex items-center gap-3 font-heading">スタンダードプラン</h3>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <?php salon_icon('check-circle', 'text-botanical-cta mt-1 flex-shrink-0 w-[22px] h-[22px]'); ?>
                            <div>
                                <span class="font-bold text-gray-800 text-lg block mb-1">初期費用 <span class="text-red-500 text-xl mx-1">0円</span> (キャンペーン中)</span>
                                <span class="text-xs text-gray-400">通常初期費用をお得にスタート</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <?php salon_icon('check-circle', 'text-botanical-cta mt-1 flex-shrink-0 w-[22px] h-[22px]'); ?>
                            <div>
                                <span class="font-bold text-gray-800 text-lg block mb-1">成果報酬 1,000円〜/件</span>
                                <span class="text-xs text-gray-400">予約が確定した分だけのお支払い</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <?php salon_icon('check-circle', 'text-botanical-cta mt-1 flex-shrink-0 w-[22px] h-[22px]'); ?>
                            <div>
                                <span class="font-bold text-gray-800 text-lg block mb-1">月額費用 スポット対応可</span>
                                <span class="text-xs text-gray-400">繁忙期だけの利用も可能です</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="p-10 md:p-12 md:w-1/3 bg-botanical-primary text-white flex flex-col justify-center items-center text-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/5 opacity-50"></div>
                    <div class="relative z-10">
                        <p class="text-4xl md:text-5xl font-bold mb-1 font-heading">¥1,000</p>
                        <p class="text-xs opacity-80 mb-8">〜 / 1件 (税込)</p>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="block w-full bg-white text-botanical-primary font-bold py-4 px-6 rounded-xl hover:bg-gray-50 transition-colors shadow-lg">無料見積り</a>
                        <p class="text-[9px] mt-4 opacity-60">※契約期間・解約金の縛りなし</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mt-12 text-sm text-gray-500">
                <span class="bg-gray-100 px-3 py-1 rounded-full">最短3営業日で開始</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">違約金なし</span>
                <span class="bg-gray-100 px-3 py-1 rounded-full">全国対応</span>
            </div>
        </div>
    </section>

    <!-- Flow Section -->
    <section id="flow" class="py-20 md:py-32 bg-botanical-bg/50">
        <div class="container-custom">
            <div class="text-center mb-16">
                <span class="text-botanical-cta font-bold tracking-widest text-xs uppercase mb-3 block">FLOW</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-heading">
                    <span class="keep-phrase">導入までの</span><span class="keep-phrase">流れ</span>
                </h2>
            </div>
            <div class="relative">
                <div class="hidden md:block absolute top-[18px] left-0 w-full h-0.5 bg-gray-200 -z-10 transform translate-y-8"></div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <?php
                    $steps = array(
                        array('step' => '01', 'title' => 'お問い合わせ', 'desc' => 'お電話またはフォームよりお気軽にご連絡ください。'),
                        array('step' => '02', 'title' => 'ヒアリング', 'desc' => '現状の課題やご要望をお伺いし、最適なプランをご提案します。'),
                        array('step' => '03', 'title' => '契約・準備', 'desc' => 'マニュアル作成やシステム設定を行います（最短3営業日）。'),
                        array('step' => '04', 'title' => '運用開始', 'desc' => 'オペレーター研修完了後、サービスを開始します。'),
                    );
                    foreach ($steps as $flow) :
                    ?>
                        <div class="relative group">
                            <div class="w-14 h-14 md:w-16 md:h-16 bg-white border-4 border-botanical-bg rounded-full flex items-center justify-center font-bold text-lg md:text-xl text-botanical-primary mb-6 mx-auto shadow-sm group-hover:scale-110 group-hover:border-botanical-cta transition-all duration-300 relative z-10"><?php echo $flow['step']; ?></div>
                            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center h-[calc(100%-80px)] hover:shadow-md transition-shadow">
                                <h3 class="font-bold text-lg text-gray-800 mb-3 font-heading"><?php echo $flow['title']; ?></h3>
                                <p class="text-sm text-gray-600 leading-relaxed"><?php echo $flow['desc']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-12 text-center">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex items-center gap-2 text-[#d4a373] font-bold hover:gap-4 transition-all">
                        詳しく相談する <?php salon_icon('chevron-right', 'w-4 h-4'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Preparation Section -->
    <section class="py-20 md:py-32 bg-white relative overflow-hidden">
        <div class="container-custom relative z-10">
            <div class="text-center mb-16">
                <span class="text-botanical-primary font-bold tracking-widest text-xs uppercase mb-3 block opacity-70">PREPARATION</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-heading">
                    <span class="keep-phrase">代行業務スタートに向けた</span><span class="keep-phrase">準備</span>
                </h2>
                <p class="text-gray-500 mt-4 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
                    <span class="keep-phrase">サービス開始にあたって</span><span class="keep-phrase">以下のものをご用意いただきます。</span><br class="hidden sm:block" />
                    <span class="keep-phrase">不足しているものがある場合も、</span><span class="keep-phrase">弊社で柔軟にサポートいたしますので</span><span class="keep-phrase">ご安心ください。</span>
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-6 lg:gap-8 max-w-5xl mx-auto">
                <?php
                $prep_items = array(
                    array('title' => 'ご予約受付用スマートフォン', 'desc' => '転送設定済みの端末を1台ご用意ください。弊社から無料のIP電話番号を発行しも可能です。', 'icon' => 'smartphone'),
                    array('title' => '予約受付用公式LINE', 'desc' => 'LINEでの予約対応をご希望の場合は、公式アカウントの作成をお願いしております。', 'icon' => 'message-circle'),
                    array('title' => '営業用ホームページ', 'desc' => '弊社で顧客管理システムとリアルタイムに連動する高機能なホームページを制作可能です。', 'icon' => 'globe'),
                    array('title' => '既存の顧客データ', 'desc' => '既に営業中の店舗様は、現在お使いの顧客情報の移行が可能です。厳重に管理いたします。', 'icon' => 'database'),
                );
                foreach ($prep_items as $item) :
                ?>
                    <div class="bg-botanical-bg/40 p-8 rounded-3xl border border-white/50 shadow-sm hover:shadow-md transition-all duration-300 group">
                        <div class="flex items-start gap-6">
                            <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-botanical-cta group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                                <?php salon_icon($item['icon'], 'w-[28px] h-[28px]'); ?>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3 font-heading"><?php echo $item['title']; ?></h3>
                                <p class="text-sm text-gray-600 leading-relaxed"><?php echo $item['desc']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 md:py-32 bg-white overflow-hidden">
        <div class="container-custom mb-16">
            <div class="text-center">
                <span class="text-botanical-primary font-bold tracking-widest text-xs uppercase mb-3 block opacity-70">VOICE</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-heading">
                    <span class="keep-phrase">導入サロン様の</span><span class="keep-phrase">声</span>
                </h2>
            </div>
        </div>
        <div class="relative">
            <div class="absolute left-0 top-0 bottom-0 w-16 md:w-48 bg-gradient-to-r from-white via-white/80 to-transparent z-10"></div>
            <div class="absolute right-0 top-0 bottom-0 w-16 md:w-48 bg-gradient-to-l from-white via-white/80 to-transparent z-10"></div>
            <div class="flex animate-marquee hover:pause gap-6">
                <?php
                $testimonials = array(
                    array('location' => '東京都 港区', 'name' => 'A店 オーナー様', 'rating' => 5, 'text' => '導入後は応答率がほぼ100%になり売上が前年比130%にアップしました。'),
                    array('location' => '大阪府 北区', 'name' => 'B店 店長様', 'rating' => 5, 'text' => '24時間対応のおかげで、深夜帯の取りこぼしが完全になくなりました。'),
                    array('location' => '福岡県 中央区', 'name' => 'C店 代表様', 'rating' => 4, 'text' => 'セラピストが施術に集中できる環境が整い、スタッフのストレスも減りました。'),
                );
                $display_testimonials = array_merge($testimonials, $testimonials); // Duplicate for marquee
                foreach ($display_testimonials as $voice) :
                ?>
                    <div class="w-[300px] md:w-[400px] flex-shrink-0 bg-botanical-bg/50 p-6 md:p-8 rounded-3xl border border-gray-100 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-6">
                                <div class="flex gap-4 items-center">
                                    <div class="w-12 h-12 bg-botanical-primary/10 rounded-full flex items-center justify-center text-botanical-primary flex-shrink-0"><?php salon_icon('user', 'w-[24px] h-[24px]'); ?></div>
                                    <div>
                                        <p class="font-bold text-gray-800 text-sm"><?php echo $voice['name']; ?></p>
                                        <p class="text-[10px] text-gray-500"><?php echo $voice['location']; ?></p>
                                    </div>
                                </div>
                                <div class="flex text-botanical-cta">
                                    <?php for ($j = 0; $j < 5; $j++) : ?>
                                        <?php salon_icon('star', 'w-[14px] h-[14px] ' . ($j < $voice['rating'] ? 'fill-current' : 'text-gray-300')); ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <p class="text-gray-600 italic text-sm leading-relaxed relative z-10">「<?php echo $voice['text']; ?>」</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 bg-botanical-primary relative overflow-hidden text-center text-white">
        <div class="container-custom relative z-10">
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold font-heading mb-6 tracking-tight leading-tight">
                <span class="keep-phrase">まずは無料相談から</span><br class="sm:hidden" /><span class="keep-phrase">始めませんか？</span>
            </h2>
            <p class="text-botanical-bg text-base sm:text-lg mb-12 max-w-2xl mx-auto font-medium leading-relaxed px-4">
                <span class="keep-phrase">導入前の疑問や不安な点など、</span><span class="keep-phrase">どんなことでもお気軽にご相談ください。</span><br class="hidden sm:block" />
                <span class="keep-phrase">しつこい営業は一切いたしません。</span>
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 md:gap-6 px-4">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="w-full sm:w-auto bg-white text-botanical-primary font-bold py-4 px-10 rounded-full hover:bg-gray-100 transition-all shadow-xl text-lg flex items-center justify-center gap-2 transform hover:-translate-y-1">
                    無料相談を予約する
                    <?php salon_icon('calendar', 'w-5 h-5'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/services')); ?>" class="w-full sm:w-auto bg-transparent border-2 border-white text-white font-bold py-4 px-10 rounded-full hover:bg-white/10 transition-all text-lg flex items-center justify-center gap-2 transform hover:-translate-y-1">
                    料金・プランを見る
                    <?php salon_icon('arrow-right', 'w-5 h-5'); ?>
                </a>
            </div>
            <p class="mt-8 text-[10px] md:text-xs opacity-60 flex items-center justify-center gap-1.5 px-4">
                <?php salon_icon('lock', 'w-3 h-3'); ?>
                <span class="keep-phrase">オンライン相談・登録は</span><span class="keep-phrase">SSL暗号化通信で守られています</span>
            </p>
        </div>
    </section>
</div>

<?php get_footer(); ?>
