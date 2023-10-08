//not implemented  include and require
/**
 * Customize API: WP_Customize_Selective_Refresh class
 *
 * @package WordPress
 * @subpackage Customize
 * @since 4.5.0
 */
/**
 * Core Customizer class for implementing selective refresh.
 *
 * @since 4.5.0
 */
var WP_Customize_Selective_Refresh = (function() {
            function WP_Customize_Selective_Refresh(manager) {
                var __isInheritance = __IS_INHERITANCE__;
                window.__IS_INHERITANCE__ = false;
                /**
                 * Customize manager.
                 *
                 * @since 4.5.0
                 * @type {WP_Customize_Manager}
                 */
                this.manager = null;
                /**
                 * Registered instances of WP_Customize_Partial.
                 *
                 * @since 4.5.0
                 * @type {WP_Customize_Partial}[]
                 */
                this.partials = {};
                /**
                 * Log of errors triggered when partials are rendered.
                 *
                 * @since 4.5.0
                 * @type {array}
                 */
                this.triggered_errors = {};
                /**
                 * Keep track of the current partial being rendered.
                 *
                 * @since 4.5.0
                 * @type {string}
                 */
                this.current_partial_id = null;
                if (__isInheritance == false) {
                    this.__construct(manager);
                }
            }
            WP_Customize_Selective_Refresh.RENDER_QUERY_VAR = "wp_customize_render_partials";
            /**
             * Plugin bootstrap for Partial Refresh functionality.
             *
             * @since 4.5.0
             *
             * @param {WP_Customize_Manager} manager Manager instance.
             */
            WP_Customize_Selective_Refresh.prototype.__construct = function(manager) {
                if (!manager instanceof WP_Customize_Manager) throw new Error('bad param type');
                this.manager = manager;
                eval(require_once("ABSPATH . WPINC+" / customize / class - wp - customize - partial.php.js ")); add_action("customize_preview_init", {
                            0: this,
                            1: "init_preview"
                        });
                    };
                    /**
                     * Retrieves the registered partials.
                     *
                     * @since 4.5.0
                     *
                     * @return array Partials.
                     */
                    WP_Customize_Selective_Refresh.prototype.partials = function() {
                        return this.partials;
                    };
                    /**
                     * Adds a partial.
                     *
                     * @since 4.5.0
                     *
                     * @param {WP_Customize_Partial|string} id   Customize Partial object, or Panel ID.
                     * @param {array}                       $args {
                     *  Optional. Array of properties for the new Partials object. Default empty array.
                     *
                     *  @type string   $type                  Type of the partial to be created.
                     *  @type string   $selector              The jQuery selector to find the container element for the partial, that is, a partial's placement.
                     *  @type array    $settings              IDs for settings tied to the partial.
                     *  @type string   $primary_setting       The ID for the setting that this partial is primarily responsible for
                     *                                        rendering. If not supplied, it will default to the ID of the first setting.
                     *  @type string   $capability            Capability required to edit this partial.
                     *                                        Normally this is empty and the capability is derived from the capabilities
                     *                                        of the associated `$settings`.
                     *  @type callable $render_callback       Render callback.
                     *                                        Callback is called with one argument, the instance of WP_Customize_Partial.
                     *                                        The callback can either echo the partial or return the partial as a string,
                     *                                        or return false if error.
                     *  @type bool     $container_inclusive   Whether the container element is included in the partial, or if only
                     *                                        the contents are rendered.
                     *  @type bool     $fallback_refresh      Whether to refresh the entire preview in case a partial cannot be refreshed.
                     *                                        A partial render is considered a failure if the render_callback returns
                     *                                        false.
                     * }
                     * @return WP_Customize_Partial             The instance of the panel that was added.
                     */
                    WP_Customize_Selective_Refresh.prototype.add_partial = function(id, args) {
                        if (typeof args == 'undefined') args = {};
                        if (id instanceof WP_Customize_Partial) {
                            var partial;
                            partial = id;
                        } else {
                            var class;
                            class = "WP_Customize_Partial";
                            /** This filter is documented in wp-includes/customize/class-wp-customize-selective-refresh.php */
                            args = apply_filters("customize_dynamic_partial_args", args, id);
                            /** This filter is documented in wp-includes/customize/class-wp-customize-selective-refresh.php */
                            class = apply_filters("customize_dynamic_partial_class", class, id, args);
                            partial = new(N._GET_(class))(this, id, args);
                        }
                        this.partials[partial.id] = partial;
                        return partial;
                    };
                    /**
                     * Retrieves a partial.
                     *
                     * @since 4.5.0
                     *
                     * @param {string} id Customize Partial ID.
                     * @return WP_Customize_Partial|null The partial, if set. Otherwise null.
                     */
                    WP_Customize_Selective_Refresh.prototype.get_partial = function(id) {
                        if (isset(this.partials[id])) {
                            return this.partials[id];
                        } else {
                            return null;
                        }
                    };
                    /**
                     * Removes a partial.
                     *
                     * @since 4.5.0
                     *
                     * @param {string} id Customize Partial ID.
                     */
                    WP_Customize_Selective_Refresh.prototype.remove_partial = function(id) {
                        delete this.partials[id];
                    };
                    /**
                     * Initializes the Customizer preview.
                     *
                     * @since 4.5.0
                     */
                    WP_Customize_Selective_Refresh.prototype.init_preview = function() {
                        add_action("template_redirect", {
                            0: this,
                            1: "handle_render_partials_request"
                        });
                        add_action("wp_enqueue_scripts", {
                            0: this,
                            1: "enqueue_preview_scripts"
                        });
                    };
                    /**
                     * Enqueues preview scripts.
                     *
                     * @since 4.5.0
                     */
                    WP_Customize_Selective_Refresh.prototype.enqueue_preview_scripts = function() {
                        wp_enqueue_script("customize-selective-refresh");
                        add_action("wp_footer", {
                            0: this,
                            1: "export_preview_data"
                        }, 1000);
                    };
                    /**
                     * Exports data in preview after it has finished rendering so that partials can be added at runtime.
                     *
                     * @since 4.5.0
                     */
                    WP_Customize_Selective_Refresh.prototype.export_preview_data = function() {
                        var partials;
                        partials = {};
                        var _key_;
                        __loop1:
                            for (_key_ in this.partials()) {
                                var partial;
                                partial = this.partials()[_key_];
                                if (partial.check_capabilities()) {
                                    partials[partial.id] = partial.json();
                                }
                            }
                        var switched_locale;
                        switched_locale = switch_to_locale(get_user_locale());
                        var l10n;
                        l10n = {
                            "shiftClickToEdit": __("Shift-click to edit this element."),
                            "clickEditMenu": __("Click to edit this menu."),
                            "clickEditWidget": __("Click to edit this widget."),
                            "clickEditTitle": __("Click to edit the site title."),
                            "clickEditMisc": __("Click to edit this element."),
                            "badDocumentWrite": sprintf(__("%s is forbidden"), "document.write()")
                        };
                        if (switched_locale) {
                            restore_previous_locale();
                        }
                        var exports;
                        exports = {
                            "partials": partials,
                            "renderQueryVar": WP_Customize_Selective_Refresh.RENDER_QUERY_VAR,
                            "l10n": l10n
                        };
                        // Export data to JS.
                        console.log(sprintf("<script>var _customizePartialRefreshExports = %s;</script>", wp_json_encode(exports)));
                    };
                    /**
                     * Registers dynamically-created partials.
                     *
                     * @since 4.5.0
                     *
                     * @see WP_Customize_Manager::add_dynamic_settings()
                     *
                     * @param {string}[] $partial_ids Array of the partial IDs to add.
                     * @return WP_Customize_Partial[] Array of added WP_Customize_Partial instances.
                     */
                    WP_Customize_Selective_Refresh.prototype.add_dynamic_partials = function(partial_ids) {
                        var new_partials;
                        new_partials = {};
                        var _key_;
                        __loop1:
                            for (_key_ in partial_ids) {
                                var partial_id;
                                partial_id = partial_ids[_key_];
                                // Skip partials already created.
                                var partial;
                                partial = this.get_partial(partial_id);
                                if (partial) {
                                    continue;
                                }
                                var partial_args;
                                partial_args = false;
                                var partial_class;
                                partial_class = "WP_Customize_Partial";
                                /**
                                 * Filters a dynamic partial's constructor arguments.
                                 *
                                 * For a dynamic partial to be registered, this filter must be employed
                                 * to override the default false value with an array of args to pass to
                                 * the WP_Customize_Partial constructor.
                                 *
                                 * @since 4.5.0
                                 *
                                 * @param {false|array} partial_args The arguments to the WP_Customize_Partial constructor.
                                 * @param {string}      $partial_id   ID for dynamic partial.
                                 */
                                partial_args = apply_filters("customize_dynamic_partial_args", partial_args, partial_id);
                                if (false === partial_args) {
                                    continue;
                                }
                                /**
                                 * Filters the class used to construct partials.
                                 *
                                 * Allow non-statically created partials to be constructed with custom WP_Customize_Partial subclass.
                                 *
                                 * @since 4.5.0
                                 *
                                 * @param {string} partial_class WP_Customize_Partial or a subclass.
                                 * @param {string} partial_id    ID for dynamic partial.
                                 * @param {array}  $partial_args  The arguments to the WP_Customize_Partial constructor.
                                 */
                                partial_class = apply_filters("customize_dynamic_partial_class", partial_class, partial_id, partial_args);
                                partial = new(N._GET_(partial_class))(this, partial_id, partial_args);
                                this.add_partial(partial);
                                new_partials[] = partial;
                            }
                        return new_partials;
                    };
                    /**
                     * Checks whether the request is for rendering partials.
                     *
                     * Note that this will not consider whether the request is authorized or valid,
                     * just that essentially the route is a match.
                     *
                     * @since 4.5.0
                     *
                     * @return bool Whether the request is for rendering partials.
                     */
                    WP_Customize_Selective_Refresh.prototype.is_render_partials_request = function() {
                        var _POST;
                        return !empty(_POST[WP_Customize_Selective_Refresh.RENDER_QUERY_VAR]);
                    };
                    /**
                     * Handles PHP errors triggered during rendering the partials.
                     *
                     * These errors will be relayed back to the client in the Ajax response.
                     *
                     * @since 4.5.0
                     *
                     * @param {int}    $errno   Error number.
                     * @param {string} errstr  Error string.
                     * @param {string} errfile Error file.
                     * @param {string} errline Error line.
                     * @return true Always true.
                     */
                    WP_Customize_Selective_Refresh.prototype.handle_error = function(errno, errstr, errfile, errline) {
                        if (typeof errfile == 'undefined') errfile = null;
                        if (typeof errline == 'undefined') errline = null;
                        this.triggered_errors[] = {
                            "partial": this.current_partial_id,
                            "error_number": errno,
                            "error_string": errstr,
                            "error_file": errfile,
                            "error_line": errline
                        };
                        return true;
                    };
                    /**
                     * Handles the Ajax request to return the rendered partials for the requested placements.
                     *
                     * @since 4.5.0
                     */
                    WP_Customize_Selective_Refresh.prototype.handle_render_partials_request = function() {
                        if (!this.is_render_partials_request()) {
                            return;
                        }
                        /*
                         * Note that is_customize_preview() returning true will entail that the
                         * user passed the 'customize' capability check and the nonce check, since
                         * WP_Customize_Manager::setup_theme() is where the previewing flag is set.
                         */
                        if (!is_customize_preview()) {
                            wp_send_json_error("expected_customize_preview", 403);
                        } else if (!isset(_POST["partials"])) {
                            var _POST;
                            wp_send_json_error("missing_partials", 400);
                        }
                        // Ensure that doing selective refresh on 404 template doesn't result in fallback rendering behavior (full refreshes).
                        status_header(200);
                        var partials;
                        partials = json_decode(wp_unslash(_POST["partials"]), true);
                        if (!is_array(partials)) {
                            wp_send_json_error("malformed_partials");
                        }
                        this.add_dynamic_partials(array_keys(partials));
                        /**
                         * Fires immediately before partials are rendered.
                         *
                         * Plugins may do things like call wp_enqueue_scripts() and gather a list of the scripts
                         * and styles which may get enqueued in the response.
                         *
                         * @since 4.5.0
                         *
                         * @param {WP_Customize_Selective_Refresh} this     Selective refresh component.
                         * @param {array}                          $partials Placements' context data for the partials rendered in the request.
                         *                                                 The array is keyed by partial ID, with each item being an array of
                         *                                                 the placements' context data.
                         */
                        do_action("customize_render_partials_before", this, partials);
                        set_error_handler({
                            0: this,
                            1: "handle_error"
                        }, error_reporting());
                        var contents;
                        contents = {};
                        var partial_id;
                        __loop1:
                            for (partial_id in partials) {
                                var container_contexts;
                                container_contexts = partials[partial_id];
                                this.current_partial_id = partial_id;
                                if (!is_array(container_contexts)) {
                                    wp_send_json_error("malformed_container_contexts");
                                }
                                var partial;
                                partial = this.get_partial(partial_id);
                                if (!partial || !partial.check_capabilities()) {
                                    contents[partial_id] = null;
                                    continue;
                                }
                                contents[partial_id] = {};
                                // @todo The array should include not only the contents, but also whether the container is included?
                                if (empty(container_contexts)) {
                                    // Since there are no container contexts, render just once.
                                    contents[partial_id][] = partial.render(null);
                                } else {
                                    var _key_;
                                    __loop2:
                                        for (_key_ in container_contexts) {
                                            var container_context;
                                            container_context = container_contexts[_key_];
                                            contents[partial_id][] = partial.render(container_context);
                                        }
                                }
                            }
                        this.current_partial_id = null;
                        restore_error_handler();
                        /**
                         * Fires immediately after partials are rendered.
                         *
                         * Plugins may do things like call wp_footer() to scrape scripts output and return them
                         * via the {@see 'customize_render_partials_response'} filter.
                         *
                         * @since 4.5.0
                         *
                         * @param {WP_Customize_Selective_Refresh} this     Selective refresh component.
                         * @param {array}                          $partials Placements' context data for the partials rendered in the request.
                         *                                                 The array is keyed by partial ID, with each item being an array of
                         *                                                 the placements' context data.
                         */
                        do_action("customize_render_partials_after", this, partials);
                        var response;
                        response = {
                            "contents": contents
                        };
                        if (defined("WP_DEBUG_DISPLAY") && WP_DEBUG_DISPLAY) {
                            response["errors"] = this.triggered_errors;
                        }
                        var setting_validities;
                        setting_validities = this.manager.validate_setting_values(this.manager.unsanitized_post_values());
                        var exported_setting_validities;
                        exported_setting_validities = array_map({
                            0: this.manager,
                            1: "prepare_setting_validity_for_js"
                        }, setting_validities);
                        response["setting_validities"] = exported_setting_validities;
                        /**
                         * Filters the response from rendering the partials.
                         *
                         * Plugins may use this filter to inject `$scripts` and `$styles`, which are dependencies
                         * for the partials being rendered. The response data will be available to the client via
                         * the `render-partials-response` JS event, so the client can then inject the scripts and
                         * styles into the DOM if they have not already been enqueued there.
                         *
                         * If plugins do this, they'll need to take care for any scripts that do `document.write()`
                         * and make sure that these are not injected, or else to override the function to no-op,
                         * or else the page will be destroyed.
                         *
                         * Plugins should be aware that `$scripts` and `$styles` may eventually be included by
                         * default in the response.
                         *
                         * @since 4.5.0
                         *
                         * @param {array} response {
                         *     Response.
                         *
                         *     @type array $contents Associative array mapping a partial ID its corresponding array of contents
                         *                           for the containers requested.
                         *     @type array $errors   List of errors triggered during rendering of partials, if `WP_DEBUG_DISPLAY`
                         *                           is enabled.
                         * }
                         * @param {WP_Customize_Selective_Refresh} this     Selective refresh component.
                         * @param {array}                          $partials Placements' context data for the partials rendered in the request.
                         *                                                 The array is keyed by partial ID, with each item being an array of
                         *                                                 the placements' context data.
                         */
                        response = apply_filters("customize_render_partials_response", response, this, partials);
                        wp_send_json_success(response);
                    }; WP_Customize_Selective_Refresh.class = 'WP_Customize_Selective_Refresh';
                    return WP_Customize_Selective_Refresh;
                })();
