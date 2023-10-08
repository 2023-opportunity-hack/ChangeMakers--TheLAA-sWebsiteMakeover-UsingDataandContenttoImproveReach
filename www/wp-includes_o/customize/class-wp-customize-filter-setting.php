/**
 * Customize API: WP_Customize_Filter_Setting class
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
var WP_Customize_Filter_Setting = (function(parent) {
    function WP_Customize_Filter_Setting() {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = true;
        parent.call(this);
        if (__isInheritance == false) {
            if (parent.prototype.__construct) {
                parent.prototype.__construct.apply(this, arguments);
            }
        }
    }
    __extends(WP_Customize_Filter_Setting, parent);
    /**
     * Saves the value of the setting, using the related API.
     *
     * @since 3.4.0
     *
     * @param {mixed} value The value to update.
     */
    WP_Customize_Filter_Setting.prototype.update = function(value) {};
    WP_Customize_Filter_Setting.class = 'WP_Customize_Filter_Setting';
    return WP_Customize_Filter_Setting;
})(WP_Customize_Setting);
