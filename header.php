<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <?php wp_head(); ?>
    <style type="text/tailwindcss">
        @theme {
            /* High-End Botanical Palette */
            --color-botanical-primary: #3a5f56;
            --color-botanical-primary-light: #7c9a8c;
            --color-botanical-bg: #f9fbf9;
            --color-botanical-accent: #c5a085;
            --color-botanical-text: #333333;
            --color-botanical-text-light: #666666;
            --color-botanical-cta: #d4a373;
            --color-botanical-white: #ffffff;

            /* Legacy preservation mapping */
            --color-salon-pink: #d4a373;
            --color-salon-tan: #c5a085;
            --color-salon-gold: #c5a085;
            --color-salon-blue: #3a5f56;
            --color-salon-light: #f9fbf9;

            /* Sage Color Palette */
            --color-sage-50: #f9fbf9;
            --color-sage-100: #f0f4f2;
            --color-sage-200: #e0e9e5;
            --color-sage-300: #bfd3cb;
            --color-sage-400: #9ab4ab;
            --color-sage-500: #7c9a8c;
            --color-sage-600: #608075;
            --color-sage-700: #4b665c;
            --color-sage-800: #3a5f56;
            --color-sage-900: #2f4d46;
            --color-sage-950: #1d2d29;

            /* Mobile-first spacing utilities */
            --spacing-section-mobile: 4rem;
            --spacing-section-desktop: 6rem;
        }

        @layer base {
            .font-heading {
                font-family: "Noto Serif JP", "Yu Mincho", "YuMincho", "Hiragino Mincho ProN", serif;
            }
        }

        @layer components {
            .btn-cta {
                @apply bg-botanical-cta text-white font-bold py-3 px-8 rounded-full shadow-md hover:opacity-90 transition-all transform hover:-translate-y-0.5 text-center inline-flex items-center justify-center gap-2;
            }

            .btn-outline {
                @apply border-2 border-botanical-primary text-botanical-primary font-bold py-3 px-8 rounded-full hover:bg-botanical-primary hover:text-white transition-all text-center inline-block;
            }

            .section-padding {
                @apply py-20 md:py-32;
            }

            .container-custom {
                @apply container mx-auto px-4 md:px-6 max-w-6xl;
            }

            .keep-phrase {
                display: inline-block;
            }
            @media (min-width: 768px) {
                .keep-phrase {
                    white-space: nowrap;
                }
            }
        }

        @layer utilities {
            .animate-fade-in {
                animation: fadeIn 0.8s ease-out forwards;
            }

            .animate-marquee {
                display: flex;
                width: max-content;
                animation: marquee 50s linear infinite;
            }

            .reveal-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s cubic-bezier(0.22, 1, 0.36, 1);
            }

            .reveal-active {
                opacity: 1;
                transform: translateY(0);
            }

            .reveal-delay-1 { transition-delay: 0.1s; }
            .reveal-delay-2 { transition-delay: 0.2s; }
            .reveal-delay-3 { transition-delay: 0.3s; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(calc(-50% - 1.5rem)); }
        }

        .hover\:pause:hover {
            animation-play-state: paused;
        }

        /* Fixed Header & Admin Bar Adjustments */
        #fixed-top-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
        }

        .admin-bar #fixed-top-container {
            top: 32px;
        }

        @media screen and (max-width: 782px) {
            .admin-bar #fixed-top-container {
                top: 46px;
            }
        }

        /* Adjust site content to start below fixed header */
        .site-content-spacer {
            height: 104px; /* Default height */
        }
        @media screen and (max-width: 640px) {
            .site-content-spacer {
                height: 100px;
            }
        }
    </style>
