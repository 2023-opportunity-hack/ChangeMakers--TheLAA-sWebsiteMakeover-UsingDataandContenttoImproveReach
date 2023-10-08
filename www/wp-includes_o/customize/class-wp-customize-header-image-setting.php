//not implemented  include and require
/**
 * Customize API: WP_Customize_Header_Image_Setting class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */
/**
 * A setting that is used to filter a value, but will not save the results.
 *
 * Results should be properly handled using another setting or callback.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Setting
 */
var WP_Customize_Header_Image_Setting = (function(parent) {
            function WP_Customize_Header_Image_Setting() {
                var __isInheritance = __IS_INHERITANCE__;
                window.__IS_INHERITANCE__ = true;
                parent.call(this);
                this.id = "header_image_data";
                if (__isInheritance == false) {
                    if (parent.prototype.__construct) {
                        parent.prototype.__construct.apply(this, arguments);
                    }
                }
            }
            __extends(WP_Customize_Header_Image_Setting, parent);
            /**
             * @since 3.4.0
             *
             * @global Custom_Image_Header $custom_image_header
             *
             * @param value
             */
            WP_Customize_Header_Image_Setting.prototype.update = function(value) {
                // If _custom_header_background_just_in_time() fails to initialize $custom_image_header when not is_admin().
                if (empty(custom_image_header)) {
                    eval(require_once("	ABSPATH+"
                            wp - admin / custom - header.php.js "));
                            var args; args = get_theme_support("custom-header");
                            var admin_head_callback; admin_head_callback = isset(args[0]["admin-head-callback"]) ? args[0]["admin-head-callback"] : null;
                            var admin_preview_callback; admin_preview_callback = isset(args[0]["admin-preview-callback"]) ? args[0]["admin-preview-callback"] : null; custom_image_header = new Custom_Image_Header(admin_head_callback, admin_preview_callback);
                        }
                        // If the value doesn't exist (removed or random),
                        // use the header_image value.
                        if (!value) {
                            value = this.manager.get_setting("header_image").post_value();
                        }
                        if (is_array(value) && isset(value["choice"])) {
                            custom_image_header.set_header_image(value["choice"]);
                        } else {
                            custom_image_header.set_header_image(value);
                        }
                    };
                    WP_Customize_Header_Image_Setting.class = 'WP_Customize_Header_Image_Setting';
                    return WP_Customize_Header_Image_Setting;
                })(WP_Customize_Setting);
