/**
 * Customize API: WP_Customize_Background_Image_Control class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */
/**
 * Customize Background Image Control class.
 *
 * @since 3.4.0
 *
 * @see WP_Customize_Image_Control
 */
var WP_Customize_Background_Image_Control = (function(parent) {
    function WP_Customize_Background_Image_Control(manager) {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = true;
        parent.call(this);
        this.type = "background";
        if (__isInheritance == false) {
            this.__construct(manager);
        }
    }
    __extends(WP_Customize_Background_Image_Control, parent);
    /**
     * Constructor.
     *
     * @since 3.4.0
     * @uses WP_Customize_Image_Control::__construct()
     *
     * @param {WP_Customize_Manager} manager Customizer bootstrap instance.
     */
    WP_Customize_Background_Image_Control.prototype.__construct = function(manager) {
        parent.prototype.__construct.call(this, manager, "background_image", {
            "label": __("Background Image"),
            "section": "background_image"
        });
    };
    /**
     * Enqueue control related scripts/styles.
     *
     * @since 4.1.0
     */
    WP_Customize_Background_Image_Control.prototype.enqueue = function() {
        parent.prototype.enqueue.call(this);
        var custom_background;
        custom_background = get_theme_support("custom-background");
        wp_localize_script("customize-controls", "_wpCustomizeBackground", {
            "defaults": !empty(custom_background[0]) ? custom_background[0] : {},
            "nonces": {
                "add": wp_create_nonce("background-add")
            }
        });
    };
    WP_Customize_Background_Image_Control.class = 'WP_Customize_Background_Image_Control';
    return WP_Customize_Background_Image_Control;
})(WP_Customize_Image_Control);
