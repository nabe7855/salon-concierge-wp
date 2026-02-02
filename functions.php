<?php
/**
 * Salon Concierge Theme functions and definitions
 */

require_once get_template_directory() . '/inc/constants.php';

function salon_concierge_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'salon-concierge'),
    ));
}
add_action('after_setup_theme', 'salon_concierge_setup');

function salon_concierge_scripts() {
    // Enqueue Lucide Icons (load in footer)
    wp_enqueue_script('lucide', 'https://unpkg.com/lucide@latest', array(), null, true);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@700&display=swap', array(), null);
    
    // Theme Styles
    wp_enqueue_style('salon-concierge-styles', get_stylesheet_uri());
    
    // Update Lucide initialization to wait for DOM and Tailwind processing
    wp_add_inline_script('lucide', '
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
            // Re-run after a short delay to catch dynamically rendered / Tailwind processed icons
            setTimeout(function() { lucide.createIcons(); }, 500);
        });
    ');
}
add_action('wp_enqueue_scripts', 'salon_concierge_scripts');

// Helper function to render Lucide icons in PHP
function salon_icon($name, $class = "") {
    echo salon_icon_html($name, $class);
}

function salon_icon_html($name, $class = "") {
    return '<i data-lucide="' . $name . '" class="' . $class . '"></i>';
}

// Helper function for theme images
function salon_img($path) {
    return get_template_directory_uri() . $path;
}

/**
 * Register Inquiry and Recruitment Application CPTs
 */
function salon_register_form_cpts() {
    // Inquiry CPT
    register_post_type('inquiry', array(
        'labels' => array(
            'name' => 'お問い合わせ',
            'singular_name' => 'お問い合わせ',
            'menu_name' => 'お問い合わせ',
            'all_items' => 'お問い合わせ一覧',
        ),
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false, // Disable manual creation
        ),
        'map_meta_cap' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-email-alt',
        'supports' => array('title', 'custom-fields'),
        'show_in_rest' => false,
    ));

    // Application CPT
    register_post_type('application', array(
        'labels' => array(
            'name' => '採用応募',
            'singular_name' => '採用応募',
            'menu_name' => '採用応募',
            'all_items' => '採用応募一覧',
        ),
        'public' => false,
        'show_ui' => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false, // Disable manual creation
        ),
        'map_meta_cap' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => array('title', 'custom-fields'),
        'show_in_rest' => false,
    ));
}
add_action('init', 'salon_register_form_cpts');

/**
 * Customize Admin Columns for Inquiries
 */
add_filter('manage_inquiry_posts_columns', 'salon_set_inquiry_columns');
function salon_set_inquiry_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => 'お名前',
        'salon_name' => 'サロン名/会社名',
        'email' => 'メールアドレス',
        'phone' => '電話番号',
        'date' => '日付',
    );
    return $columns;
}

add_action('manage_inquiry_posts_custom_column', 'salon_inquiry_custom_column', 10, 2);
function salon_inquiry_custom_column($column, $post_id) {
    switch ($column) {
        case 'salon_name':
            echo esc_html(get_post_meta($post_id, 'salon_name', true));
            break;
        case 'email':
            echo esc_html(get_post_meta($post_id, 'email', true));
            break;
        case 'phone':
            echo esc_html(get_post_meta($post_id, 'phone', true));
            break;
    }
}

/**
 * Customize Admin Columns for Applications
 */
add_filter('manage_application_posts_columns', 'salon_set_application_columns');
function salon_set_application_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => 'お名前',
        'age' => '年齢',
        'pref' => '都道府県',
        'type' => '雇用形態',
        'date' => '日付',
    );
    return $columns;
}

add_action('manage_application_posts_custom_column', 'salon_application_custom_column', 10, 2);
function salon_application_custom_column($column, $post_id) {
    switch ($column) {
        case 'age':
            echo esc_html(get_post_meta($post_id, 'age', true)) . '歳';
            break;
        case 'pref':
            echo esc_html(get_post_meta($post_id, 'prefecture', true));
            break;
        case 'type':
            echo esc_html(get_post_meta($post_id, 'employment_type', true));
            break;
    }
}

/**
 * Add Meta Boxes to show submission details
 */
function salon_add_form_meta_boxes() {
    add_meta_box('inquiry_details', 'お問い合わせ内容', 'salon_display_inquiry_meta_box', 'inquiry', 'normal', 'high');
    add_meta_box('application_details', '応募内容', 'salon_display_application_meta_box', 'application', 'normal', 'high');
}
add_action('add_meta_boxes', 'salon_add_form_meta_boxes');