</head>
<body <?php body_class('min-h-screen flex flex-col font-sans overflow-x-hidden bg-botanical-bg'); ?>>
    <?php wp_body_open(); ?>

    <div id="fixed-top-container">
        <!-- Top Banner -->
        <div class="bg-botanical-primary text-white text-[10px] md:text-xs py-1.5 text-center px-4 shadow-sm">
            <span class="keep-phrase">メンズエステ専門電話代行</span> | <span class="keep-phrase">業界最高水準の応答率と契約継続率</span>
        </div>

        <!-- Header -->
        <header class="bg-white/95 backdrop-blur-md border-b border-sage-100 shadow-sm w-full">
            <div class="container-custom py-3 flex items-center justify-between">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group shrink-0">
                    <div class="w-10 h-10 bg-botanical-primary rounded-lg flex items-center justify-center text-white shadow-md group-hover:bg-botanical-primary-light transition-colors">
                        <span class="font-heading font-bold text-xl tracking-tighter">S</span>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-botanical-primary leading-none font-heading tracking-wide">
                            <span class="keep-phrase">SalonConcierge</span>
                        </h1>
                        <span class="text-[9px] md:text-[10px] text-gray-400 tracking-wider font-medium opacity-80 uppercase block mt-1">
                            Phone Reception Services
                        </span>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center gap-4 xl:gap-6">
                    <?php
                    $nav_links = array(
                        array('name' => 'トップ', 'path' => '/'),
                        array('name' => 'サービス詳細・料金', 'path' => '/services'),
                        array('name' => 'システム詳細', 'path' => '/system'),
                        array('name' => 'よくあるご質問', 'path' => '/faq'),
                        array('name' => 'お問い合わせ', 'path' => '/contact'),
                        array('name' => '求人情報', 'path' => '/jobs'),
                        array('name' => '会社概要', 'path' => '/company'),
                        array('name' => 'コラム', 'path' => '/column'),
                    );
                    foreach ($nav_links as $link) :
                        $is_active = (is_front_page() && $link['path'] == '/') || (strpos($_SERVER['REQUEST_URI'], $link['path']) !== false && $link['path'] != '/');
                    ?>
                        <a href="<?php echo esc_url(home_url($link['path'])); ?>" class="whitespace-nowrap <?php echo $is_active ? 'text-botanical-primary font-bold decoration-2' : 'text-gray-600 hover:text-botanical-primary'; ?> transition-all text-sm xl:text-base">
                            <?php echo esc_html($link['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>

                <!-- CTA Group (Desktop) -->
                <div class="hidden md:flex flex-col items-end gap-1 shrink-0">
                    <a href="#" class="bg-[#06C755] hover:bg-[#05b34c] text-white px-4 py-1.5 rounded-full text-[10px] xl:text-xs font-bold flex items-center gap-2 transition-all shadow-sm">
                        <?php salon_icon('message-circle', 'w-3 h-3 xl:w-4 xl:h-4'); ?>
                        LINEでお問い合わせ
                    </a>
                    <div class="flex items-center gap-2 text-[9px] xl:text-[10px] text-gray-400">
                        <?php salon_icon('clock', 'w-2.5 h-2.5 xl:w-3 xl:h-3'); ?>
                        受付: 9:30 - 翌6:00
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle" class="lg:hidden p-2 text-sage-800 focus:outline-none" aria-label="Menu">
                    <?php salon_icon('menu', 'w-6 h-6'); ?>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-sage-100 p-6 absolute top-full left-0 w-full shadow-2xl animate-fade-in max-h-[calc(100vh-100px)] overflow-y-auto">
                <div class="flex flex-col gap-6">
                    <?php 
                    $mobile_nav_links = array(
                        array('name' => 'トップ', 'path' => '/'),
                        array('name' => 'サービス詳細・料金', 'path' => '/services'),
                        array('name' => 'システム詳細', 'path' => '/system'),
                        array('name' => 'よくあるご質問', 'path' => '/faq'),
                        array('name' => 'お問い合わせ', 'path' => '/contact'),
                        array('name' => '求人情報', 'path' => '/jobs'),
                        array('name' => '会社概要', 'path' => '/company'),
                        array('name' => 'コラム', 'path' => '/column'),
                    );
                    foreach ($mobile_nav_links as $link) : ?>
                        <a href="<?php echo esc_url(home_url($link['path'])); ?>" class="text-gray-800 text-lg font-bold py-1 border-b border-sage-50 flex items-center justify-between">
                            <?php echo esc_html($link['name']); ?>
                            <?php salon_icon('chevron-right', 'w-4 h-4 text-sage-300'); ?>
                        </a>
                    <?php endforeach; ?>
                    <div class="pt-6 pb-4 flex flex-col gap-4">
                        <a href="tel:080-1017-5318" class="flex items-center justify-center gap-3 bg-sage-500 text-white py-4 rounded-2xl font-bold shadow-lg shadow-sage-500/20 active:scale-95 transition-transform">
                            <?php salon_icon('phone', 'w-5 h-5'); ?> 080-1017-5318
                        </a>
                        <a href="#" class="flex items-center justify-center gap-3 bg-[#06C755] text-white py-4 rounded-2xl font-bold shadow-lg shadow-[#06C755]/20 active:scale-95 transition-transform">
                            <?php salon_icon('message-circle', 'w-5 h-5'); ?> LINE 24時間受付
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Header Spacer to prevent content from jumping under fixed header -->
    <div class="site-content-spacer"></div>

    <script>
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const body = document.body;

        menuToggle.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                body.classList.add('overflow-hidden');
            } else {
                mobileMenu.classList.add('hidden');
                body.classList.remove('overflow-hidden');
            }
        });

        // Close menu on resize if screen becomes large
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) { // lg breakpoint
                mobileMenu.classList.add('hidden');
                body.classList.remove('overflow-hidden');
            }
        });

        // Intersection Observer for Scroll Animations
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-active');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            revealElements.forEach(el => observer.observe(el));
        });
    </script>

    <main class="flex-grow pb-24 md:pb-0">
