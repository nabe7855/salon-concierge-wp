<?php
/**
 * Template Name: Contact Page
 */

// Form Submission Handling
$form_success = false;
$form_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_nonce'])) {
    // Nonce verification
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_submit')) {
        $form_errors[] = '不正な送信です。もう一度お試しください。';
    }

    // Honeypot check
    if (!empty($_POST['website_hp'])) {
        exit; // Spam bot
    }

    if (empty($form_errors)) {
        // Collect and sanitize data
        $salon_name    = sanitize_text_field($_POST['salon_name']);
        $name          = sanitize_text_field($_POST['name']);
        $email         = sanitize_email($_POST['email']);
        $phone         = sanitize_text_field($_POST['phone']);
        $prefecture    = sanitize_text_field($_POST['prefecture']);
        $reply_method  = sanitize_text_field($_POST['reply_method']);
        $inquiry_items = isset($_POST['inquiry_items']) ? (array) $_POST['inquiry_items'] : array();
        $message       = sanitize_textarea_field($_POST['message']);
        $source        = sanitize_text_field($_POST['source']);
        $factor        = sanitize_text_field($_POST['factor']);

        // Validation
        if (empty($salon_name)) $form_errors[] = 'サロン名または会社名を入力してください。';
        if (empty($name))       $form_errors[] = 'ご担当者様名を入力してください。';
        if (!is_email($email))  $form_errors[] = '有効なメールアドレスを入力してください。';
        if (empty($phone))      $form_errors[] = 'お電話番号を入力してください。';
        if (empty($prefecture)) $form_errors[] = '都道府県を選択してください。';
        if (empty($reply_method)) $form_errors[] = '返信方法を選択してください。';
        if (empty($inquiry_items)) $form_errors[] = 'お問い合わせ項目を1つ以上選択してください。';

        if (empty($form_errors)) {
            // Save to Database
            $post_id = wp_insert_post(array(
                'post_title'   => $salon_name . ' (' . $name . ')',
                'post_type'    => 'inquiry',
                'post_status'  => 'publish',
            ));

            if ($post_id) {
                update_post_meta($post_id, 'salon_name', $salon_name);
                update_post_meta($post_id, 'name', $name);
                update_post_meta($post_id, 'email', $email);
                update_post_meta($post_id, 'phone', $phone);
                update_post_meta($post_id, 'prefecture', $prefecture);
                update_post_meta($post_id, 'reply_method', $reply_method);
                update_post_meta($post_id, 'inquiry_items', $inquiry_items);
                update_post_meta($post_id, 'message', $message);
                update_post_meta($post_id, 'source', $source);
                update_post_meta($post_id, 'factor', $factor);
            }

            // Prepare Email to Admin
            $admin_email = get_option('admin_email');
            $subject = '【お問い合わせ】' . $salon_name . '様より';
            
            $body = "お問い合わせフォームよりメッセージが届きました。\n\n";
            $body .= "--------------------------------------------------\n";
            $body .= "【サロン名/会社名】: {$salon_name}\n";
            $body .= "【ご担当者様名】: {$name}\n";
            $body .= "【メールアドレス】: {$email}\n";
            $body .= "【お電話番号】: {$phone}\n";
            $body .= "【都道府県】: {$prefecture}\n";
            $body .= "【希望返信方法】: " . ($reply_method === 'phone' ? 'お電話' : 'メール') . "\n";
            $body .= "【お問い合わせ項目】: " . implode(', ', $inquiry_items) . "\n\n";
            $body .= "【お問い合わせ内容】:\n{$message}\n\n";
            $body .= "【当社を知ったきっかけ】: {$source}\n";
            $body .= "【お問い合わせの決め手】: {$factor}\n";
            $body .= "--------------------------------------------------\n";

            $headers = array('Content-Type: text/plain; charset=UTF-8');
            $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $admin_email . '>';
            $headers[] = 'Reply-To: ' . $email;

            // Send to Admin
            $mail_sent = wp_mail($admin_email, $subject, $body, $headers);

            if ($mail_sent) {
                // Auto-reply to User
                $reply_subject = '【サロンコンシェルジュ】お問い合わせを受け付けました';
                $reply_body = "{$name} 様\n\n";
                $reply_body .= "この度はお問い合わせいただき、誠にありがとうございます。\n";
                $reply_body .= "以下の内容で受け付けいたしました。\n\n";
                $reply_body .= "当日中か翌営業日には担当者より改めてご連絡させていただきます。\n\n";
                $reply_body .= $body;

                wp_mail($email, $reply_subject, $reply_body, $headers);
                $form_success = true;
            } else {
                $form_errors[] = 'メール送信に失敗しました。お手数ですが、お電話にてお問い合わせください。';
            }
        }
    }
}

get_header(); ?>

