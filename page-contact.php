<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<div class="bg-gray-50 min-h-screen selection:bg-salon-gold selection:text-white pb-32">
    <!-- Title Section -->
    <section class="bg-[#3e594b] text-white py-12 md:py-16 text-center">
        <div class="container-custom">
            <h1 class="text-3xl md:text-5xl font-bold font-heading tracking-tight">お問い合わせ・無料お見積り</h1>
        </div>
    </section>

    <!-- Lead Text Section -->
    <div class="container-custom py-12 text-center">
        <div class="max-w-3xl mx-auto">
            <p class="text-gray-500 text-[12px] md:text-[14px] leading-[2] tracking-wide">
                当日中か翌営業日にはご返答させて頂いております。<br />
                また、3日以上経過しても返答が無い場合は、メールが正しく送信されていない場合がございます。<br />
                お手数ですが再度メールを頂くか、080-1017-5318 までお問い合わせ下さい。
            </p>
        </div>
    </div>

    <div class="container-custom relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-[32px] shadow-xl shadow-gray-200/50 p-6 md:p-16 border border-gray-100">
                <form action="#" method="POST" class="space-y-10">
                    
                    <!-- Form Group: Salon Name -->
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                        <label class="md:w-1/3 flex items-center gap-2">
                            <span class="text-gray-700 font-bold tracking-tight text-sm">サロン名または会社名</span>
                            <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                        </label>
                        <div class="md:w-2/3">
                            <input type="text" name="salon_name" required class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                        </div>
                    </div>

                    <!-- Form Group: Name -->
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                        <label class="md:w-1/3 flex items-center gap-2">
                            <span class="text-gray-700 font-bold tracking-tight text-sm">ご担当者様名</span>
                            <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                        </label>
                        <div class="md:w-2/3">
                            <input type="text" name="name" required class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                        </div>
                    </div>

                    <!-- Form Group: Email -->
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                        <label class="md:w-1/3 flex items-center gap-2">
                            <span class="text-gray-700 font-bold tracking-tight text-sm">メールアドレス</span>
                            <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                        </label>
                        <div class="md:w-2/3">
                            <input type="email" name="email" required class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
                        </div>
                    </div>

                    <!-- Form Group: Phone -->
                    <div class="flex flex-col md:flex-row md:items-center gap-4 md:gap-8">
                        <label class="md:w-1/3 flex items-center gap-2">
                            <span class="text-gray-700 font-bold tracking-tight text-sm">お電話番号</span>
                            <span class="bg-[#d4a373] text-white text-[9px] px-2 py-0.5 rounded-sm font-bold">必須</span>
                        </label>
                        <div class="md:w-2/3">
                            <input type="tel" name="phone" required class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
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
                                <option value="" disabled selected>選択してください</option>
                                <?php
                                $prefs = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');
                                foreach($prefs as $pref) echo "<option value=\"$pref\">$pref</option>";
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
                                <input type="radio" name="reply_method" value="phone" required class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
                                <span class="text-gray-500 text-sm font-medium group-hover:text-[#9e8263]">お電話での連絡を希望</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="radio" name="reply_method" value="email" required class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
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
                                    <input type="checkbox" name="inquiry_items[]" value="<?php echo $item; ?>" class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] rounded border-gray-300 transition-all cursor-pointer">
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
                            <textarea name="message" rows="6" class="w-full px-5 py-4 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all"></textarea>
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
                                    <input type="radio" name="source" value="<?php echo $src; ?>" class="w-5 h-5 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] border-gray-300 transition-all cursor-pointer">
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
                            <input type="text" name="factor" class="w-full px-5 py-3.5 bg-white border border-gray-200 rounded-lg focus:ring-4 focus:ring-botanical-primary/5 focus:border-botanical-primary outline-none transition-all">
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
                                <input type="checkbox" required class="w-6 h-6 text-[#9e8263] focus:ring-[#9e8263] accent-[#9e8263] rounded border-gray-300 transition-all cursor-pointer">
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
