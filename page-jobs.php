<?php
/**
 * Template Name: Jobs Page
 */

// Form Submission Handling
$form_success = false;
$form_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recruit_nonce'])) {
    // Nonce verification
    if (!wp_verify_nonce($_POST['recruit_nonce'], 'recruit_form_submit')) {
        $form_errors[] = '不正な送信です。もう一度お試しください。';
    }

    // Honeypot check
    if (!empty($_POST['website_hp'])) {
        exit; // Spam bot
    }

    if (empty($form_errors)) {
        // Collect and sanitize data
        $name            = sanitize_text_field($_POST['recruit_name']);
        $age             = sanitize_text_field($_POST['recruit_age']);
        $email           = sanitize_email($_POST['recruit_email']);
        $phone           = sanitize_text_field($_POST['recruit_phone']);
        $desired_hours   = sanitize_text_field($_POST['recruit_desired_hours']);
        $prefecture      = sanitize_text_field($_POST['recruit_prefecture']);
        $gender          = sanitize_text_field($_POST['recruit_gender']);
        $employment_type = sanitize_text_field($_POST['recruit_employment_type']);
        $desired_days    = sanitize_text_field($_POST['recruit_desired_days']);
        $comment         = sanitize_textarea_field($_POST['recruit_comment']);

        // Validation
        if (empty($name))            $form_errors[] = 'お名前を入力してください。';
        if (empty($age))             $form_errors[] = '年齢を入力してください。';
        if (!is_email($email))       $form_errors[] = '有効なメールアドレスを入力してください。';
        if (empty($phone))           $form_errors[] = 'お電話番号を入力してください。';
        if (empty($desired_hours))   $form_errors[] = '希望勤務時間を選択してください。';
        if (empty($prefecture))      $form_errors[] = '都道府県を選択してください。';
        if (empty($gender))          $form_errors[] = '性別を選択してください。';
        if (empty($employment_type)) $form_errors[] = '雇用形態を選択してください。';

        if (empty($form_errors)) {
            // Save to Database
            $post_id = wp_insert_post(array(
                'post_title'   => $name,
                'post_type'    => 'application',
                'post_status'  => 'publish',
            ));

            if ($post_id) {
                update_post_meta($post_id, 'name', $name);
                update_post_meta($post_id, 'age', $age);
                update_post_meta($post_id, 'email', $email);
                update_post_meta($post_id, 'phone', $phone);
                update_post_meta($post_id, 'desired_hours', $desired_hours);
                update_post_meta($post_id, 'prefecture', $prefecture);
                update_post_meta($post_id, 'gender', $gender);
                update_post_meta($post_id, 'employment_type', $employment_type);
                update_post_meta($post_id, 'desired_days', $desired_days);
                update_post_meta($post_id, 'comment', $comment);
            }

            // Prepare Email to Admin
            $admin_email = get_option('salon_form_notification_email');
            if (empty($admin_email)) {
                $admin_email = 'nabe7855@gmail.com';
            }
            $subject = '【求人応募】' . $name . '様よりエントリー';
            
            $body = "求人応募フォームよりエントリーが届きました。\n\n";
            $body .= "--------------------------------------------------\n";
            $body .= "【お名前】: {$name}\n";
            $body .= "【年齢】: {$age} 歳\n";
            $body .= "【メールアドレス】: {$email}\n";
            $body .= "【お電話番号】: {$phone}\n";
            $body .= "【性別】: " . ($gender === 'male' ? '男性' : '女性') . "\n";
            $body .= "【お住まいの都道府県】: {$prefecture}\n";
            $body .= "【雇用形態】: {$employment_type}\n";
            $body .= "【希望勤務時間】: {$desired_hours}\n";
            $body .= "【希望勤務日数】: 週 {$desired_days} 日\n\n";
            $body .= "【コメント欄】:\n{$comment}\n";
            $body .= "--------------------------------------------------\n";

            $headers = array('Content-Type: text/plain; charset=UTF-8');
            $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>';
            $headers[] = 'Reply-To: ' . $email;

            // Send to Admin
            $mail_sent = wp_mail($admin_email, $subject, $body, $headers);

            if ($mail_sent) {
                // Auto-reply to Applicant
                $reply_subject = '【サロンコンシェルジュ】求人へのご応募ありがとうございます';
                $reply_body = "{$name} 様\n\n";
                $reply_body .= "この度は、弊社の求人にご応募いただき誠にありがとうございます。\n";
                $reply_body .= "以下の内容にてエントリーを受け付けいたしました。\n\n";
                $reply_body .= "追って担当者より、面接日程等のご連絡をさせていただきます。\n";
                $reply_body .= "今しばらくお待ちいただけますと幸いです。\n\n";
                $reply_body .= $body;

                wp_mail($email, $reply_subject, $reply_body, $headers);
                $form_success = true;
            } else {
                $form_errors[] = '送信に失敗しました。お手数ですが、お電話にてお問い合わせください。';
            }
        }
    }
}