<div class="bg-gray-50 min-h-screen selection:bg-salon-gold selection:text-white pb-32">
    <!-- Title Section -->
    <section class="bg-[#3e594b] text-white py-12 md:py-20 text-center">
        <div class="container-custom">
            <h1 class="text-fluid-h2 font-bold font-heading tracking-tight">
                <span class="keep-phrase">お問い合わせ・</span><span class="keep-phrase">無料お見積り</span>
            </h1>
        </div>
    </section>

    <!-- Lead Text Section -->
    <div class="container-custom py-12 text-center">
        <div class="max-w-3xl mx-auto px-4">
            <p class="text-gray-500 text-sm md:text-base leading-loose tracking-wide">
                <span class="keep-phrase">当日中か翌営業日には</span><span class="keep-phrase">ご返答させて頂いております。</span><br class="hidden sm:block" />
                <span class="keep-phrase">また、3日以上経過しても返答が無い場合は、</span><span class="keep-phrase">メールが正しく送信されていない</span><span class="keep-phrase">場合がございます。</span><br class="hidden sm:block" />
                <span class="keep-phrase">お手数ですが再度メールを頂くか、</span><span class="keep-phrase">080-1017-5318 までお問い合わせ下さい。</span>
            </p>
        </div>
    </div>

    <div class="container-custom relative z-10">
        <div class="max-w-4xl mx-auto">
            <?php if ($form_success): ?>
                <div class="bg-[#3e594b] text-white p-12 rounded-[32px] text-center mb-12 shadow-xl animate-fade-in">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <?php salon_icon('check', 'w-8 h-8 text-white'); ?>
                    </div>
                    <h2 class="text-2xl font-bold mb-4">お問い合わせありがとうございます</h2>
                    <p class="text-white/80 leading-relaxed">
                        メッセージは正常に送信されました。<br />
                        担当者にて内容を確認し、近日中に折り返しご連絡させていただきます。
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

                <div class="bg-white rounded-[24px] md:rounded-[32px] shadow-xl shadow-gray-200/50 p-6 sm:p-10 md:p-16 border border-gray-100">
                    <form action="<?php echo esc_url(get_permalink()); ?>#form" method="POST" class="space-y-10" id="form">
                        <?php wp_nonce_field('contact_form_submit', 'contact_nonce'); ?>
                        <input type="text" name="website_hp" style="display:none !important" tabindex="-1" autocomplete="off">
                        
                        <!-- Form Group: Salon Name -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">サロン名または会社名</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <input type="text" name="salon_name" required value="<?php echo isset($_POST['salon_name']) ? esc_attr($_POST['salon_name']) : ''; ?>" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Form Group: Name -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">ご担当者様名</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <input type="text" name="name" required value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Form Group: Email -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">メールアドレス</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <input type="email" name="email" required value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Form Group: Phone -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">お電話番号</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <input type="tel" name="phone" required value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Form Group: Prefecture -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">サロンの都道府県</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <select name="prefecture" required class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all appearance-none cursor-pointer text-gray-600">
                                    <option value="" disabled <?php echo !isset($_POST['prefecture']) ? 'selected' : ''; ?>>選択してください</option>
                                    <?php
                                    $prefs = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
                                    foreach($prefs as $pref) {
                                        $selected = (isset($_POST['prefecture']) && $_POST['prefecture'] === $pref) ? 'selected' : '';
                                        echo "<option value=\"$pref\" $selected>$pref</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Form Group: Reply Method -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">返信方法のご希望</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3 flex flex-wrap gap-8 py-2">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="reply_method" value="phone" required <?php checked(isset($_POST['reply_method']) ? $_POST['reply_method'] : '', 'phone'); ?> class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
                                    <span class="text-gray-500 text-sm font-medium group-hover:text-[#9e8263]">お電話での連絡を希望</span>
                                </label>
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="reply_method" value="email" required <?php checked(isset($_POST['reply_method']) ? $_POST['reply_method'] : '', 'email'); ?> class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
                                    <span class="text-gray-500 text-sm font-medium group-hover:text-[#9e8263]">メールでの連絡を希望</span>
                                </label>
                            </div>
                        </div>

                        <!-- Form Group: Inquiry Items -->
                        <div class="flex flex-col md:flex-row md:items-start gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2 pt-2 text-sm">
                                <span class="text-gray-700 font-bold tracking-tight">お問い合わせ項目</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3 grid grid-cols-2 gap-y-4 gap-x-2 py-2">
                                <?php
                                $items = array('電話代行', '資料請求', 'CTIシステム', 'CRMシステム', 'オーダーメイドプラン', 'WEB予約システム', 'WEB制作', 'お見積り');
                                foreach($items as $item): ?>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" name="inquiry_items[]" value="<?php echo $item; ?>" <?php echo (isset($_POST['inquiry_items']) && in_array($item, $_POST['inquiry_items'])) ? 'checked' : ''; ?> class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] rounded border-gray-300 transition-all cursor-pointer">
                                        <span class="text-gray-500 text-sm font-medium group-hover:text-[#9e8263]"><?php echo $item; ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Form Group: Details -->
                        <div class="flex flex-col md:flex-row md:items-start gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2 pt-2 text-sm">
                                <span class="text-gray-700 font-bold tracking-tight">お問い合わせ内容</span>
                                <span class="bg-gray-200 text-gray-500 text-[9px] px-2 py-0.5 rounded-sm font-bold">任意</span>
                            </label>
                            <div class="md:w-2/3">
                                <textarea name="message" rows="6" class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all"><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                            </div>
                        </div>

                        <!-- Form Group: Source -->
                        <div class="flex flex-col md:flex-row md:items-start gap-4 md:gap-8 border-t border-gray-50 pt-10">
                            <label class="md:w-1/3 flex items-center gap-2 pt-2 text-sm">
                                <span class="text-gray-700 font-bold tracking-tight">当社を何でお知りになりましたか？</span>
                                <span class="bg-gray-200 text-gray-500 text-[9px] px-2 py-0.5 rounded-sm font-bold">任意</span>
                            </label>
                            <div class="md:w-2/3 flex flex-wrap gap-x-8 gap-y-4 py-2">
                                <?php
                                $sources = array('Yahoo! 検索', 'google 検索', '公式 Twitter', 'ご紹介', 'その他');
                                foreach($sources as $src): ?>
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="radio" name="source" value="<?php echo $src; ?>" <?php checked(isset($_POST['source']) ? $_POST['source'] : '', $src); ?> class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
                                        <span class="text-gray-500 text-xs font-medium group-hover:text-[#9e8263]"><?php echo $src; ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Form Group: Decision Factor -->
                        <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                            <label class="md:w-1/3 flex items-center gap-2">
                                <span class="text-gray-700 font-bold tracking-tight text-sm">お問い合わせの決め手</span>
                                <span class="bg-gray-200 text-gray-500 text-[9px] px-2 py-0.5 rounded-sm font-bold">任意</span>
                            </label>
                            <div class="md:w-2/3">
                                <input type="text" name="factor" value="<?php echo isset($_POST['factor']) ? esc_attr($_POST['factor']) : ''; ?>" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Privacy Policy -->
                        <div class="flex flex-col md:flex-row md:items-start gap-4 md:gap-8 border-t border-gray-50 pt-10">
                            <label class="md:w-1/3 flex items-center gap-2 pt-2 text-sm">
                                <span class="text-gray-700 font-bold tracking-tight">個人情報の取り扱いについて</span>
                                <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                            </label>
                            <div class="md:w-2/3">
                                <div class="w-full h-40 overflow-y-scroll bg-gray-50 border border-gray-100 rounded-xl p-6 text-[11px] text-gray-500 leading-[2] mb-6 scrollbar-thin scrollbar-thumb-gray-200">
                                    <h4 class="font-bold mb-4 text-gray-700">【個人情報の収集・利用目的】</h4>
                                    <p class="mb-4">1. お預かりした入力情報は、お問い合わせに対するご回答や、サービス紹介のために、適切に管理・使用させていただきます。</p>
                                    <p class="mb-4">2. 本人の同意なく個人情報を第三者に提供致しません。ただし法令による開示を求められた場合はこの限りではありません。</p>
                                    <p class="mb-4">3. 収集した個人情報について、開示・訂正・削除をご希望の場合は速やかに対応をいたします。</p>
                                    <p>4. その他、当社規定のプライバシーポリシーに基づき、厳重に管理・保護に努めます。</p>
                                </div>
                                <label class="flex items-center gap-4 cursor-pointer group mb-8">
                                    <input type="checkbox" required name="agree" class="w-6 h-6 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] rounded border-gray-300 transition-all cursor-pointer">
                                    <span class="text-gray-700 font-bold">同意する</span>
                                </label>

                                <!-- Contact Window Box -->
                                <div class="bg-gray-100/60 rounded-xl p-8 text-center">
                                    <p class="text-[11px] text-gray-600 font-bold mb-4">【個人情報の取り扱いに関する相談窓口】</p>
                                    <div class="space-y-1 text-sm text-gray-700 font-medium">
                                        <p>合同会社オスカン</p>
                                        <p>担当：一条 蓮</p>
                                        <p>TEL：080-1017-5318</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center pt-10">
                            <button type="submit" class="inline-flex items-center justify-center gap-3 bg-[#e5d1b8] text-white px-20 py-4.5 rounded-full font-black text-xl shadow-xl shadow-[#e5d1b8]/30 hover:shadow-2xl hover:opacity-90 transition-all transform hover:-translate-y-0.5">
                                上記内容で送信する >>
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>

            <!-- Breadcrumbs -->
            <div class="mt-8 flex items-center gap-2 text-[10px] text-gray-400">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-salon-pink transition-colors">トップ</a>
                <span>&gt;</span>
                <span class="text-gray-500">お問い合わせフォーム</span>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
