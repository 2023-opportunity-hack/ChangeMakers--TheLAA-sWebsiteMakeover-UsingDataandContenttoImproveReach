/**
 * HTML Tag Processor: Text replacement class.
 *
 * @package WordPress
 * @subpackage HTML-API
 * @since 6.2.0
 */
/**
 * Data structure used to replace existing content from start to end that allows to drastically improve performance.
 *
 * This class is for internal usage of the WP_HTML_Tag_Processor class.
 *
 * @access private
 * @since 6.2.0
 *
 * @see WP_HTML_Tag_Processor
 */
var WP_HTML_Text_Replacement = (function() {
    function WP_HTML_Text_Replacement(start, end, text) {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = false;
        /**
         * Byte offset into document where replacement span begins.
         *
         * @since 6.2.0
         * @type {int}
         */
        this.start = null;
        /**
         * Byte offset into document where replacement span ends.
         *
         * @since 6.2.0
         * @type {int}
         */
        this.end = null;
        /**
         * Span of text to insert in document to replace existing content from start to end.
         *
         * @since 6.2.0
         * @type {string}
         */
        this.text = null;
        if (__isInheritance == false) {
            this.__construct(start, end, text);
        }
    }
    /**
     * Constructor.
     *
     * @since 6.2.0
     *
     * @param {int}    $start Byte offset into document where replacement span begins.
     * @param {int}    $end   Byte offset into document where replacement span ends.
     * @param {string} text  Span of text to insert in document to replace existing content from start to end.
     */
    WP_HTML_Text_Replacement.prototype.__construct = function(start, end, text) {
        this.start = start;
        this.end = end;
        this.text = text;
    };
    WP_HTML_Text_Replacement.class = 'WP_HTML_Text_Replacement';
    return WP_HTML_Text_Replacement;
})();