function salon_display_inquiry_meta_box($post) {
    $salon_name    = get_post_meta($post->ID, 'salon_name', true);
    $name          = get_post_meta($post->ID, 'name', true);
    $email         = get_post_meta($post->ID, 'email', true);
    $phone         = get_post_meta($post->ID, 'phone', true);
    $prefecture    = get_post_meta($post->ID, 'prefecture', true);
    $reply_method  = get_post_meta($post->ID, 'reply_method', true);
    $inquiry_items = get_post_meta($post->ID, 'inquiry_items', true);
    $message       = get_post_meta($post->ID, 'message', true);
    $source        = get_post_meta($post->ID, 'source', true);
    $factor        = get_post_meta($post->ID, 'factor', true);

    echo '<table class="form-table">';
    echo '<tr><th>サロン名/会社名</th><td>' . esc_html($salon_name) . '</td></tr>';
    echo '<tr><th>ご担当者様名</th><td>' . esc_html($name) . '</td></tr>';
    echo '<tr><th>メールアドレス</th><td>' . esc_html($email) . '</td></tr>';
    echo '<tr><th>電話番号</th><td>' . esc_html($phone) . '</td></tr>';
    echo '<tr><th>都道府県</th><td>' . esc_html($prefecture) . '</td></tr>';
    echo '<tr><th>希望返信方法</th><td>' . ($reply_method === 'phone' ? 'お電話' : 'メール') . '</td></tr>';
    echo '<tr><th>お問い合わせ項目</th><td>' . (is_array($inquiry_items) ? implode(', ', array_map('esc_html', $inquiry_items)) : esc_html($inquiry_items)) . '</td></tr>';
    echo '<tr><th>お問い合わせ内容</th><td>' . nl2br(esc_html($message)) . '</td></tr>';
    echo '<tr><th>当社を知ったきっかけ</th><td>' . esc_html($source) . '</td></tr>';
    echo '<tr><th>決めて</th><td>' . esc_html($factor) . '</td></tr>';
    echo '</table>';
}

function salon_display_application_meta_box($post) {
    $name            = get_post_meta($post->ID, 'name', true);
    $age             = get_post_meta($post->ID, 'age', true);
    $email           = get_post_meta($post->ID, 'email', true);
    $phone           = get_post_meta($post->ID, 'phone', true);
    $desired_hours   = get_post_meta($post->ID, 'desired_hours', true);
    $prefecture      = get_post_meta($post->ID, 'prefecture', true);
    $gender          = get_post_meta($post->ID, 'gender', true);
    $employment_type = get_post_meta($post->ID, 'employment_type', true);
    $desired_days    = get_post_meta($post->ID, 'desired_days', true);
    $comment         = get_post_meta($post->ID, 'comment', true);

    echo '<table class="form-table">';
    echo '<tr><th>お名前</th><td>' . esc_html($name) . '</td></tr>';
    echo '<tr><th>年齢</th><td>' . esc_html($age) . ' 歳</td></tr>';
    echo '<tr><th>メールアドレス</th><td>' . esc_html($email) . '</td></tr>';
    echo '<tr><th>電話番号</th><td>' . esc_html($phone) . '</td></tr>';
    echo '<tr><th>性別</th><td>' . ($gender === 'male' ? '男性' : '女性') . '</td></tr>';
    echo '<tr><th>お住まいの都道府県</th><td>' . esc_html($prefecture) . '</td></tr>';
    echo '<tr><th>雇用形態</th><td>' . esc_html($employment_type) . '</td></tr>';
    echo '<tr><th>希望勤務時間</th><td>' . esc_html($desired_hours) . '</td></tr>';
    echo '<tr><th>希望勤務日数</th><td>週 ' . esc_html($desired_days) . ' 日</td></tr>';
    echo '<tr><th>コメント欄</th><td>' . nl2br(esc_html($comment)) . '</td></tr>';
    echo '</table>';
}

/**
 * Register Custom Settings
 */
function salon_register_settings() {
    register_setting('general', 'salon_form_notification_email', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_email',
        'default' => ''
    ));

    add_settings_field(
        'salon_form_notification_email',
        'フォーム通知先メールアドレス',
        'salon_form_notification_email_callback',
        'general'
    );
}
add_action('admin_init', 'salon_register_settings');

function salon_form_notification_email_callback() {
    $email = get_option('salon_form_notification_email');
    echo '<input type="email" name="salon_form_notification_email" value="' . esc_attr($email) . '" class="regular-text">';
    echo '<p class="description">お問い合わせフォームおよび採用応募フォームの通知先メールアドレスを設定します。<br>未設定の場合は管理者メールアドレスが使用されます。</p>';
}
