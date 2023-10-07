//not implemented  include and require
//not implemented  include and require
//not implemented  include and require
//not implemented  include and require
//not implemented phptojs\JsPrinter\JsPrinter::pScalar_MagicConst_File
/**
 *
 *  @package HREFLANG Tags Pro.Init
 *  @since 1.3.3
 *
 */
if (!function_exists("add_filter")) {
    header("Status: 403 Forbidden");
    header("HTTP/1.1 403 Forbidden");
    throw new Exit();;
}
if (file_exists(HREFLANG_PLUGIN_MAIN_PATH + "includes/notices.php")) {
    eval(include_once("HREFLANG_PLUGIN_MAIN_PATH+"
                includes / notices.php.js "));
            }
            else {
                throw new Exit("Notices are missing");;
            }
            if (file_exists(HREFLANG_PLUGIN_MAIN_PATH + "includes/functions.php")) {
                eval(include_once("HREFLANG_PLUGIN_MAIN_PATH+"
                            includes / functions.php.js "));
                        }
                        else {
                            throw new Exit("Functions are missing");;
                        }
                        if (file_exists(HREFLANG_PLUGIN_MAIN_PATH + "includes/variables.php")) {
                            eval(include_once("HREFLANG_PLUGIN_MAIN_PATH+"
                                        includes / variables.php.js "));
                                    }
                                    else {
                                        throw new Exit("Variables are missing");;
                                    }
                                    if (file_exists(HREFLANG_PLUGIN_MAIN_PATH + "includes/actions.php")) {
                                        eval(include_once("HREFLANG_PLUGIN_MAIN_PATH+"
                                                    includes / actions.php.js "));
                                                }
                                                else {
                                                    throw new Exit("Actions are missing");;
                                                }
                                                register_activation_hook(, "hreflang_admin_actions");
                                                // init text domain
                                                // add this link only if admin and option is enabled
                                                if (get_option("hreflang-enable-admin-menu", "false") == "true") {
                                                    if (is_admin()) {
                                                        add_action("wp_before_admin_bar_render", "hreflang_admin_bar");
                                                    }
                                                }
                                                var plugin; plugin = plugin_basename(HREFLANG_PLUGIN_FILE); add_filter("plugin_action_links_" + plugin + "", "hreflang_plugin_settings_link", 10, 4);
                                                var notices; notices = HREFLangTags_Admin_Notices.get_instance();
                                                var text; text = __("Now through December 31, 2021 save 25% on ALL of our <a href=\"https://www.hreflangtags.com/pricing/\"><b>Professional</b></a> and <a href=\"https://www.hreflangtags.com/lifetime-pricing/\"><b>Lifetime Licenses</b></a>. Choose the license best suited to your needs and enter the code BYEBYECOVID19 at checkout.", "hreflang-tags-by-dcgws"); notices.info(text, "bye-bye-covid");
