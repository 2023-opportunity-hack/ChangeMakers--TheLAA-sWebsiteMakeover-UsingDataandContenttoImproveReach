//not implemented  include and require
//not implemented  include and require
//not implemented  include and require
//not implemented phptojs\JsPrinter\JsPrinter::pScalar_MagicConst_File
//not implemented phptojs\JsPrinter\JsPrinter::pScalar_MagicConst_Dir
/**
 * Backend functions.
 *
 * @package Yoast.WP.Duplicate_Post
 * @since   2.0
 */
if (!is_admin()) {
    return;
}
var Newsletter = N.Yoast.WP.Duplicate_Post.UI.Newsletter;
eval(require_once("UPLICATE_POST_PATH+"
            options.php.js ")); eval(require_once("UPLICATE_POST_PATH+"
                    compat / wpml - functions.php.js ")); eval(require_once("UPLICATE_POST_PATH+"
                            compat / jetpack - functions.php.js "));
                            /**
                             * Wrapper for the option 'duplicate_post_version'.
                             */
                            function duplicate_post_get_installed_version() {
                                return get_option("duplicate_post_version");
                            }
                            /**
                             * Wrapper for the defined constant DUPLICATE_POST_CURRENT_VERSION.
                             */
                            function duplicate_post_get_current_version() {
                                return DUPLICATE_POST_CURRENT_VERSION;
                            }
                            add_action("admin_init", "duplicate_post_admin_init");
                            /**
                             * Adds handlers depending on the options.
                             */
                            function duplicate_post_admin_init() {
                                duplicate_post_plugin_upgrade();
                                if (intval(get_site_option("duplicate_post_show_notice")) === 1) {
                                    if (is_multisite()) {
                                        add_action("network_admin_notices", "duplicate_post_show_update_notice");
                                    } else {
                                        add_action("admin_notices", "duplicate_post_show_update_notice");
                                    }
                                    add_action("wp_ajax_duplicate_post_dismiss_notice", "duplicate_post_dismiss_notice");
                                }
                                add_action("dp_duplicate_post", "duplicate_post_copy_post_meta_info", 10, 2);
                                add_action("dp_duplicate_page", "duplicate_post_copy_post_meta_info", 10, 2);
                                if (intval(get_option("duplicate_post_copychildren")) === 1) {
                                    add_action("dp_duplicate_post", "duplicate_post_copy_children", 20, 3);
                                    add_action("dp_duplicate_page", "duplicate_post_copy_children", 20, 3);
                                }
                                if (intval(get_option("duplicate_post_copyattachments")) === 1) {
                                    add_action("dp_duplicate_post", "duplicate_post_copy_attachments", 30, 2);
                                    add_action("dp_duplicate_page", "duplicate_post_copy_attachments", 30, 2);
                                }
                                if (intval(get_option("duplicate_post_copycomments")) === 1) {
                                    add_action("dp_duplicate_post", "duplicate_post_copy_comments", 40, 2);
                                    add_action("dp_duplicate_page", "duplicate_post_copy_comments", 40, 2);
                                }
                                add_action("dp_duplicate_post", "duplicate_post_copy_post_taxonomies", 50, 2);
                                add_action("dp_duplicate_page", "duplicate_post_copy_post_taxonomies", 50, 2);
                                add_filter("plugin_row_meta", "duplicate_post_add_plugin_links", 10, 2);
                            }
                            /**
                             * Plugin upgrade.
                             */
                            function duplicate_post_plugin_upgrade() {
                                var installed_version;
                                installed_version = duplicate_post_get_installed_version();
                                if (duplicate_post_get_current_version() === installed_version) {
                                    return;
                                }
                                if (empty(installed_version)) {
                                    // Get default roles.
                                    var default_roles;
                                    default_roles = {
                                        0: "editor",
                                        1: "administrator",
                                        2: "wpseo_manager",
                                        3: "wpseo_editor"
                                    };
                                    var _key_;
                                    __loop1:
                                        for (_key_ in default_roles) {
                                            var name;
                                            name = default_roles[_key_];
                                            var role;
                                            role = get_role(name);
                                            if (!empty(role)) {
                                                role.add_cap("copy_posts");
                                            }
                                        }
                                    add_option("duplicate_post_show_notice", 1);
                                } else {
                                    update_option("duplicate_post_show_notice", 0);
                                }
                                var show_links_in_defaults;
                                show_links_in_defaults = {
                                    "row": "1",
                                    "adminbar": "1",
                                    "submitbox": "1",
                                    "bulkactions": "1"
                                };
                                add_option("duplicate_post_copytitle", "1");
                                add_option("duplicate_post_copydate", "0");
                                add_option("duplicate_post_copystatus", "0");
                                add_option("duplicate_post_copyslug", "0");
                                add_option("duplicate_post_copyexcerpt", "1");
                                add_option("duplicate_post_copycontent", "1");
                                add_option("duplicate_post_copythumbnail", "1");
                                add_option("duplicate_post_copytemplate", "1");
                                add_option("duplicate_post_copyformat", "1");
                                add_option("duplicate_post_copyauthor", "0");
                                add_option("duplicate_post_copypassword", "0");
                                add_option("duplicate_post_copyattachments", "0");
                                add_option("duplicate_post_copychildren", "0");
                                add_option("duplicate_post_copycomments", "0");
                                add_option("duplicate_post_copymenuorder", "1");
                                add_option("duplicate_post_taxonomies_blacklist", {});
                                add_option("duplicate_post_blacklist", "");
                                add_option("duplicate_post_types_enabled", {
                                    0: "post",
                                    1: "page"
                                });
                                add_option("duplicate_post_show_original_column", "0");
                                add_option("duplicate_post_show_original_in_post_states", "0");
                                add_option("duplicate_post_show_original_meta_box", "0");
                                add_option("duplicate_post_show_link", {
                                    "new_draft": "1",
                                    "clone": "1",
                                    "rewrite_republish": "1"
                                });
                                add_option("duplicate_post_show_link_in", show_links_in_defaults);
                                var taxonomies_blacklist;
                                taxonomies_blacklist = get_option("duplicate_post_taxonomies_blacklist");
                                if (taxonomies_blacklist === "") {
                                    taxonomies_blacklist = {};
                                }
                                if (in_array("post_format", taxonomies_blacklist, true)) {
                                    update_option("duplicate_post_copyformat", 0);
                                    taxonomies_blacklist = array_diff(taxonomies_blacklist, {
                                        0: "post_format"
                                    });
                                    update_option("duplicate_post_taxonomies_blacklist", taxonomies_blacklist);
                                }
                                var meta_blacklist;
                                meta_blacklist = explode(",", get_option("duplicate_post_blacklist"));
                                if (meta_blacklist === "") {
                                    meta_blacklist = {};
                                }
                                meta_blacklist = array_map("trim", meta_blacklist);
                                if (in_array("_wp_page_template", meta_blacklist, true)) {
                                    update_option("duplicate_post_copytemplate", 0);
                                    meta_blacklist = array_diff(meta_blacklist, {
                                        0: "_wp_page_template"
                                    });
                                }
                                if (in_array("_thumbnail_id", meta_blacklist, true)) {
                                    update_option("duplicate_post_copythumbnail", 0);
                                    meta_blacklist = array_diff(meta_blacklist, {
                                        0: "_thumbnail_id"
                                    });
                                }
                                update_option("duplicate_post_blacklist", implode(",", meta_blacklist));
                                if (version_compare(installed_version, "4.0.0") < 0) {
                                    // Migrate the 'Show links in' options to the new array-based structure.
                                    duplicate_post_migrate_show_links_in_options(show_links_in_defaults);
                                }
                                delete_site_option("duplicate_post_version");
                                update_option("duplicate_post_version", duplicate_post_get_current_version());
                            }
                            /**
                             * Runs the upgrade routine for version 4.0 to update the options in the database.
                             *
                             * @param {array} defaults The default options to fall back on.
                             *
                             * @return void
                             */
                            function duplicate_post_migrate_show_links_in_options(defaults) {
                                var options_to_migrate;
                                options_to_migrate = {
                                    "duplicate_post_show_row": "row",
                                    "duplicate_post_show_adminbar": "adminbar",
                                    "duplicate_post_show_submitbox": "submitbox",
                                    "duplicate_post_show_bulkactions": "bulkactions"
                                };
                                var new_options;
                                new_options = {};
                                var old;
                                __loop1:
                                    for (old in options_to_migrate) {
                                        var new;
                                        new = options_to_migrate[old];
                                        new_options[new] = get_option(old, defaults[new]);
                                        delete_option(old);
                                    }
                                update_option("duplicate_post_show_link_in", new_options);
                            }
                            /**
                             * Shows the welcome notice.
                             *
                             * @global string $wp_version The WordPress version string.
                             */
                            function duplicate_post_show_update_notice() {
                                if (!current_user_can("manage_options")) {
                                    return;
                                }
                                var current_screen;
                                current_screen = get_current_screen();
                                if (empty(current_screen) || empty(current_screen.base) || current_screen.base !== "dashboard" && current_screen.base !== "plugins") {
                                    return;
                                }
                                var title;
                                title = sprintf(esc_html__("You've successfully installed %s!", "duplicate-post"), "Yoast Duplicate Post");
                                var img_path;
                                img_path = plugins_url("/duplicate_post_yoast_icon-125x125.png", );
                                console.log("<div id=\"duplicate-post-notice\" class=\"notice is-dismissible\" style=\"display: flex; align-items: flex-start;\">\n\
			<img src=\"" + esc_url(img_path) + "\" alt=\"\" style=\"margin: 1em 1em 1em 0; width: 130px; align-self: center;\"/>\n\
			<div stle=\"margin: 0.5em\">\n\
				<h1 style=\"font-size: 14px; color: #a4286a; font-weight: 600; margin-top: 8px;\">" + title + "</h1>" + Newsletter.newsletter_signup_form() + "</div>\n\
		</div>");
                                console.log("<script>\n\
			function duplicate_post_dismiss_notice(){\n\
				var data = {\n\
				'action': 'duplicate_post_dismiss_notice',\n\
				};\n\
\n\
				jQuery.post(ajaxurl, data, function(response) {\n\
					jQuery('#duplicate-post-notice').hide();\n\
				});\n\
			}\n\
\n\
			jQuery(document).ready(function(){\n\
				jQuery('body').on('click', '.notice-dismiss', function(){\n\
					duplicate_post_dismiss_notice();\n\
				});\n\
			});\n\
			</script>");
                            }
                            /**
                             * Dismisses the notice.
                             *
                             * @return bool
                             */
                            function duplicate_post_dismiss_notice() {
                                return update_site_option("duplicate_post_show_notice", 0);
                            }
                            /**
                             * Copies the taxonomies of a post to another post.
                             *
                             * @global wpdb $wpdb WordPress database abstraction object.
                             *
                             * @param {int}     $new_id New post ID.
                             * @param {WP_Post} post   The original post object.
                             */
                            function duplicate_post_copy_post_taxonomies(new_id, post) {
                                if (isset(wpdb.terms)) {
                                    // Clear default category (added by wp_insert_post).
                                    wp_set_object_terms(new_id, null, "category");
                                    var post_taxonomies;
                                    post_taxonomies = get_object_taxonomies(post.post_type);
                                    // Several plugins just add support to post-formats but don't register post_format taxonomy.
                                    if (post_type_supports(post.post_type, "post-formats") && !in_array("post_format", post_taxonomies, true)) {
                                        post_taxonomies[] = "post_format";
                                    }
                                    var taxonomies_blacklist;
                                    taxonomies_blacklist = get_option("duplicate_post_taxonomies_blacklist");
                                    if (taxonomies_blacklist === "") {
                                        taxonomies_blacklist = {};
                                    }
                                    if (intval(get_option("duplicate_post_copyformat")) === 0) {
                                        taxonomies_blacklist[] = "post_format";
                                    }
                                    /**
                                     * Filters the taxonomy excludelist when copying a post.
                                     *
                                     * @param {array} taxonomies_blacklist The taxonomy excludelist from the options.
                                     *
                                     * @return array
                                     */
                                    taxonomies_blacklist = apply_filters("duplicate_post_taxonomies_excludelist_filter", taxonomies_blacklist);
                                    var taxonomies;
                                    taxonomies = array_diff(post_taxonomies, taxonomies_blacklist);
                                    var _key_;
                                    __loop1:
                                        for (_key_ in taxonomies) {
                                            var taxonomy;
                                            taxonomy = taxonomies[_key_];
                                            var post_terms;
                                            post_terms = wp_get_object_terms(post.ID, taxonomy, {
                                                "orderby": "term_order"
                                            });
                                            var terms;
                                            terms = {};
                                            var num_terms;
                                            num_terms = count(post_terms);
                                            var i;
                                            __loop2:
                                                for (i = 0; i < num_terms; i++) {
                                                    terms[] = post_terms[i].slug;
                                                }
                                            wp_set_object_terms(new_id, terms, taxonomy);
                                        }
                                }
                            }
                            /**
                             * Copies the meta information of a post to another post
                             *
                             * @param {int}     $new_id The new post ID.
                             * @param {WP_Post} post   The original post object.
                             */
                            function duplicate_post_copy_post_meta_info(new_id, post) {
                                var post_meta_keys;
                                post_meta_keys = get_post_custom_keys(post.ID);
                                if (empty(post_meta_keys)) {
                                    return;
                                }
                                var meta_blacklist;
                                meta_blacklist = get_option("duplicate_post_blacklist");
                                if (meta_blacklist === "") {
                                    meta_blacklist = {};
                                } else {
                                    meta_blacklist = explode(",", meta_blacklist);
                                    meta_blacklist = array_filter(meta_blacklist);
                                    meta_blacklist = array_map("trim", meta_blacklist);
                                }
                                meta_blacklist[] = "_edit_lock";
                                // Edit lock.
                                meta_blacklist[] = "_edit_last";
                                // Edit lock.
                                meta_blacklist[] = "_dp_is_rewrite_republish_copy";
                                meta_blacklist[] = "_dp_has_rewrite_republish_copy";
                                if (intval(get_option("duplicate_post_copytemplate")) === 0) {
                                    meta_blacklist[] = "_wp_page_template";
                                }
                                if (intval(get_option("duplicate_post_copythumbnail")) === 0) {
                                    meta_blacklist[] = "_thumbnail_id";
                                }
                                meta_blacklist = apply_filters_deprecated("duplicate_post_blacklist_filter", {
                                    0: meta_blacklist
                                }, "3.2.5", "duplicate_post_excludelist_filter");
                                /**
                                 * Filters the meta fields excludelist when copying a post.
                                 *
                                 * @param {array} meta_blacklist The meta fields excludelist from the options.
                                 *
                                 * @return array
                                 */
                                meta_blacklist = apply_filters("duplicate_post_excludelist_filter", meta_blacklist);
                                var meta_blacklist_string;
                                meta_blacklist_string = "(" + implode(")|(", meta_blacklist) + ")";
                                if (strpos(meta_blacklist_string, "*") !== false) {
                                    meta_blacklist_string = str_replace({
                                        0: "*"
                                    }, {
                                        0: "[a-zA-Z0-9_]*"
                                    }, meta_blacklist_string);
                                    var meta_keys;
                                    meta_keys = {};
                                    var _key_;
                                    __loop1:
                                        for (_key_ in post_meta_keys) {
                                            var meta_key;
                                            meta_key = post_meta_keys[_key_];
                                            if (!preg_match("#^" + meta_blacklist_string + "$#", meta_key)) {
                                                meta_keys[] = meta_key;
                                            }
                                        }
                                } else {
                                    meta_keys = array_diff(post_meta_keys, meta_blacklist);
                                }
                                /**
                                 * Filters the list of meta fields names when copying a post.
                                 *
                                 * @param {array} meta_keys The list of meta fields name, with the ones in the excludelist already removed.
                                 *
                                 * @return array
                                 */
                                meta_keys = apply_filters("duplicate_post_meta_keys_filter", meta_keys);
                                __loop1:
                                    for (_key_ in meta_keys) {
                                        meta_key = meta_keys[_key_];
                                        var meta_values;
                                        meta_values = get_post_custom_values(meta_key, post.ID);
                                        __loop2:
                                            for (_key_ in meta_values) {
                                                var meta_value;
                                                meta_value = meta_values[_key_];
                                                meta_value = maybe_unserialize(meta_value);
                                                add_post_meta(new_id, meta_key, duplicate_post_wp_slash(meta_value));
                                            }
                                    }
                            }
                            /**
                             * Workaround for inconsistent wp_slash.
                             * Works only with WP 4.4+ (map_deep)
                             *
                             * @param {mixed} value Array or object to be recursively slashed.
                             * @return string|mixed
                             */
                            function duplicate_post_addslashes_deep(value) {
                                if (function_exists("map_deep")) {
                                    return map_deep(value, "duplicate_post_addslashes_to_strings_only");
                                } else {
                                    return wp_slash(value);
                                }
                            }
                            /**
                             * Adds slashes only to strings.
                             *
                             * @param {mixed} value Value to slash only if string.
                             * @return string|mixed
                             */
                            function duplicate_post_addslashes_to_strings_only(value) {
                                return Yoast.WP.Duplicate_Post.Utils.addslashes_to_strings_only(value);
                            }
                            /**
                             * Replacement function for faulty core wp_slash().
                             *
                             * @param {mixed} value What to add slash to.
                             * @return mixed
                             */
                            function duplicate_post_wp_slash(value) {
                                return duplicate_post_addslashes_deep(value);
                            }
                            /**
                             * Copies attachments, including physical files.
                             *
                             * @param {int}     $new_id The new post ID.
                             * @param {WP_Post} post   The original post object.
                             */
                            function duplicate_post_copy_attachments(new_id, post) {
                                // Get thumbnail ID.
                                var old_thumbnail_id;
                                old_thumbnail_id = get_post_thumbnail_id(post.ID);
                                // Get children.
                                var children;
                                children = get_posts({
                                    "post_type": "any",
                                    "numberposts": -1,
                                    "post_status": "any",
                                    "post_parent": post.ID
                                });
                                // Clone old attachments.
                                var _key_;
                                __loop1:
                                    for (_key_ in children) {
                                        var child;
                                        child = children[_key_];
                                        if (child.post_type !== "attachment") {
                                            continue;
                                        }
                                        var url;
                                        url = wp_get_attachment_url(child.ID);
                                        // Let's copy the actual file.
                                        var tmp;
                                        tmp = download_url(url);
                                        if (is_wp_error(tmp)) {
                                            continue;
                                        }
                                        var desc;
                                        desc = wp_slash(child.post_content);
                                        var file_array;
                                        file_array = {};
                                        file_array["name"] = basename(url);
                                        file_array["tmp_name"] = tmp;
                                        // "Upload" to the media collection
                                        var new_attachment_id;
                                        new_attachment_id = media_handle_sideload(file_array, new_id, desc);
                                        if (is_wp_error(new_attachment_id)) {
                                            unlink(file_array["tmp_name"]);
                                            continue;
                                        }
                                        var new_post_author;
                                        new_post_author = wp_get_current_user();
                                        var cloned_child;
                                        cloned_child = {
                                            "ID": new_attachment_id,
                                            "post_title": child.post_title,
                                            "post_exceprt": child.post_title,
                                            "post_author": new_post_author.ID
                                        };
                                        wp_update_post(wp_slash(cloned_child));
                                        var alt_title;
                                        alt_title = get_post_meta(child.ID, "_wp_attachment_image_alt", true);
                                        if (alt_title) {
                                            update_post_meta(new_attachment_id, "_wp_attachment_image_alt", wp_slash(alt_title));
                                        }
                                        // If we have cloned the post thumbnail, set the copy as the thumbnail for the new post.
                                        if (intval(get_option("duplicate_post_copythumbnail")) === 1 && old_thumbnail_id === child.ID) {
                                            set_post_thumbnail(new_id, new_attachment_id);
                                        }
                                    }
                            }
                            /**
                             * Copies child posts.
                             *
                             * @param {int}     $new_id The new post ID.
                             * @param {WP_Post} post   The original post object.
                             * @param {string}  $status Optional. The destination status.
                             */
                            function duplicate_post_copy_children(new_id, post, status) {
                                if (typeof status == 'undefined') status = "";
                                // Get children.
                                var children;
                                children = get_posts({
                                    "post_type": "any",
                                    "numberposts": -1,
                                    "post_status": "any",
                                    "post_parent": post.ID
                                });
                                var _key_;
                                __loop1:
                                    for (_key_ in children) {
                                        var child;
                                        child = children[_key_];
                                        if (child.post_type === "attachment") {
                                            continue;
                                        }
                                        duplicate_post_create_duplicate(child, status, new_id);
                                    }
                            }
                            /**
                             * Copies comments.
                             *
                             * @param {int}     $new_id The new post ID.
                             * @param {WP_Post} post   The original post object.
                             */
                            function duplicate_post_copy_comments(new_id, post) {
                                var comments;
                                comments = get_comments({
                                    "post_id": post.ID,
                                    "order": "ASC",
                                    "orderby": "comment_date_gmt"
                                });
                                var old_id_to_new;
                                old_id_to_new = {};
                                var _key_;
                                __loop1:
                                    for (_key_ in comments) {
                                        var comment;
                                        comment = comments[_key_];
                                        // Do not copy pingbacks or trackbacks.
                                        if (comment.comment_type === "pingback" || comment.comment_type === "trackback") {
                                            continue;
                                        }
                                        var parent;
                                        parent = comment.comment_parent && old_id_to_new[comment.comment_parent] ? old_id_to_new[comment.comment_parent] : 0;
                                        var commentdata;
                                        commentdata = {
                                            "comment_post_ID": new_id,
                                            "comment_author": comment.comment_author,
                                            "comment_author_email": comment.comment_author_email,
                                            "comment_author_url": comment.comment_author_url,
                                            "comment_content": comment.comment_content,
                                            "comment_type": comment.comment_type,
                                            "comment_parent": parent,
                                            "user_id": comment.user_id,
                                            "comment_author_IP": comment.comment_author_IP,
                                            "comment_agent": comment.comment_agent,
                                            "comment_karma": comment.comment_karma,
                                            "comment_approved": comment.comment_approved
                                        };
                                        if (intval(get_option("duplicate_post_copydate")) === 1) {
                                            commentdata["comment_date"] = comment.comment_date;
                                            commentdata["comment_date_gmt"] = get_gmt_from_date(comment.comment_date);
                                        }
                                        var new_comment_id;
                                        new_comment_id = wp_insert_comment(commentdata);
                                        var commentmeta;
                                        commentmeta = get_comment_meta(new_comment_id);
                                        var meta_key;
                                        __loop2:
                                            for (meta_key in commentmeta) {
                                                var meta_value;
                                                meta_value = commentmeta[meta_key];
                                                add_comment_meta(new_comment_id, meta_key, duplicate_post_wp_slash(meta_value));
                                            }
                                        old_id_to_new[comment.comment_ID] = new_comment_id;
                                    }
                            }
                            /**
                             * Creates a duplicate from a post.
                             *
                             * This is the main functions that does the cloning.
                             *
                             * @param {WP_Post} post      The original post object.
                             * @param {string}  $status    Optional. The intended destination status.
                             * @param {string}  $parent_id Optional. The parent post ID if we are calling this recursively.
                             * @return int|WP_Error
                             */
                            function duplicate_post_create_duplicate(post, status, parent_id) {
                                if (typeof status == 'undefined') status = "";
                                if (typeof parent_id == 'undefined') parent_id = "";
                                /**
                                 * Fires before duplicating a post.
                                 *
                                 * @param {WP_Post} post      The original post object.
                                 * @param {bool}    $status    The intended destination status.
                                 * @param {int}     $parent_id The parent post ID if we are calling this recursively.
                                 */
                                do_action("duplicate_post_pre_copy", post, status, parent_id);
                                /**
                                 * Filter allowing to copy post.
                                 *
                                 * @param {bool}    $can_duplicate Default to `true`.
                                 * @param {WP_Post} post          The original post object.
                                 * @param {bool}    $status        The intended destination status.
                                 * @param {int}     $parent_id     The parent post ID if we are calling this recursively.
                                 *
                                 * @return bool
                                 */
                                var can_duplicate;
                                can_duplicate = apply_filters("duplicate_post_allow", true, post, status, parent_id);
                                if (!can_duplicate) {
                                    wp_die(esc_html(__("You aren't allowed to duplicate this post", "duplicate-post")));
                                }
                                if (!duplicate_post_is_post_type_enabled(post.post_type) && post.post_type !== "attachment") {
                                    wp_die(esc_html(__("Copy features for this post type are not enabled in options page", "duplicate-post") + ": " + post.post_type));
                                }
                                var new_post_status;
                                new_post_status = empty(status) ? post.post_status : status;
                                var title;
                                title = " ";
                                if (post.post_type !== "attachment") {
                                    var prefix;
                                    prefix = sanitize_text_field(get_option("duplicate_post_title_prefix"));
                                    var suffix;
                                    suffix = sanitize_text_field(get_option("duplicate_post_title_suffix"));
                                    if (intval(get_option("duplicate_post_copytitle")) === 1) {
                                        title = post.post_title;
                                        if (!empty(prefix)) {
                                            prefix += " ";
                                        }
                                        if (!empty(suffix)) {
                                            suffix = " " + suffix;
                                        }
                                    } else {
                                        title = " ";
                                    }
                                    title = trim(prefix.title.suffix);
                                    /*
                                     * Not sure we should force a title. Instead, we should respect what WP does.
                                     * if ( '' === $title ) {
                                     *  // empty title.
                                     *  $title = __( 'Untitled', 'default' );
                                     * }
                                     */
                                    if (intval(get_option("duplicate_post_copystatus")) === 0) {
                                        new_post_status = "draft";
                                    } else if (new_post_status === "publish" || new_post_status === "future") {
                                        // Check if the user has the right capability.
                                        if (is_post_type_hierarchical(post.post_type)) {
                                            if (!current_user_can("publish_pages")) {
                                                new_post_status = "pending";
                                            }
                                        } else if (!current_user_can("publish_posts")) {
                                            new_post_status = "pending";
                                        }
                                    }
                                }
                                var new_post_author;
                                new_post_author = wp_get_current_user();
                                var new_post_author_id;
                                new_post_author_id = new_post_author.ID;
                                if (intval(get_option("duplicate_post_copyauthor")) === 1) {
                                    // Check if the user has the right capability.
                                    if (is_post_type_hierarchical(post.post_type)) {
                                        if (current_user_can("edit_others_pages")) {
                                            new_post_author_id = post.post_author;
                                        }
                                    } else if (current_user_can("edit_others_posts")) {
                                        new_post_author_id = post.post_author;
                                    }
                                }
                                var menu_order;
                                menu_order = intval(get_option("duplicate_post_copymenuorder")) === 1 ? post.menu_order : 0;
                                var increase_menu_order_by;
                                increase_menu_order_by = get_option("duplicate_post_increase_menu_order_by");
                                if (!empty(increase_menu_order_by) && is_numeric(increase_menu_order_by)) {
                                    menu_order += intval(increase_menu_order_by);
                                }
                                var post_name;
                                post_name = post.post_name;
                                if (intval(get_option("duplicate_post_copyslug")) !== 1) {
                                    post_name = "";
                                }
                                var new_post_parent;
                                new_post_parent = empty(parent_id) ? post.post_parent : parent_id;
                                var new_post;
                                new_post = {
                                    "menu_order": menu_order,
                                    "comment_status": post.comment_status,
                                    "ping_status": post.ping_status,
                                    "post_author": new_post_author_id,
                                    "post_content": intval(get_option("duplicate_post_copycontent")) === 1 ? post.post_content : "",
                                    "post_content_filtered": intval(get_option("duplicate_post_copycontent")) === 1 ? post.post_content_filtered : "",
                                    "post_excerpt": intval(get_option("duplicate_post_copyexcerpt")) === 1 ? post.post_excerpt : "",
                                    "post_mime_type": post.post_mime_type,
                                    "post_parent": new_post_parent,
                                    "post_password": intval(get_option("duplicate_post_copypassword")) === 1 ? post.post_password : "",
                                    "post_status": new_post_status,
                                    "post_title": title,
                                    "post_type": post.post_type,
                                    "post_name": post_name
                                };
                                if (intval(get_option("duplicate_post_copydate")) === 1) {
                                    var new_post_date;
                                    new_post_date = post.post_date;
                                    new_post["post_date"] = new_post_date;
                                    new_post["post_date_gmt"] = get_gmt_from_date(new_post_date);
                                }
                                /**
                                 * Filter new post values.
                                 *
                                 * @param {array}   $new_post New post values.
                                 * @param {WP_Post} post     Original post object.
                                 *
                                 * @return array
                                 */
                                new_post = apply_filters("duplicate_post_new_post", new_post, post);
                                var new_post_id;
                                new_post_id = wp_insert_post(wp_slash(new_post), true);
                                // If you have written a plugin which uses non-WP database tables to save
                                // information about a post you can hook this action to dupe that data.
                                if (new_post_id !== 0 && !is_wp_error(new_post_id)) {
                                    if (post.post_type === "page" || is_post_type_hierarchical(post.post_type)) {
                                        do_action("dp_duplicate_page", new_post_id, post, status);
                                    } else {
                                        do_action("dp_duplicate_post", new_post_id, post, status);
                                    }
                                    delete_post_meta(new_post_id, "_dp_original");
                                    add_post_meta(new_post_id, "_dp_original", post.ID);
                                }
                                /**
                                 * Fires after duplicating a post.
                                 *
                                 * @param {int|WP_Error} new_post_id The new post id or WP_Error object on error.
                                 * @param {WP_Post}      $post        The original post object.
                                 * @param {bool}         $status      The intended destination status.
                                 * @param {int}          $parent_id   The parent post ID if we are calling this recursively.
                                 */
                                do_action("duplicate_post_post_copy", new_post_id, post, status, parent_id);
                                return new_post_id;
                            }
                            /**
                             * Adds some links on the plugin page.
                             *
                             * @param {array}  $links The links array.
                             * @param {string} file  The file name.
                             * @return array
                             */
                            function duplicate_post_add_plugin_links(links, file) {
                                if (plugin_basename(+"/duplicate-post.php") === file) {
                                    links[] = "<a href=\"https://yoast.com/wordpress/plugins/duplicate-post\">" + esc_html__("Documentation", "duplicate-post") + "</a>";
                                }
                                return links;
                            }
