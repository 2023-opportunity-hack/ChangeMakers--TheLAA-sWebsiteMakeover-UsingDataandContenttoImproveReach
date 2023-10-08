/**
 * Customize API: WP_Customize_Nav_Menu_Section class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.4.0
 */
/**
 * Customize Menu Section Class
 *
 * Custom section only needed in JS.
 *
 * @since 4.3.0
 *
 * @see WP_Customize_Section
 */
var WP_Customize_Nav_Menu_Section = (function(parent) {
    function WP_Customize_Nav_Menu_Section() {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = true;
        parent.call(this);
        /**
         * Control type.
         *
         * @since 4.3.0
         * @type {string}
         */
        this.type = "nav_menu";
        if (__isInheritance == false) {
            if (parent.prototype.__construct) {
                parent.prototype.__construct.apply(this, arguments);
            }
        }
    }
    __extends(WP_Customize_Nav_Menu_Section, parent);
    /**
     * Get section parameters for JS.
     *
     * @since 4.3.0
     * @return array Exported parameters.
     */
    WP_Customize_Nav_Menu_Section.prototype.json = function() {
        var exported;
        exported = parent.prototype.json.call(this);
        exported["menu_id"] = intval(preg_replace("/^nav_menu\\[(-?\\d+)\\]/", "$1", this.id));
        return exported;
    };
    WP_Customize_Nav_Menu_Section.class = 'WP_Customize_Nav_Menu_Section';
    return WP_Customize_Nav_Menu_Section;
})(WP_Customize_Section);
