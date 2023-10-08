if (defined("WP_UNINSTALL_PLUGIN")) {
    wpdb.query("DELETE FROM wp_options WHERE option_name LIKE \"hreflangtags_dismissed_%\";");
}
