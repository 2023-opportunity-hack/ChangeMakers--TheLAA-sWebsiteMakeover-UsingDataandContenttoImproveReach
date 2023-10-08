/**
 * Customize API: WP_Customize_Image_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */
/**
 * Customize Image Control class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Upload_Control
 */
var WP_Customize_Image_Control = (function(parent) {
    function WP_Customize_Image_Control() {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = true;
        parent.call(this);
        this.type = "image";
        this.mime_type = "image";
        if (__isInheritance == false) {
            if (parent.prototype.__construct) {
                parent.prototype.__construct.apply(this, arguments);
            }
        }
    }
    __extends(WP_Customize_Image_Control, parent);
    /**
     * @since 3.4.2
     * @deprecated 4.1.0
     */
    WP_Customize_Image_Control.prototype.prepare_control = function() {};
    /**
     * @since 3.4.0
     * @deprecated 4.1.0
     *
     * @param {string} id
     * @param {string} label
     * @param {mixed} callback
     */
    WP_Customize_Image_Control.prototype.add_tab = function(id, label, callback) {
        _deprecated_function('WP_Customize_Image_Control::add_tab', "4.1.0");
    };
    /**
     * @since 3.4.0
     * @deprecated 4.1.0
     *
     * @param {string} id
     */
    WP_Customize_Image_Control.prototype.remove_tab = function(id) {
        _deprecated_function('WP_Customize_Image_Control::remove_tab', "4.1.0");
    };
    /**
     * @since 3.4.0
     * @deprecated 4.1.0
     *
     * @param {string} url
     * @param {string} thumbnail_url
     */
    WP_Customize_Image_Control.prototype.print_tab_image = function(url, thumbnail_url) {
        if (typeof thumbnail_url == 'undefined') thumbnail_url = null;
        _deprecated_function('WP_Customize_Image_Control::print_tab_image', "4.1.0");
    };
    WP_Customize_Image_Control.class = 'WP_Customize_Image_Control';
    return WP_Customize_Image_Control;
})(WP_Customize_Upload_Control);