get_header(); ?>

<div class="bg-gray-50/50 min-h-screen font-sans text-gray-700">
    <!-- --- Hero Section: Green Theme --- -->
    <section class="relative overflow-hidden bg-[#3a5f56] pt-16 pb-12 md:pt-32 md:pb-24">
        <div class="absolute inset-0 bg-black/10 z-0"></div>
        <div class="absolute top-0 right-0 w-[300px] h-[300px] md:w-[600px] md:h-[600px] bg-white/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="container-custom relative z-10 text-center text-white px-4">
            <h1 class="text-3xl md:text-5xl font-bold font-heading mb-4 md:mb-6 tracking-wide">
                <span class="keep-phrase">採用情報</span>
            </h1>
            <p class="text-white/80 max-w-2xl mx-auto leading-relaxed font-light text-sm md:text-base px-2">
                <span class="keep-phrase">あなたのライフスタイルに</span><span class="keep-phrase">合わせた働き方を。</span><br class="hidden sm:block" />
                <span class="keep-phrase">未経験からでも安心の</span><span class="keep-phrase">サポート体制で、</span><br class="sm:hidden" /><span class="keep-phrase">一緒に成長しませんか？</span>
            </p>
        </div>
    </section>

    <!-- Content Sections -->
    <div id="application-content">
        <!-- --- 1. Merits: Tabbed UI --- -->
        <section class="py-20">
            <div class="container mx-auto px-4 max-w-5xl">
                <div class="text-center mb-12">
                    <h2 class="text-2xl text-botanical-primary font-bold font-heading mb-2">
                        私たちの働きやすさ
                    </h2>
                    <p class="text-gray-400 text-xs tracking-widest uppercase">Merits</p>
                </div>

                <!-- Tabs -->
                <div class="flex flex-wrap justify-center gap-3 md:gap-4 mb-10 md:mb-12">
                    <button class="job-tab-btn flex items-center gap-2 px-5 py-2.5 md:px-6 md:py-3 rounded-full font-bold transition-all shadow-sm border bg-salon-gold text-white border-salon-gold text-xs md:text-base scale-105" data-target="job-time">
                        <?php salon_icon('clock', 'w-4 h-4'); ?>
                        自分の時間
                    </button>
                    <button class="job-tab-btn flex items-center gap-2 px-5 py-2.5 md:px-6 md:py-3 rounded-full font-bold transition-all shadow-sm border bg-white text-gray-500 border-gray-200 hover:bg-gray-50 text-xs md:text-base" data-target="job-team">
                        <?php salon_icon('users', 'w-4 h-4'); ?>
                        支え合える
                    </button>
                    <button class="job-tab-btn flex items-center gap-2 px-5 py-2.5 md:px-6 md:py-3 rounded-full font-bold transition-all shadow-sm border bg-white text-gray-500 border-gray-200 hover:bg-gray-50 text-xs md:text-base" data-target="job-beginner">
                        <?php salon_icon('shield-check', 'w-4 h-4'); ?>
                        未経験歓迎
                    </button>
                </div>

                <!-- Tab Content Area -->
                <div class="bg-white rounded-[32px] p-6 md:p-12 shadow-sm border border-gray-100 min-h-[300px] md:min-h-[400px] flex items-center">
                    <!-- Time Tab -->
                    <div id="job-time" class="job-tab-content flex flex-col md:flex-row gap-8 items-center animate-fade-in">
                        <div class="md:w-1/2">
                            <img src="<?php echo salon_img('/images/1.png'); ?>" alt="Own Time" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                        </div>
                        <div class="md:w-1/2 space-y-4">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                                <span class="keep-phrase">自分の時間を</span><span class="keep-phrase">大切にできる</span><br class="hidden sm:block" /><span class="text-salon-gold keep-phrase">なので安心</span>
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-sm">
                                お仕事は在宅勤務のオペレーターとなり、アルバイト・業務委託は週3日から、正社員・契約社員は週休2日制で、自分に合う勤務シフトから選ぶことが可能です。メンズエステサロン専門の電話受付や事務作業が主な仕事になり、体力的にも長く続けられます。言葉遣いや接し方などの電話応対スキルやマナーに加え、事務作業やパソコンスキルなど総合的なスキルを身につけることができます。
                            </p>
                        </div>
                    </div>

                    <!-- Team Tab -->
                    <div id="job-team" class="job-tab-content hidden flex flex-col md:flex-row gap-8 items-center animate-fade-in">
                        <div class="md:w-1/2">
                            <img src="<?php echo salon_img('/images/2.png'); ?>" alt="Team Support" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                        </div>
                        <div class="md:w-1/2 space-y-4">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                                スタッフ同士フォローし合える<br /><span class="text-botanical-primary">職場環境なので安心</span>
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-sm">
                                未経験の方でも業務を確実に覚えてスキルアップしていけるように、マンツーマンでメンズエステサロンの基礎知識から電話受付、事務作業の研修を行っています。また、個人を全員でサポート・フォローする体制があります。電話代行業務にあたっては、やる気と要領の良い作業が求められますが、継続することで達成感や、やりがいを感じられると思います。
                            </p>
                        </div>
                    </div>

                    <!-- Beginner Tab -->
                    <div id="job-beginner" class="job-tab-content hidden flex flex-col md:flex-row gap-8 items-center animate-fade-in">
                        <div class="md:w-1/2">
                            <img src="<?php echo salon_img('/images/3.png'); ?>" alt="No Experience" class="rounded-2xl shadow-lg w-full h-64 object-cover">
                        </div>
                        <div class="md:w-1/2 space-y-4">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                                スキルや経験がなくても<br /><span class="text-gray-400">大丈夫</span>
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-sm">
                                事務処理スキルや電話受付業務の経験はあった方が良いですがそれよりも人柄を重視して採用しています。今のスタッフも未経験から始めたスタッフも少なくありません。私たちと一緒にコールセンターの一員になってみませんか。私にも出来るかな？と少しご不安に思われる方でも、安心してお問い合わせください。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- --- 2. Job Requirements: List Style --- -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 max-w-4xl">
                <div class="text-center mb-16">
                    <h2 class="text-2xl text-[#3a5f56] font-bold font-heading mb-2">募集要項</h2>
                    <p class="text-gray-400 text-xs tracking-widest uppercase">Requirements</p>
                </div>

                <div class="space-y-16">
                    <!-- Category 01 -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 border-l-[6px] border-[#3a5f56] pl-6 mb-8 flex items-center gap-4 bg-gray-50 py-4 rounded-r-2xl shadow-sm">
                            <span class="text-[#c5a085] font-heading text-3xl">01</span>
                            <span class="tracking-wider">募集要項</span>
                        </h3>
                        <div class="divide-y divide-gray-100 bg-white rounded-3xl overflow-hidden">
                            <?php 
                            $reqs1 = [
                                ['label' => '業種・内容', 'content' => "【在宅勤務オペレーター】\n・電話での予約受付業務\n・データ処理\n・WEBサイトの更新作業\n\n【サロン運営スタッフ】\n別途募集中です。お問合せください。"],
                                ['label' => '雇用形態', 'content' => "・正社員\n・契約社員\n・アルバイト\n・業務委託"],
                                ['label' => '給与', 'content' => "【正社員・契約社員】\n月給：日勤23.4万円～ 中勤22.5万円～\n夜勤①25万円～ 夜勤②31.5万円～\n【アルバイト】\n時給：日勤1200円～ 夜勤22時以降1500円～\n【業務委託】\nアルバイトと同等の報酬\n※上記全てに歩合給有"],
                                ['label' => '勤務時間', 'content' => "【正社員・契約社員】\n日勤／9：30～19：00\n中勤／14：00～23：00\n夜勤①／19：00～4：00\n夜勤②／19：00～6：00\n・日勤、中勤、夜勤①、夜勤②から選択\n・勤務時間中に休憩1時間\n・週5日勤務 (週休2日)\n・基本的に残業なし\n\n【アルバイト・業務委託】\n日勤／9：30～19：00\n中勤／14：00～23：00\n夜勤①／19：00～4：00\n夜勤②／19：00～6：00\n夜勤③／19：00～2：00\n・日勤、中勤、夜勤①、夜勤②、夜勤③から選択\n・勤務時間中に休憩1時間 (夜勤③は休憩45分)\n・週3日以上勤務\n・基本的に残業なし"],
                                ['label' => '休日休暇', 'content' => "【正社員・契約社員】週休2日制\n【アルバイト・業務委託】週3日以上勤務\n※1週間ごとの社内シフトに準ずる"],
                                ['label' => '勤務期間', 'content' => "最低勤務期間：半年以上"]
                            ];
                            foreach($reqs1 as $req): ?>
                                <div class="flex flex-col md:flex-row py-8 group hover:bg-gray-50/50 transition-colors px-6">
                                    <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                        <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">
                                            <?php echo esc_html($req['label']); ?>
                                        </span>
                                    </div>
                                    <div class="grow text-[15px] text-gray-600 leading-relaxed whitespace-pre-line">
                                        <?php echo esc_html($req['content']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Category 02 -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 border-l-[6px] border-[#3a5f56] pl-6 mb-8 flex items-center gap-4 bg-gray-50 py-4 rounded-r-2xl shadow-sm">
                            <span class="text-[#c5a085] font-heading text-3xl">02</span>
                            <span class="tracking-wider">応募資格</span>
                        </h3>
                        <div class="divide-y divide-gray-100 bg-white rounded-3xl overflow-hidden">
                            <?php 
                            $reqs2 = [
                                ['label' => '応募資格', 'content' => "・ご自宅に光固定ネット回線必須\n・研修のために7日間程度来社できる方\n・基本的なPC操作ができる方\n・社会人としての常識がある方\n・18歳～50歳程度まで\n・未経験者歓迎・経験者優優"],
                                ['label' => '求める人材', 'content' => "・資格・経験を活かしたい方\n・自己管理のできる方\n・意欲的にお仕事ができる方\n・一生懸命に業務に向き合ってくださる方"]
                            ];
                            foreach($reqs2 as $req): ?>
                                <div class="flex flex-col md:flex-row py-8 group hover:bg-gray-50/50 transition-colors px-6">
                                    <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                        <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">
                                            <?php echo esc_html($req['label']); ?>
                                        </span>
                                    </div>
                                    <div class="grow text-[15px] text-gray-600 leading-relaxed whitespace-pre-line">
                                        <?php echo esc_html($req['content']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Category 03 -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 border-l-[6px] border-[#3a5f56] pl-6 mb-8 flex items-center gap-4 bg-gray-50 py-4 rounded-r-2xl shadow-sm">
                            <span class="text-[#c5a085] font-heading text-3xl">03</span>
                            <span class="tracking-wider">待遇・福利厚生</span>
                        </h3>
                        <div class="divide-y divide-gray-100 bg-white rounded-3xl overflow-hidden">
                            <div class="flex flex-col md:flex-row py-8 group hover:bg-gray-50/50 transition-colors px-6">
                                <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                    <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">待遇・福利厚生</span>
                                </div>
                                <div class="grow text-[15px] text-gray-600 leading-relaxed whitespace-pre-line">
                                    ・完全在宅勤務可
                                    ・社会保険完備
                                    ・服装・髪型・ネイル自由
                                    ・交通費規定支給
                                    ・歩合給有
                                    ・賞与有
                                    ・昇給有(10月に評価制度あり)
                                    ・長期休暇出勤手当
                                    ・機材貸与
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category 04 -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 border-l-[6px] border-[#3a5f56] pl-6 mb-8 flex items-center gap-4 bg-gray-50 py-4 rounded-r-2xl shadow-sm">
                            <span class="text-[#c5a085] font-heading text-3xl">04</span>
                            <span class="tracking-wider">会社情報</span>
                        </h3>
                        <div class="divide-y divide-gray-100 bg-white rounded-3xl overflow-hidden">
                            <div class="flex flex-col md:flex-row py-8 hover:bg-gray-50/50 transition-colors px-6">
                                <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                    <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">会社名</span>
                                </div>
                                <div class="grow text-[15px] text-gray-600">合同会社オスカン</div>
                            </div>
                            <div class="flex flex-col md:flex-row py-8 hover:bg-gray-50/50 transition-colors px-6">
                                <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                    <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">所在地</span>
                                </div>
                                <div class="grow text-[15px] text-gray-600">東京都港区浜松町2-2-15 ダイヤビル2F</div>
                            </div>
                            <div class="flex flex-col md:flex-row py-8 hover:bg-gray-50/50 transition-colors px-6">
                                <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                    <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">アクセス</span>
                                </div>
                                <div class="grow text-[15px] text-gray-600">JR山手線・京浜東北線「浜松町駅」より徒歩3分<br />都営大江戸線・浅草線「大門駅」より徒歩3分</div>
                            </div>
                            <div class="flex flex-col md:flex-row py-8 hover:bg-gray-50/50 transition-colors px-6">
                                <div class="md:w-56 shrink-0 mb-3 md:mb-0">
                                    <span class="font-bold text-gray-800 text-base block relative pl-4 before:absolute before:left-0 before:top-1.5 before:w-1.5 before:h-4 before:bg-[#c5a085] before:rounded-full">連絡先</span>
                                </div>
                                <div class="grow text-[15px] text-gray-600">080-1017-5318<br />※お問い合わせの際には「採用ページを見て」とお伝えいただくとスムーズです</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- --- 3. Flow: Steps --- -->
        <section class="py-20 bg-gray-50/50">
            <div class="container mx-auto px-4 max-w-5xl">
                <div class="text-center mb-16">
                    <h2 class="text-2xl text-botanical-primary font-bold font-heading mb-2">選考フロー</h2>
                    <p class="text-gray-400 text-xs tracking-widest uppercase">Flow</p>
                </div>

                <div class="flex flex-col md:flex-row justify-between relative gap-8 md:gap-4">
                    <!-- Connecting Line (Desktop) -->
                    <div class="hidden md:block absolute top-[24px] left-0 w-full h-[0.5px] bg-gray-300 -z-0"></div>

                    <?php 
                    $steps = [
                        ['num' => '01', 'title' => '応募', 'desc' => 'フォームよりエントリー'],
                        ['num' => '02', 'title' => '書類選考', 'desc' => '担当者よりご連絡'],
                        ['num' => '03', 'title' => '面接', 'desc' => 'オンライン面談実施'],
                        ['num' => '04', 'title' => '採用', 'desc' => '研修開始・スタート'],
                    ];
                    foreach($steps as $step): ?>
                        <div class="flex-1 relative z-10 flex flex-col items-center text-center">
                            <div class="w-12 h-12 bg-white text-salon-gold border border-salon-gold rounded-full flex items-center justify-center font-bold text-xl mb-4 shadow-sm">
                                <?php echo $step['num']; ?>
                            </div>
                            <h4 class="font-bold text-gray-800 mb-2"><?php echo $step['title']; ?></h4>
                            <p class="text-xs text-gray-500"><?php echo $step['desc']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- --- 4. Application Form --- -->
        <section class="py-20 bg-white" id="form">
            <div class="container mx-auto px-4 max-w-3xl">
                <div class="text-center mb-12">
                    <h2 class="text-2xl text-botanical-primary font-bold font-heading mb-2">応募フォーム</h2>
                    <p class="text-gray-400 text-xs tracking-widest uppercase">Entry</p>
                </div>

                <?php if ($form_success): ?>
                    <div class="bg-[#3a5f56] text-white p-12 rounded-[32px] text-center shadow-xl animate-fade-in">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <?php salon_icon('check', 'w-8 h-8 text-white'); ?>
                        </div>
                        <h2 class="text-2xl font-bold mb-4">エントリーありがとうございます</h2>
                        <p class="text-white/80 leading-relaxed">
                            弊社求人へのご応募を受け付けいたしました。<br />
                            追って担当者より、面接日程等のご連絡をさせていただきます。
                        </p>
                        <div class="mt-8">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block border border-white/30 text-white px-8 py-3 rounded-full hover:bg-white/10 transition-all font-bold">トップページに戻る</a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if (!empty($form_errors)): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-r-xl mb-10">
                            <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                                <?php foreach ($form_errors as $err) echo "<li>$err</li>"; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="bg-white rounded-[32px] p-8 md:p-12 shadow-lg border border-gray-100">
                        <form action="<?php echo esc_url(get_permalink()); ?>#form" method="POST" class="space-y-8">
                            <?php wp_nonce_field('recruit_form_submit', 'recruit_nonce'); ?>
                            <input type="text" name="website_hp" style="display:none !important" tabindex="-1" autocomplete="off">
                            
                            <!-- お名前 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">お名前</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <input type="text" name="recruit_name" required value="<?php echo isset($_POST['recruit_name']) ? esc_attr($_POST['recruit_name']) : ''; ?>" placeholder="山田 太郎" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all placeholder:text-gray-300">
                            </div>

                            <!-- 年齢 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">年齢</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <input type="text" name="recruit_age" required value="<?php echo isset($_POST['recruit_age']) ? esc_attr($_POST['recruit_age']) : ''; ?>" placeholder="25" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all placeholder:text-gray-300">
                            </div>

                            <!-- メールアドレス -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">メールアドレス</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <input type="email" name="recruit_email" required value="<?php echo isset($_POST['recruit_email']) ? esc_attr($_POST['recruit_email']) : ''; ?>" placeholder="example@email.com" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all placeholder:text-gray-300">
                            </div>

                            <!-- 電話番号 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">電話番号</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <input type="tel" name="recruit_phone" required value="<?php echo isset($_POST['recruit_phone']) ? esc_attr($_POST['recruit_phone']) : ''; ?>" placeholder="090-0000-0000" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all placeholder:text-gray-300">
                            </div>

                            <!-- 希望勤務時間 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">希望勤務時間</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pt-2">
                                    <?php foreach(["9：30～19：00", "14：00～23：00", "19：00～2：00", "19：00～4：00", "19：00～6：00"] as $time): ?>
                                        <label class="flex items-center gap-3 cursor-pointer p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors border border-gray-100 group">
                                            <input type="radio" name="recruit_desired_hours" value="<?php echo $time; ?>" <?php checked(isset($_POST['recruit_desired_hours']) ? $_POST['recruit_desired_hours'] : '', $time); ?> class="w-4 h-4 accent-[#3a5f56]">
                                            <span class="text-sm text-gray-600 font-mono group-hover:text-gray-900"><?php echo $time; ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- お住まいの都道府県 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">お住まいの都道府県</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <select name="recruit_prefecture" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all">
                                    <option value="">選択してください</option>
                                    <?php foreach(["北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県", "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県", "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県", "鳥取県", "島根県", "岡山県", "広島県", "山口県", "徳島県", "香川県", "愛媛県", "高知県", "福岡県", "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県"] as $pref): ?>
                                        <option <?php selected(isset($_POST['recruit_prefecture']) ? $_POST['recruit_prefecture'] : '', $pref); ?>><?php echo $pref; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- 性別 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">性別</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <div class="flex gap-8 pt-2">
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="recruit_gender" value="male" <?php checked(isset($_POST['recruit_gender']) ? $_POST['recruit_gender'] : '', 'male'); ?> class="w-5 h-5 accent-[#3a5f56]">
                                        <span class="text-sm text-gray-600">男性</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="recruit_gender" value="female" <?php checked(isset($_POST['recruit_gender']) ? $_POST['recruit_gender'] : 'female', 'female'); ?> class="w-5 h-5 accent-[#3a5f56]">
                                        <span class="text-sm text-gray-600">女性</span>
                                    </label>
                                </div>
                            </div>

                            <!-- 雇用形態 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">雇用形態</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 pt-2">
                                    <?php foreach(["正社員", "契約社員", "アルバイト", "業務委託"] as $type): ?>
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="recruit_employment_type" value="<?php echo $type; ?>" <?php checked(isset($_POST['recruit_employment_type']) ? $_POST['recruit_employment_type'] : '正社員', $type); ?> class="w-4 h-4 accent-[#3a5f56]">
                                            <span class="text-sm text-gray-600"><?php echo $type; ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- 希望勤務日数 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">希望勤務日数</label>
                                    <span class="bg-[#d4a373] text-white text-[10px] px-2 py-0.5 rounded shadow-sm">必須</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-sm text-gray-600">週</span>
                                    <select name="recruit_desired_days" class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg outline-none w-24">
                                        <?php for($i=1; $i<=7; $i++): ?>
                                            <option value="<?php echo $i; ?>" <?php selected(isset($_POST['recruit_desired_days']) ? $_POST['recruit_desired_days'] : 5, $i); ?>><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="text-sm text-gray-600">日</span>
                                </div>
                            </div>

                            <!-- コメント欄 -->
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <label class="text-sm font-bold text-gray-700">コメント欄</label>
                                    <span class="bg-gray-100 text-gray-500 text-[10px] px-2 py-0.5 rounded border border-gray-200">任意</span>
                                </div>
                                <textarea name="recruit_comment" rows="5" placeholder="ご質問やご要望があればご記入ください" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-botanical-primary/20 transition-all placeholder:text-gray-300"><?php echo isset($_POST['recruit_comment']) ? esc_textarea($_POST['recruit_comment']) : ''; ?></textarea>
                            </div>

                            <!-- プライバシーポリシー -->
                            <div class="pt-4 text-center text-[10px] text-gray-400 leading-relaxed">
                                <p class="font-bold text-gray-500 mb-1 leading-none uppercase tracking-tighter">Privacy Policy</p>
                                <p>ご入力いただいた個人情報は、採用選考およびお問合せへの回答の目的のみに利用いたします。<br />内容に同意の上、送信ボタンを押してください。</p>
                            </div>

                            <div class="pt-6 text-center">
                                <button type="submit" class="bg-[#3a5f56] text-white py-4 px-16 rounded-full font-bold shadow-xl hover:bg-opacity-90 transition-all transform hover:-translate-y-1">
                                    上記の内容で応募する
                                </button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<script>
document.querySelectorAll('.job-tab-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Reset buttons
        document.querySelectorAll('.job-tab-btn').forEach(b => {
            b.classList.remove('bg-salon-gold', 'text-white', 'border-salon-gold', 'scale-105');
            b.classList.add('bg-white', 'text-gray-500', 'border-gray-200');
        });
        // Select button
        this.classList.add('bg-salon-gold', 'text-white', 'border-salon-gold', 'scale-105');
        this.classList.remove('bg-white', 'text-gray-500', 'border-gray-200');

        // Reset content
        document.querySelectorAll('.job-tab-content').forEach(c => c.classList.add('hidden'));
        // Show target
        document.getElementById(this.dataset.target).classList.remove('hidden');
    });
});
</script>

<?php get_footer(); ?>
