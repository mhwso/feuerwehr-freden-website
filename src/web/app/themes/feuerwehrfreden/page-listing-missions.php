<?php
/**
 * Template Name: Kategorie-Template: Einsätze
 *
 * @package FFF
 */

use function Env\env;

$category = env('CATEGORY_ID_MISSIONS') ?? 0;

include_once get_template_directory(__FILE__) . '/page-listing.php';
