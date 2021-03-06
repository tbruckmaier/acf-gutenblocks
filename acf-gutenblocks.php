<?php
/**
 * Plugin Name:     ACF Gutenblocks
 * Plugin URI:      https://github.com/ItinerisLtd/acf-gutenblocks
 * Description:     Easily create Gutenberg Blocks with Advanced Custom Fields
 * Version:         0.2.0
 * Author:          Itineris Limited
 * Author URI:      https://itineris.co.uk
 * Text Domain:     acf-gutenblocks
 */

declare(strict_types=1);

namespace Itineris\AcfGutenblocks;

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

add_action('acf/init', function (): void {
    $blocks = apply_filters('acf_gutenblocks/blocks', []);

    if (empty($blocks)) {
        return;
    }

    $plugin = new Plugin();

    foreach ($blocks as $block) {
        $plugin->add($block);
    }

    $plugin->init();
});
