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
 * Manages `<media:copyright>` copyright tags as defined in Media RSS
 *
 * Used by {@see SimplePie_Enclosure::get_copyright()}
 *
 * This class can be overloaded with {@see SimplePie::set_copyright_class()}
 *
 * @package SimplePie
 * @subpackage API
 */
var SimplePie_Copyright = (function() {
    function SimplePie_Copyright(url, label) {
        var __isInheritance = __IS_INHERITANCE__;
        window.__IS_INHERITANCE__ = false;
        /**
         * Copyright URL
         *
         * @type {string}
         * @see get_url()
         */
        this.url = null;
        /**
         * Attribution
         *
         * @type {string}
         * @see get_attribution()
         */
        this.label = null;
        if (__isInheritance == false) {
            this.__construct(url, label);
        }
    }
    /**
     * Constructor, used to input the data
     *
     * For documentation on all the parameters, see the corresponding
     * properties and their accessors
     */
    SimplePie_Copyright.prototype.__construct = function(url, label) {
        if (typeof url == 'undefined') url = null;
        if (typeof label == 'undefined') label = null;
        this.url = url;
        this.label = label;
    };
    /**
     * String-ified version
     *
     * @return string
     */
    SimplePie_Copyright.prototype.__toString = function() {
        // There is no $this->data here
        return md5(serialize(this));
    };
    /**
     * Get the copyright URL
     *
     * @return string|null URL to copyright information
     */
    SimplePie_Copyright.prototype.get_url = function() {
        if (this.url !== null) {
            return this.url;
        } else {
            return null;
        }
    };
    /**
     * Get the attribution text
     *
     * @return string|null
     */
    SimplePie_Copyright.prototype.get_attribution = function() {
        if (this.label !== null) {
            return this.label;
        } else {
            return null;
        }
    };
    SimplePie_Copyright.class = 'SimplePie_Copyright';
    return SimplePie_Copyright;
})();
