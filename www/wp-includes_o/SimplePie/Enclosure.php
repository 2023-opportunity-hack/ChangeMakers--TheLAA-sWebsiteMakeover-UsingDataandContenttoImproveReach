//not implemented phptojs\JsPrinter\JsPrinter::pStmt_Nop
//not implemented phptojs\JsPrinter\JsPrinter::pStmt_Nop
//not implemented phptojs\JsPrinter\JsPrinter::pStmt_Nop
/**
 * SimplePie
 *
 * A PHP-Based RSS and Atom Feed Framework.
 * Takes the hard work out of managing a complete RSS/Atom solution.
 *
 * Copyright (c) 2004-2012, Ryan Parman, Geoffrey Sneddon, Ryan McCue, and contributors
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * 	* Redistributions of source code must retain the above copyright notice, this list of
 * 	  conditions and the following disclaimer.
 *
 * 	* Redistributions in binary form must reproduce the above copyright notice, this list
 * 	  of conditions and the following disclaimer in the documentation and/or other materials
 * 	  provided with the distribution.
 *
 * 	* Neither the name of the SimplePie Team nor the names of its contributors may be used
 * 	  to endorse or promote products derived from this software without specific prior
 * 	  written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS
 * OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 * AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS
 * AND CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR
 * OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package SimplePie
 * @version 1.3.1
 * @copyright 2004-2012 Ryan Parman, Geoffrey Sneddon, Ryan McCue
 * @author Ryan Parman
 * @author Geoffrey Sneddon
 * @author Ryan McCue
 * @link http://simplepie.org/ SimplePie
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */
/**
 * Handles everything related to enclosures (including Media RSS and iTunes RSS)
 *
 * Used by {@see SimplePie_Item::get_enclosure()} and {@see SimplePie_Item::get_enclosures()}
 *
 * This class can be overloaded with {@see SimplePie::set_enclosure_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
var SimplePie_Enclosure = (function() {
    function SimplePie_Enclosure(link, type, length, javascript, bitrate, captions, categories, channels, copyright, credits, description, duration, expression, framerate, hashes, height, keywords, lang, medium, player, ratings, restrictions, samplingrate, thumbnails, title, width) {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = false;
        /**
         * @type {string}
         * @see get_bitrate()
         */
        this.bitrate = null;
        /**
         * @type {array}
         * @see get_captions()
         */
        this.captions = null;
        /**
         * @type {array}
         * @see get_categories()
         */
        this.categories = null;
        /**
         * @type {int}
         * @see get_channels()
         */
        this.channels = null;
        /**
         * @type {SimplePie_Copyright}
         * @see get_copyright()
         */
        this.copyright = null;
        /**
         * @type {array}
         * @see get_credits()
         */
        this.credits = null;
        /**
         * @type {string}
         * @see get_description()
         */
        this.description = null;
        /**
         * @type {int}
         * @see get_duration()
         */
        this.duration = null;
        /**
         * @type {string}
         * @see get_expression()
         */
        this.expression = null;
        /**
         * @type {string}
         * @see get_framerate()
         */
        this.framerate = null;
        /**
         * @type {string}
         * @see get_handler()
         */
        this.handler = null;
        /**
         * @type {array}
         * @see get_hashes()
         */
        this.hashes = null;
        /**
         * @type {string}
         * @see get_height()
         */
        this.height = null;
        /**
         * @deprecated
         * @type {null}
         */
        this.javascript = null;
        /**
         * @type {array}
         * @see get_keywords()
         */
        this.keywords = null;
        /**
         * @type {string}
         * @see get_language()
         */
        this.lang = null;
        /**
         * @type {string}
         * @see get_length()
         */
        this.length = null;
        /**
         * @type {string}
         * @see get_link()
         */
        this.link = null;
        /**
         * @type {string}
         * @see get_medium()
         */
        this.medium = null;
        /**
         * @type {string}
         * @see get_player()
         */
        this.player = null;
        /**
         * @type {array}
         * @see get_ratings()
         */
        this.ratings = null;
        /**
         * @type {array}
         * @see get_restrictions()
         */
        this.restrictions = null;
        /**
         * @type {string}
         * @see get_sampling_rate()
         */
        this.samplingrate = null;
        /**
         * @type {array}
         * @see get_thumbnails()
         */
        this.thumbnails = null;
        /**
         * @type {string}
         * @see get_title()
         */
        this.title = null;
        /**
         * @type {string}
         * @see get_type()
         */
        this.type = null;
        /**
         * @type {string}
         * @see get_width()
         */
        this.width = null;
        if (__isInheritance == false) {
            this.__construct(link, type, length, javascript, bitrate, captions, categories, channels, copyright, credits, description, duration, expression, framerate, hashes, height, keywords, lang, medium, player, ratings, restrictions, samplingrate, thumbnails, title, width);
        }
    }
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     *
     * @uses idna_convert If available, this will convert an IDN
     */
    SimplePie_Enclosure.prototype.__construct = function(link, type, length, javascript, bitrate, captions, categories, channels, copyright, credits, description, duration, expression, framerate, hashes, height, keywords, lang, medium, player, ratings, restrictions, samplingrate, thumbnails, title, width) {
        if (typeof link == 'undefined') link = null;
        if (typeof type == 'undefined') type = null;
        if (typeof length == 'undefined') length = null;
        if (typeof javascript == 'undefined') javascript = null;
        if (typeof bitrate == 'undefined') bitrate = null;
        if (typeof captions == 'undefined') captions = null;
        if (typeof categories == 'undefined') categories = null;
        if (typeof channels == 'undefined') channels = null;
        if (typeof copyright == 'undefined') copyright = null;
        if (typeof credits == 'undefined') credits = null;
        if (typeof description == 'undefined') description = null;
        if (typeof duration == 'undefined') duration = null;
        if (typeof expression == 'undefined') expression = null;
        if (typeof framerate == 'undefined') framerate = null;
        if (typeof hashes == 'undefined') hashes = null;
        if (typeof height == 'undefined') height = null;
        if (typeof keywords == 'undefined') keywords = null;
        if (typeof lang == 'undefined') lang = null;
        if (typeof medium == 'undefined') medium = null;
        if (typeof player == 'undefined') player = null;
        if (typeof ratings == 'undefined') ratings = null;
        if (typeof restrictions == 'undefined') restrictions = null;
        if (typeof samplingrate == 'undefined') samplingrate = null;
        if (typeof thumbnails == 'undefined') thumbnails = null;
        if (typeof title == 'undefined') title = null;
        if (typeof width == 'undefined') width = null;
        this.bitrate = bitrate;
        this.captions = captions;
        this.categories = categories;
        this.channels = channels;
        this.copyright = copyright;
        this.credits = credits;
        this.description = description;
        this.duration = duration;
        this.expression = expression;
        this.framerate = framerate;
        this.hashes = hashes;
        this.height = height;
        this.keywords = keywords;
        this.lang = lang;
        this.length = length;
        this.link = link;
        this.medium = medium;
        this.player = player;
        this.ratings = ratings;
        this.restrictions = restrictions;
        this.samplingrate = samplingrate;
        this.thumbnails = thumbnails;
        this.title = title;
        this.type = type;
        this.width = width;
        if (class_exists("idna_convert")) {
            var idn;
            idn = new idna_convert();
            var parsed;
            parsed = SimplePie_Misc.parse_url(link);
            this.link = SimplePie_Misc.compress_parse_url(parsed["scheme"], idn.encode(parsed["authority"]), parsed["path"], parsed["query"], parsed["fragment"]);
        }
        this.handler = this.get_handler();
        // Needs to load last
    };
    /**
     * String-ified version
     *
     * @return string
     */
    SimplePie_Enclosure.prototype.__toString = function() {
        // There is no $this->data here
        return md5(serialize(this));
    };
    /**
     * Get the bitrate
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_bitrate = function() {
        if (this.bitrate !== null) {
            return this.bitrate;
        } else {
            return null;
        }
    };
    /**
     * Get a single caption
     *
     * @param {int} key
     * @return SimplePie_Caption|null
     */
    SimplePie_Enclosure.prototype.get_caption = function(key) {
        if (typeof key == 'undefined') key = 0;
        var captions;
        captions = this.get_captions();
        if (isset(captions[key])) {
            return captions[key];
        } else {
            return null;
        }
    };
    /**
     * Get all captions
     *
     * @return array|null Array of {@see SimplePie_Caption} objects
     */
    SimplePie_Enclosure.prototype.get_captions = function() {
        if (this.captions !== null) {
            return this.captions;
        } else {
            return null;
        }
    };
    /**
     * Get a single category
     *
     * @param {int} key
     * @return SimplePie_Category|null
     */
    SimplePie_Enclosure.prototype.get_category = function(key) {
        if (typeof key == 'undefined') key = 0;
        var categories;
        categories = this.get_categories();
        if (isset(categories[key])) {
            return categories[key];
        } else {
            return null;
        }
    };
    /**
     * Get all categories
     *
     * @return array|null Array of {@see SimplePie_Category} objects
     */
    SimplePie_Enclosure.prototype.get_categories = function() {
        if (this.categories !== null) {
            return this.categories;
        } else {
            return null;
        }
    };
    /**
     * Get the number of audio channels
     *
     * @return int|null
     */
    SimplePie_Enclosure.prototype.get_channels = function() {
        if (this.channels !== null) {
            return this.channels;
        } else {
            return null;
        }
    };
    /**
     * Get the copyright information
     *
     * @return SimplePie_Copyright|null
     */
    SimplePie_Enclosure.prototype.get_copyright = function() {
        if (this.copyright !== null) {
            return this.copyright;
        } else {
            return null;
        }
    };
    /**
     * Get a single credit
     *
     * @param {int} key
     * @return SimplePie_Credit|null
     */
    SimplePie_Enclosure.prototype.get_credit = function(key) {
        if (typeof key == 'undefined') key = 0;
        var credits;
        credits = this.get_credits();
        if (isset(credits[key])) {
            return credits[key];
        } else {
            return null;
        }
    };
    /**
     * Get all credits
     *
     * @return array|null Array of {@see SimplePie_Credit} objects
     */
    SimplePie_Enclosure.prototype.get_credits = function() {
        if (this.credits !== null) {
            return this.credits;
        } else {
            return null;
        }
    };
    /**
     * Get the description of the enclosure
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_description = function() {
        if (this.description !== null) {
            return this.description;
        } else {
            return null;
        }
    };
    /**
     * Get the duration of the enclosure
     *
     * @param {string} convert Convert seconds into hh:mm:ss
     * @return string|int|null 'hh:mm:ss' string if `$convert` was specified, otherwise integer (or null if none found)
     */
    SimplePie_Enclosure.prototype.get_duration = function(convert) {
        if (typeof convert == 'undefined') convert = false;
        if (this.duration !== null) {
            if (convert) {
                var time;
                time = SimplePie_Misc.time_hms(this.duration);
                return time;
            } else {
                return this.duration;
            }
        } else {
            return null;
        }
    };
    /**
     * Get the expression
     *
     * @return string Probably one of 'sample', 'full', 'nonstop', 'clip'. Defaults to 'full'
     */
    SimplePie_Enclosure.prototype.get_expression = function() {
        if (this.expression !== null) {
            return this.expression;
        } else {
            return "full";
        }
    };
    /**
     * Get the file extension
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_extension = function() {
        if (this.link !== null) {
            var url;
            url = SimplePie_Misc.parse_url(this.link);
            if (url["path"] !== "") {
                return pathinfo(url["path"], PATHINFO_EXTENSION);
            }
        }
        return null;
    };
    /**
     * Get the framerate (in frames-per-second)
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_framerate = function() {
        if (this.framerate !== null) {
            return this.framerate;
        } else {
            return null;
        }
    };
    /**
     * Get the preferred handler
     *
     * @return string|null One of 'flash', 'fmedia', 'quicktime', 'wmedia', 'mp3'
     */
    SimplePie_Enclosure.prototype.get_handler = function() {
        return this.get_real_type(true);
    };
    /**
     * Get a single hash
     *
     * @link http://www.rssboard.org/media-rss#media-hash
     * @param {int} key
     * @return string|null Hash as per `media:hash`, prefixed with "$algo:"
     */
    SimplePie_Enclosure.prototype.get_hash = function(key) {
        if (typeof key == 'undefined') key = 0;
        var hashes;
        hashes = this.get_hashes();
        if (isset(hashes[key])) {
            return hashes[key];
        } else {
            return null;
        }
    };
    /**
     * Get all credits
     *
     * @return array|null Array of strings, see {@see get_hash()}
     */
    SimplePie_Enclosure.prototype.get_hashes = function() {
        if (this.hashes !== null) {
            return this.hashes;
        } else {
            return null;
        }
    };
    /**
     * Get the height
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_height = function() {
        if (this.height !== null) {
            return this.height;
        } else {
            return null;
        }
    };
    /**
     * Get the language
     *
     * @link http://tools.ietf.org/html/rfc3066
     * @return string|null Language code as per RFC 3066
     */
    SimplePie_Enclosure.prototype.get_language = function() {
        if (this.lang !== null) {
            return this.lang;
        } else {
            return null;
        }
    };
    /**
     * Get a single keyword
     *
     * @param {int} key
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_keyword = function(key) {
        if (typeof key == 'undefined') key = 0;
        var keywords;
        keywords = this.get_keywords();
        if (isset(keywords[key])) {
            return keywords[key];
        } else {
            return null;
        }
    };
    /**
     * Get all keywords
     *
     * @return array|null Array of strings
     */
    SimplePie_Enclosure.prototype.get_keywords = function() {
        if (this.keywords !== null) {
            return this.keywords;
        } else {
            return null;
        }
    };
    /**
     * Get length
     *
     * @return float Length in bytes
     */
    SimplePie_Enclosure.prototype.get_length = function() {
        if (this.length !== null) {
            return this.length;
        } else {
            return null;
        }
    };
    /**
     * Get the URL
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_link = function() {
        if (this.link !== null) {
            return urldecode(this.link);
        } else {
            return null;
        }
    };
    /**
     * Get the medium
     *
     * @link http://www.rssboard.org/media-rss#media-content
     * @return string|null Should be one of 'image', 'audio', 'video', 'document', 'executable'
     */
    SimplePie_Enclosure.prototype.get_medium = function() {
        if (this.medium !== null) {
            return this.medium;
        } else {
            return null;
        }
    };
    /**
     * Get the player URL
     *
     * Typically the same as {@see get_permalink()}
     * @return string|null Player URL
     */
    SimplePie_Enclosure.prototype.get_player = function() {
        if (this.player !== null) {
            return this.player;
        } else {
            return null;
        }
    };
    /**
     * Get a single rating
     *
     * @param {int} key
     * @return SimplePie_Rating|null
     */
    SimplePie_Enclosure.prototype.get_rating = function(key) {
        if (typeof key == 'undefined') key = 0;
        var ratings;
        ratings = this.get_ratings();
        if (isset(ratings[key])) {
            return ratings[key];
        } else {
            return null;
        }
    };
    /**
     * Get all ratings
     *
     * @return array|null Array of {@see SimplePie_Rating} objects
     */
    SimplePie_Enclosure.prototype.get_ratings = function() {
        if (this.ratings !== null) {
            return this.ratings;
        } else {
            return null;
        }
    };
    /**
     * Get a single restriction
     *
     * @param {int} key
     * @return SimplePie_Restriction|null
     */
    SimplePie_Enclosure.prototype.get_restriction = function(key) {
        if (typeof key == 'undefined') key = 0;
        var restrictions;
        restrictions = this.get_restrictions();
        if (isset(restrictions[key])) {
            return restrictions[key];
        } else {
            return null;
        }
    };
    /**
     * Get all restrictions
     *
     * @return array|null Array of {@see SimplePie_Restriction} objects
     */
    SimplePie_Enclosure.prototype.get_restrictions = function() {
        if (this.restrictions !== null) {
            return this.restrictions;
        } else {
            return null;
        }
    };
    /**
     * Get the sampling rate (in kHz)
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_sampling_rate = function() {
        if (this.samplingrate !== null) {
            return this.samplingrate;
        } else {
            return null;
        }
    };
    /**
     * Get the file size (in MiB)
     *
     * @return float|null File size in mebibytes (1048 bytes)
     */
    SimplePie_Enclosure.prototype.get_size = function() {
        var length;
        length = this.get_length();
        if (length !== null) {
            return round(length / 1048576, 2);
        } else {
            return null;
        }
    };
    /**
     * Get a single thumbnail
     *
     * @param {int} key
     * @return string|null Thumbnail URL
     */
    SimplePie_Enclosure.prototype.get_thumbnail = function(key) {
        if (typeof key == 'undefined') key = 0;
        var thumbnails;
        thumbnails = this.get_thumbnails();
        if (isset(thumbnails[key])) {
            return thumbnails[key];
        } else {
            return null;
        }
    };
    /**
     * Get all thumbnails
     *
     * @return array|null Array of thumbnail URLs
     */
    SimplePie_Enclosure.prototype.get_thumbnails = function() {
        if (this.thumbnails !== null) {
            return this.thumbnails;
        } else {
            return null;
        }
    };
    /**
     * Get the title
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_title = function() {
        if (this.title !== null) {
            return this.title;
        } else {
            return null;
        }
    };
    /**
     * Get mimetype of the enclosure
     *
     * @see get_real_type()
     * @return string|null MIME type
     */
    SimplePie_Enclosure.prototype.get_type = function() {
        if (this.type !== null) {
            return this.type;
        } else {
            return null;
        }
    };
    /**
     * Get the width
     *
     * @return string|null
     */
    SimplePie_Enclosure.prototype.get_width = function() {
        if (this.width !== null) {
            return this.width;
        } else {
            return null;
        }
    };
    /**
     * Embed the enclosure using `<embed>`
     *
     * @deprecated Use the second parameter to {@see embed} instead
     *
     * @param {array|string} options See first paramter to {@see embed}
     * @return string HTML string to output
     */
    SimplePie_Enclosure.prototype.native_embed = function(options) {
        if (typeof options == 'undefined') options = "";
        return this.embed(options, true);
    };
    /**
     * Embed the enclosure using Javascript
     *
     * `$options` is an array or comma-separated key:value string, with the
     * following properties:
     *
     * - `alt` (string): Alternate content for when an end-user does not have
     *    the appropriate handler installed or when a file type is
     *    unsupported. Can be any text or HTML. Defaults to blank.
     * - `altclass` (string): If a file type is unsupported, the end-user will
     *    see the alt text (above) linked directly to the content. That link
     *    will have this value as its class name. Defaults to blank.
     * - `audio` (string): This is an image that should be used as a
     *    placeholder for audio files before they're loaded (QuickTime-only).
     *    Can be any relative or absolute URL. Defaults to blank.
     * - `bgcolor` (string): The background color for the media, if not
     *    already transparent. Defaults to `#ffffff`.
     * - `height` (integer): The height of the embedded media. Accepts any
     *    numeric pixel value (such as `360`) or `auto`. Defaults to `auto`,
     *    and it is recommended that you use this default.
     * - `loop` (boolean): Do you want the media to loop when its done?
     *    Defaults to `false`.
     * - `mediaplayer` (string): The location of the included
     *    `mediaplayer.swf` file. This allows for the playback of Flash Video
     *    (`.flv`) files, and is the default handler for non-Odeo MP3's.
     *    Defaults to blank.
     * - `video` (string): This is an image that should be used as a
     *    placeholder for video files before they're loaded (QuickTime-only).
     *    Can be any relative or absolute URL. Defaults to blank.
     * - `width` (integer): The width of the embedded media. Accepts any
     *    numeric pixel value (such as `480`) or `auto`. Defaults to `auto`,
     *    and it is recommended that you use this default.
     * - `widescreen` (boolean): Is the enclosure widescreen or standard?
     *    This applies only to video enclosures, and will automatically resize
     *    the content appropriately.  Defaults to `false`, implying 4:3 mode.
     *
     * Note: Non-widescreen (4:3) mode with `width` and `height` set to `auto`
     * will default to 480x360 video resolution.  Widescreen (16:9) mode with
     * `width` and `height` set to `auto` will default to 480x270 video resolution.
     *
     * @todo If the dimensions for media:content are defined, use them when width/height are set to 'auto'.
     * @param {array|string} options Comma-separated key:value list, or array
     * @param {bool} native Use `<embed>`
     * @return string HTML string to output
     */
    SimplePie_Enclosure.prototype.embed = function(options, native) {
        if (typeof options == 'undefined') options = "";
        if (typeof native == 'undefined') native = false;
        // Set up defaults
        var audio;
        audio = "";
        var video;
        video = "";
        var alt;
        alt = "";
        var altclass;
        altclass = "";
        var loop;
        loop = "false";
        var width;
        width = "auto";
        var height;
        height = "auto";
        var bgcolor;
        bgcolor = "#ffffff";
        var mediaplayer;
        mediaplayer = "";
        var widescreen;
        widescreen = false;
        var handler;
        handler = this.get_handler();
        var type;
        type = this.get_real_type();
        // Process options and reassign values as necessary
        if (is_array(options)) {
            extract(options);
        } else {
            options = explode(",", options);
            var _key_;
            __loop1:
                for (_key_ in options) {
                    var option;
                    option = options[_key_];
                    var opt;
                    opt = explode(":", option, 2);
                    if (isset(opt[0], opt[1])) {
                        opt[0] = trim(opt[0]);
                        opt[1] = trim(opt[1]);
                        __loop2:
                            switch (opt[0]) {
                                case "audio":
                                    audio = opt[1];
                                    break;
                                case "video":
                                    video = opt[1];
                                    break;
                                case "alt":
                                    alt = opt[1];
                                    break;
                                case "altclass":
                                    altclass = opt[1];
                                    break;
                                case "loop":
                                    loop = opt[1];
                                    break;
                                case "width":
                                    width = opt[1];
                                    break;
                                case "height":
                                    height = opt[1];
                                    break;
                                case "bgcolor":
                                    bgcolor = opt[1];
                                    break;
                                case "mediaplayer":
                                    mediaplayer = opt[1];
                                    break;
                                case "widescreen":
                                    widescreen = opt[1];
                                    break;
                            }
                    }
                }
        }
        var mime;
        mime = explode("/", type, 2);
        mime = mime[0];
        // Process values for 'auto'
        if (width === "auto") {
            if (mime === "video") {
                if (height === "auto") {
                    width = 480;
                } else if (widescreen) {
                    width = round(intval(height) / 9 * 16);
                } else {
                    width = round(intval(height) / 3 * 4);
                }
            } else {
                width = "100%";
            }
        }
        if (height === "auto") {
            if (mime === "audio") {
                height = 0;
            } else if (mime === "video") {
                if (width === "auto") {
                    if (widescreen) {
                        height = 270;
                    } else {
                        height = 360;
                    }
                } else if (widescreen) {
                    height = round(intval(width) / 16 * 9);
                } else {
                    height = round(intval(width) / 4 * 3);
                }
            } else {
                height = 376;
            }
        } else if (mime === "audio") {
            height = 0;
        }
        // Set proper placeholder value
        if (mime === "audio") {
            var placeholder;
            placeholder = audio;
        } else if (mime === "video") {
            placeholder = video;
        }
        var embed;
        embed = "";
        // Flash
        if (handler === "flash") {
            if (native) {
                embed += "<embed src=\"" + this.get_link() + ""
                pluginspage = "http://adobe.com/go/getflashplayer"
                type = "" + type + ""
                quality = "high"
                width = "" + width + ""
                height = "" + height + ""
                bgcolor = "" + bgcolor + ""
                loop = "" + loop + "" > < /embed>";
            } else {
                embed += "<script type='text/javascript'>embed_flash('" + bgcolor + "', '" + width + "', '" + height + "', '"
                    .this.get_link().
                "', '" + loop + "', '" + type + "');</script>";
            }
        } else if (handler === "fmedia" || handler === "mp3" && mediaplayer !== "") {
            height += 20;
            if (native) {
                embed += "<embed src="
                "+mediaplayer+"
                " pluginspage="
                http: //adobe.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width=""+width+"" height=""+height+"" wmode="transparent" flashvars="file="
                    .rawurlencode(this.get_link() + "?file_extension=." + this.get_extension()).
                "&autostart=false&repeat=" + loop + "&showdigits=true&showfsbutton=false" > < /embed>";
            } else {
                embed += "<script type='text/javascript'>embed_flv('" + width + "', '" + height + "', '"
                    .rawurlencode(this.get_link() + "?file_extension=." + this.get_extension()).
                "', '" + placeholder + "', '" + loop + "', '" + mediaplayer + "');</script>";
            }
        } else if (handler === "quicktime" || handler === "mp3" && mediaplayer === "") {
            height += 16;
            if (native) {
                if (placeholder !== "") {
                    embed += "<embed type="
                    "+type+"
                    " style="
                    cursor: hand;
                    cursor: pointer;
                    " href="
                    "
                    .this.get_link().
                    ""
                    src = "" + placeholder + ""
                    width = "" + width + ""
                    height = "" + height + ""
                    autoplay = "false"
                    target = "myself"
                    controller = "false"
                    loop = "" + loop + ""
                    scale = "aspect"
                    bgcolor = "" + bgcolor + ""
                    pluginspage = "http://apple.com/quicktime/download/" > < /embed>";
                } else {
                    embed += "<embed type="
                    "+type+"
                    " style="
                    cursor: hand;
                    cursor: pointer;
                    " src="
                    "
                    .this.get_link().
                    ""
                    width = "" + width + ""
                    height = "" + height + ""
                    autoplay = "false"
                    target = "myself"
                    controller = "true"
                    loop = "" + loop + ""
                    scale = "aspect"
                    bgcolor = "" + bgcolor + ""
                    pluginspage = "http://apple.com/quicktime/download/" > < /embed>";
                }
            } else {
                embed += "<script type='text/javascript'>embed_quicktime('" + type + "', '" + bgcolor + "', '" + width + "', '" + height + "', '"
                    .this.get_link().
                "', '" + placeholder + "', '" + loop + "');</script>";
            }
        } else if (handler === "wmedia") {
            height += 45;
            if (native) {
                embed += "<embed type=\"application/x-mplayer2\" src=\"" + this.get_link() + ""
                autosize = "1"
                width = "" + width + ""
                height = "" + height + ""
                showcontrols = "1"
                showstatusbar = "0"
                showdisplay = "0"
                autostart = "0" > < /embed>";
            } else {
                embed += "<script type='text/javascript'>embed_wmedia('" + width + "', '" + height + "', '"
                    .this.get_link() + "');</script>";
            }
        } else {
            embed += "<a href=\"" + this.get_link() + "\" class=\"" + altclass + "\">" + alt + "</a>";
        }
        return embed;
    };
    /**
     * Get the real media type
     *
     * Often, feeds lie to us, necessitating a bit of deeper inspection. This
     * converts types to their canonical representations based on the file
     * extension
     *
     * @see get_type()
     * @param {bool} find_handler Internal use only, use {@see get_handler()} instead
     * @return string MIME type
     */
    SimplePie_Enclosure.prototype.get_real_type = function(find_handler) {
        if (typeof find_handler == 'undefined') find_handler = false;
        // Mime-types by handler.
        var types_flash;
        types_flash = {
            0: "application/x-shockwave-flash",
            1: "application/futuresplash"
        };
        // Flash
        var types_fmedia;
        types_fmedia = {
            0: "video/flv",
            1: "video/x-flv",
            2: "flv-application/octet-stream"
        };
        // Flash Media Player
        var types_quicktime;
        types_quicktime = {
            0: "audio/3gpp",
            1: "audio/3gpp2",
            2: "audio/aac",
            3: "audio/x-aac",
            4: "audio/aiff",
            5: "audio/x-aiff",
            6: "audio/mid",
            7: "audio/midi",
            8: "audio/x-midi",
            9: "audio/mp4",
            10: "audio/m4a",
            11: "audio/x-m4a",
            12: "audio/wav",
            13: "audio/x-wav",
            14: "video/3gpp",
            15: "video/3gpp2",
            16: "video/m4v",
            17: "video/x-m4v",
            18: "video/mp4",
            19: "video/mpeg",
            20: "video/x-mpeg",
            21: "video/quicktime",
            22: "video/sd-video"
        };
        // QuickTime
        var types_wmedia;
        types_wmedia = {
            0: "application/asx",
            1: "application/x-mplayer2",
            2: "audio/x-ms-wma",
            3: "audio/x-ms-wax",
            4: "video/x-ms-asf-plugin",
            5: "video/x-ms-asf",
            6: "video/x-ms-wm",
            7: "video/x-ms-wmv",
            8: "video/x-ms-wvx"
        };
        // Windows Media
        var types_mp3;
        types_mp3 = {
            0: "audio/mp3",
            1: "audio/x-mp3",
            2: "audio/mpeg",
            3: "audio/x-mpeg"
        };
        // MP3
        if (this.get_type() !== null) {
            var type;
            type = strtolower(this.type);
        } else {
            type = null;
        }
        // If we encounter an unsupported mime-type, check the file extension and guess intelligently.
        if (!in_array(type, array_merge(types_flash, types_fmedia, types_quicktime, types_wmedia, types_mp3))) {
            __loop1: switch (strtolower(this.get_extension())) {
                // Audio mime-types
                case "aac":
                case "adts":
                    type = "audio/acc";
                    break;
                case "aif":
                case "aifc":
                case "aiff":
                case "cdda":
                    type = "audio/aiff";
                    break;
                case "bwf":
                    type = "audio/wav";
                    break;
                case "kar":
                case "mid":
                case "midi":
                case "smf":
                    type = "audio/midi";
                    break;
                case "m4a":
                    type = "audio/x-m4a";
                    break;
                case "mp3":
                case "swa":
                    type = "audio/mp3";
                    break;
                case "wav":
                    type = "audio/wav";
                    break;
                case "wax":
                    type = "audio/x-ms-wax";
                    break;
                case "wma":
                    type = "audio/x-ms-wma";
                    break;
                    // Video mime-types
                    // Video mime-types
                case "3gp":
                case "3gpp":
                    type = "video/3gpp";
                    break;
                case "3g2":
                case "3gp2":
                    type = "video/3gpp2";
                    break;
                case "asf":
                    type = "video/x-ms-asf";
                    break;
                case "flv":
                    type = "video/x-flv";
                    break;
                case "m1a":
                case "m1s":
                case "m1v":
                case "m15":
                case "m75":
                case "mp2":
                case "mpa":
                case "mpeg":
                case "mpg":
                case "mpm":
                case "mpv":
                    type = "video/mpeg";
                    break;
                case "m4v":
                    type = "video/x-m4v";
                    break;
                case "mov":
                case "qt":
                    type = "video/quicktime";
                    break;
                case "mp4":
                case "mpg4":
                    type = "video/mp4";
                    break;
                case "sdv":
                    type = "video/sd-video";
                    break;
                case "wm":
                    type = "video/x-ms-wm";
                    break;
                case "wmv":
                    type = "video/x-ms-wmv";
                    break;
                case "wvx":
                    type = "video/x-ms-wvx";
                    break;
                    // Flash mime-types
                    // Flash mime-types
                case "spl":
                    type = "application/futuresplash";
                    break;
                case "swf":
                    type = "application/x-shockwave-flash";
                    break;
            }
        }
        if (find_handler) {
            if (in_array(type, types_flash)) {
                return "flash";
            } else if (in_array(type, types_fmedia)) {
                return "fmedia";
            } else if (in_array(type, types_quicktime)) {
                return "quicktime";
            } else if (in_array(type, types_wmedia)) {
                return "wmedia";
            } else if (in_array(type, types_mp3)) {
                return "mp3";
            } else {
                return null;
            }
        } else {
            return type;
        }
    };
    SimplePie_Enclosure.class = 'SimplePie_Enclosure';
    return SimplePie_Enclosure;
})();
