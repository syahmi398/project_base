<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Print readable data (arrays, objects, strings)
 * Example: pr($variable);
 */
if (!function_exists('pr')) {
    function pr($data, $exit = true) {
        echo '<pre style="background:#111;color:#0f0;padding:10px;border-radius:8px;">';
        print_r($data);
        echo '</pre>';

        if ($exit) die(0); // stop execution
    }
}

/**
 * Print last executed query
 * Example: pr_query($this->db);
 */
if (!function_exists('pr_query')) {
    function pr_query($db, $exit = true) {
        echo '<pre style="background:#222;color:#0ff;padding:10px;border-radius:8px;">';
        echo $db->last_query();
        echo '</pre>';

        if ($exit) die(0); // stop execution
    }
}

/**
 * Log data to CodeIgniter's log file
 * Example: log_debug($variable);
 */
if (!function_exists('log_debug')) {
    function log_debug($data) {
        if (is_array($data) || is_object($data)) {
            $data = print_r($data, true);
        }
        log_message('debug', "DEBUG LOG: " . $data);
    }
}
