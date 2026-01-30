<?php
/**
 * Template Name: FAQ Page
 */
get_header(); ?>

<div class="bg-gray-50 min-h-screen selection:bg-salon-gold selection:text-white pb-32">
    <!-- Title Section -->
    <section class="bg-[#3e594b] text-white py-16 md:py-24 text-center">
        <div class="container-custom">
            <h1 class="text-3xl md:text-5xl font-bold font-heading mb-4 tracking-tight">よくあるご質問</h1>
            <p class="text-white/70 text-base md:text-lg">サービスに関する疑問点にお答えします。</p>
        </div>
    </section>

    <div class="container-custom mt-12 md:mt-20">
        <div class="max-w-4xl mx-auto">
            <?php
            $faqs = array(
                array(
                    'q' => 'どのような仕組みで電話が転送されますか。',
                    'a' => 'お持ちの回線に転送機能をお付けいただき、当社の用意する貴店専用番号へ転送していただきます。転送設定は簡単に行えますが、導入時にスタッフがサポートいたします。<br><a href="#" class="inline-flex items-center gap-1.5 mt-4 text-xs font-bold text-gray-400 border border-gray-300 px-4 py-2 rounded hover:bg-gray-100 transition-all uppercase tracking-wider">詳しくはお問い合わせください <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg></a>'
                ),
                array(
                    'q' => '電話番号1つに対して複数名同時に対応することは可能でしょうか。',
                    'a' => '可能です。弊社の受付回線を数回線用意させていただき、同時に複数のお客様から着信があった場合も、お待たせすることなく別のオペレーターが対応いたします。'
                ),
                array(
                    'q' => 'オペレーターの方は経験はありますか。応対は丁寧でしょうか。',
                    'a' => 'メンズエステ運営経験者、または長期間の厳しい研修をパスした正規オペレーターのみが担当いたします。単なる取次ではなく、店舗スタッフとしてのホスピタリティを持った丁寧な応対をお約束します。'
                ),
                array(
                    'q' => '年末年始や長期休暇も対応可能でしょうか。',
                    'a' => '可能です。SalonConciergeは24時間365日休みなく稼働しております。お盆休み、年末年始、ゴールデンウィークなどの繁忙期も安心して運営をお任せください。'
                ),
                array(
                    'q' => '短期利用も可能でしょうか。',
                    'a' => '可能です。最短3ヶ月のご契約から承っております。テスト導入や期間限定のキャンペーン時期のみの利用などもお気軽にご相談ください。'
                ),
                array(
                    'q' => '常時ではなく不在時や必要時のみお願いできますか。',
                    'a' => '可能です。店舗様の状況に合わせて、必要な時間帯だけ転送をかけていただく形で柔軟に対応いたします。夜間のみ、または接客中のみといった使い分けも可能です。'
                ),
                array(
                    'q' => '個別の要望も対応してもらえますか。',
                    'a' => '可能です。導入前に詳細なヒアリングを行い、店舗様独自の「こだわり」や「ルール」を反映した専用マニュアルを作成します。貴店に最適なオーダーメイドの対応を実現します。'
                ),
                array(
                    'q' => '業務報告はしてもらえますか。',
                    'a' => '可能です。受電内容や予約状況は、チャットツール（LINE、Slack等）やメールにて、即時かつ正確に報告いたします。日次や月次での集計レポートの提出も承っております。'
                ),
                array(
                    'q' => 'いかにもコールセンターというよりは自店舗スタッフに近い応対をしてほしい。',
                    'a' => '私たちが最も得意としている部分です。画一的なスクリプト対応ではなく、声のトーンや言葉選び一つひとつにこだわり、お客様に「安心感」と「信頼」を与えられる、店舗スタッフのような応対を徹底しています。'
                ),
                array(
                    'q' => 'ショートメールでお客様へ予約情報を送信できますか。',
                    'a' => '可能です。予約確定後、自動またはオペレーターによる手動操作で、お客様のスマホへ予約内容やアクセス情報をSMS送信することができます。'
                ),
                array(
                    'q' => 'グループLINEでセラピストへ予約情報を送信できますか。',
                    'a' => '可能です。専用のLINEグループに弊社オペレーターを追加いただくことで、最新の予約状況やお客様からの伝言をリアルタイムでセラピスト全員へ共有いたします。'
                ),
                array(
                    'q' => '初期費用、月額費用以外にかかる料金はありますか。',
                    'a' => '基本的にはございません。成果報酬型のプランの場合は受電件数に応じた料金となりますが、事前に明確な見積もりを提示いたしますので、不明瞭な追加費用は発生しません。'
                ),
                array(
                    'q' => '契約から導入までどのくらいかかりますか。',
                    'a' => '最短3営業日で開始可能です。お急ぎの場合は即日対応が可能なケースもございますので、まずはお電話にてお問い合わせください。'
                ),
                array(
                    'q' => '既に自社で顧客管理システムを使っていますが、連携できますか。',
                    'a' => 'はい、可能です。多くの店舗様で導入されている主要システムとの連携実績がございます。また、弊社提供の無料システムへの移行もスムーズに行えるようサポートいたします。'
                ),
                array(
                    'q' => '夜間、早朝のみの対応は可能ですか。',
                    'a' => '可能です。24時間対応はもちろん、夜間帯のみの深夜プランなども柔軟にご用意しております。スタッフの負担軽減や残業代カットに貢献します。'
                ),
                array(
                    'q' => '求人の問い合わせも対応してもらえますか。',
                    'a' => 'はい、対応可能です。セラピスト応募者への一次受付、条件の確認、面接の日程調整まで、あらかじめ決めたルールに基づいて完璧に代行いたします。'
                ),
                array(
                    'q' => '複数の店舗をまとめてお願いできますか。',
                    'a' => '可能です。複数店舗を一括でお任せいただくことで、運営コストの削減と応対品質の統一化を同時に実現できます。大規模なサロンチェーン様にも対応しております。'
                ),
                array(
                    'q' => '解約金や契約期間の縛りはありますか。',
                    'a' => '解約金は一切ございません。契約期間の縛りもなく、1ヶ月前のご通知でいつでも解約が可能です。サービスの品質に絶対の自信があるからこその設定です。'
                ),
                array(
                    'q' => '万が一、対応に不備があった場合はどうなりますか。',
                    'a' => '全ての通話は常時録音されており、即座に確認が可能です。不備があった場合は迅速に報告・改善を行い、再発防止を徹底します。常に高品質なサービス維持に努めております。'
                ),
                array(
                    'q' => '支払い方法は何がありますか。',
                    'a' => '銀行振込、および各種クレジットカードによるお支払いに対応しております。経理処理に合わせて柔軟に対応させていただきます。'
                ),
            );
            foreach ($faqs as $idx => $faq) :
            ?>
                <div class="bg-white rounded-3xl p-8 md:p-10 mb-8 border border-gray-100 shadow-sm shadow-gray-200/50 hover:shadow-md transition-all duration-300">
                    <!-- Question -->
                    <div class="flex gap-6 items-start mb-8">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl rounded-br-none bg-[#3e594b] flex items-center justify-center text-white font-bold text-lg md:text-xl shrink-0 shadow-lg shadow-[#3e594b]/20">Q</div>
                        <h3 class="text-base md:text-lg font-bold text-gray-800 leading-tight pt-2 md:pt-3 tracking-wide">
                            <?php echo esc_html($faq['q']); ?>
                        </h3>
                    </div>
                    <!-- Answer -->
                    <div class="flex gap-6 items-start">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl rounded-br-none bg-[#d4a373] flex items-center justify-center text-white font-bold text-lg md:text-xl shrink-0 shadow-lg shadow-[#d4a373]/20">A</div>
                        <div class="text-gray-600 leading-loose pt-2 md:pt-3 text-[15px] md:text-base tracking-relaxed">
                            <?php echo $faq['a']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
