/*jslint evil:true */
/**
 * Dynamic thread loader
 *
 * 
 *  * 
 * 
 * 
*/

// 
var DISQUS;
if (!DISQUS || typeof DISQUS == 'function') {
    throw "DISQUS object is not initialized";
}
// 

// json_data and default_json django template variables will close
// and re-open javascript comment tags

(function () {
    var jsonData, cookieMessages, session, key;

    /* */ jsonData = {"reactions": [], "reactions_limit": 10, "ordered_highlighted": [], "posts": {"423838844": {"edited": false, "author_is_moderator": true, "from_request_user": false, "up_voted": false, "can_edit": false, "ip": "", "last_modified_date": null, "dislikes": 0, "raw_message": "Interesting. I didn't know that. Thanks.", "has_replies": false, "vote": false, "votable": true, "last_modified_by": null, "real_date": "2012-01-29_14:38:35", "date": "3 months ago", "message": "<p>Interesting. I didn't know that. Thanks.</p>", "approved": true, "is_last_child": true, "author_is_founder": true, "can_reply": true, "likes": 0, "user_voted": null, "num_replies": 0, "down_voted": false, "is_first_child": true, "has_been_anonymized": false, "highlighted": false, "parent_post_id": 423813964, "depth": 1, "points": 0, "user_key": "vpetersson", "author_is_creator": true, "email": "", "killed": false, "is_realtime": false}, "423813964": {"edited": false, "author_is_moderator": false, "from_request_user": false, "up_voted": false, "can_edit": false, "ip": "", "last_modified_date": null, "dislikes": 0, "raw_message": "The only issue with sharding on gridfs with a shard-key which is files_id is if you have files larger than the default sharding chunk size (64MB).\u00a0If you have files larger than that you can get some errors or warnings and in earlier versions (pre 2.0.3/2.1.0) it would stop balancing.\n\n\nThey should increase the setting for the chunkSize option if they are storing large files. That may impact performance and the migration time per chunk, depending on the speed of disk and how often migrations happen.", "has_replies": false, "vote": false, "votable": true, "last_modified_by": null, "real_date": "2012-01-29_14:01:31", "date": "3 months ago", "message": "<p>The only issue with sharding on gridfs with a shard-key which is files_id is if you have files larger than the default sharding chunk size (64MB).\u00a0If you have files larger than that you can get some errors or warnings and in earlier versions (pre 2.0.3/2.1.0) it would stop balancing.</p>\n\n<p>They should increase the setting for the chunkSize option if they are storing large files. That may impact performance and the migration time per chunk, depending on the speed of disk and how often migrations happen.</p>", "approved": true, "is_last_child": false, "author_is_founder": false, "can_reply": true, "likes": 0, "user_voted": null, "num_replies": 1, "down_voted": false, "is_first_child": false, "has_been_anonymized": false, "highlighted": false, "parent_post_id": null, "depth": 0, "points": 0, "user_key": "scotthernandez", "author_is_creator": false, "email": "", "killed": false, "is_realtime": false}}, "ordered_posts": [423813964, 423838844], "realtime_enabled": false, "ready": true, "mediaembed": [], "has_more_reactions": false, "realtime_paused": false, "integration": {"receiver_url": "", "hide_user_votes": false, "reply_position": false, "disqus_logo": false}, "highlighted": {}, "reactions_start": 0, "media_url": "http://mediacdn.disqus.com/1336767989", "users": {"vpetersson": {"username": "vpetersson", "tumblr": "", "about": "", "display_name": "vpetersson", "url": "http://disqus.com/vpetersson/", "registered": true, "remote_id": null, "linkedin": "", "blog": "", "remote_domain": "", "points": 123, "facebook": "", "avatar": "http://mediacdn.disqus.com/uploads/users/221/3360/avatar32.jpg?1332320084", "delicious": "", "is_remote": false, "verified": true, "flickr": "", "twitter": "", "remote_domain_name": ""}, "scotthernandez": {"username": "scotthernandez", "tumblr": "", "about": "I live", "display_name": "Scott Hernandez", "url": "http://disqus.com/scotthernandez/", "registered": true, "remote_id": null, "linkedin": "", "blog": "http://flickr.com/photos/scotthernandez", "remote_domain": "", "points": 2, "facebook": "", "avatar": "http://mediacdn.disqus.com/uploads/users/137/4321/avatar32.jpg?1336504349", "delicious": "", "is_remote": false, "verified": true, "flickr": "", "twitter": "", "remote_domain_name": ""}}, "user_unapproved": {}, "messagesx": {"count": 0, "unread": []}, "thread": {"voters_count": 1, "offset_posts": 0, "slug": "notes_on_mongodb_gridfs_sharding_and_deploying_in_the_cloud", "paginate": false, "num_pages": 1, "days_alive": 0, "moderate_none": false, "voters": {"mkashkin": {"url": "http://disqus.com/mkashkin/", "username": "mkashkin", "is_moderator": false, "avatar": "http://mediacdn.disqus.com/uploads/users/109/5530/avatar32.jpg?1336802233", "name": "Mikhail Kashkin"}}, "total_posts": 2, "realtime_paused": true, "queued": false, "pagination_type": "append", "user_vote": null, "likes": 3, "num_posts": 2, "closed": false, "per_page": 0, "id": 556592618, "killed": false, "moderate_all": false}, "forum": {"use_media": true, "avatar_size": 32, "apiKey": "mtsAh4qHBQ0U3CcZFh4gUZHfX2eHGuDN47CvIyc8VWgMxTSUYj6KLyA05LVlHKxg", "features": {}, "comment_max_words": 0, "mobile_theme_disabled": false, "is_early_adopter": false, "login_buttons_enabled": false, "streaming_realtime": false, "reply_position": false, "id": 357970, "default_avatar_url": "http://mediacdn.disqus.com/1336767989/images/noavatar32.png", "template": {"url": "http://mediacdn.disqus.com/1336767989/uploads/themes/7884a9652e94555c70f96b6be63be216/theme.js?252", "mobile": {"url": "http://mediacdn.disqus.com/1336767989/uploads/themes/mobile/theme.js?254", "css": "http://mediacdn.disqus.com/1336767989/uploads/themes/mobile/theme.css?254"}, "api": "1.1", "name": "Houdini", "css": "http://mediacdn.disqus.com/1336767989/uploads/themes/7884a9652e94555c70f96b6be63be216/theme.css?252"}, "max_depth": 0, "ranks_enabled": false, "lastUpdate": "", "linkbacks_enabled": true, "allow_anon_votes": true, "revert_new_login_flow": false, "stylesUrl": "http://mediacdn.disqus.com/uploads/styles/35/7970/viktorpeterssoncom.css", "show_avatar": true, "reactions_enabled": false, "disqus_auth_disabled": false, "name": "Viktor Petersson.com", "language": "en", "mentions_enabled": true, "url": "viktorpeterssoncom", "allow_anon_post": true, "thread_votes_disabled": false, "hasCustomStyles": false, "moderate_all": false}, "settings": {"realtimeHost": "qq.disqus.com", "uploads_url": "http://media.disqus.com/uploads", "ssl_media_url": "https://securecdn.disqus.com/1336767989", "realtime_url": "http://rt.disqus.com/forums/realtime-cached.js", "facebook_app_id": "52254943976", "minify_js": true, "recaptcha_public_key": "6LdKMrwSAAAAAPPLVhQE9LPRW4LUSZb810_iaa8u", "read_only": false, "facebook_api_key": "52254943976", "juggler_url": "http://juggler.services.disqus.com", "realtimePort": "80", "debug": false, "disqus_url": "http://disqus.com", "media_url": "http://mediacdn.disqus.com/1336767989"}, "ranks": {}, "request": {"sort": "hot", "is_authenticated": false, "user_type": "anon", "subscribe_on_post": 0, "missing_perm": null, "user_id": null, "remote_domain_name": "", "remote_domain": "", "is_verified": false, "profile_url": "", "username": "", "is_global_moderator": false, "sharing": {}, "timestamp": "2012-05-12_04:06:29", "is_moderator": false, "ordered_unapproved_posts": [], "unapproved_posts": {}, "forum": "viktorpeterssoncom", "is_initial_load": true, "display_username": "", "points": null, "has_email": false, "moderator_can_edit": false, "is_remote": false, "userkey": "", "page": 1}, "context": {"use_twitter_signin": true, "use_fb_connect": false, "show_reply": true, "active_switches": ["autocommitted_thread", "bespin", "community_icon", "embedapi", "google_auth", "mentions", "new_facebook_auth", "new_thread_create", "realtime_cached", "show_captcha_on_links", "ssl", "static_reply_frame", "static_styles", "statsd_created", "upload_media", "use_rs_paginator_60m"], "sigma_chance": 10, "use_google_signin": false, "switches": {"olark_admin_addons": true, "es_index_threads": true, "google_auth": true, "discovery_best_comment": true, "html_email": true, "phoenix_reputation": true, "realtime_cached": true, "olark_admin_packages": true, "upload_media": true, "firehose_gnip_http": true, "discovery_preview_b_users": true, "transitional_sessions": true, "statsd_created": true, "bespin": true, "next_realtime": true, "firehose_message_db_lookup": true, "limit_get_posts_days_30d": true, "shardvote": true, "juggler_thread_onReady": true, "discovery_network": true, "redis_sessions": true, "use_impermium": true, "embedapi": true, "ssl": true, "shardpost:index": true, "usertransformer_reputation": true, "fingerprint": true, "send_to_impermium": true, "firehose_push": true, "shardpost": true, "phoenix_optout": true, "firehose_pubsub_throttle": true, "new_moderate": true, "use_rs_paginator_60m": true, "redis_threadcount": true, "shardvote:index": true, "static_reply_frame": true, "listactivity_replies": true, "juggler_enabled": true, "use_master_for_api": true, "next_realtime:indicators": true, "moderate_ascending": true, "community_icon": true, "static_styles": true, "firehose": true, "stats": true, "realtime": true, "show_captcha_on_links": true, "olark_support": true, "firehose_gnip": true, "firehose_pubsub": true, "olark_addons": true, "new_facebook_auth": true, "edits_to_spam": true, "phoenix": true, "discovery_redirect_event": true, "new_thread_create": true, "autocommitted_thread": true, "theme_editor_disabled": true, "listactivity_replies_30d": true, "statsd.timings": true, "train_impermium": true, "git_themes": true, "google_analytics": true, "mentions": true, "olark_install": true}, "forum_facebook_key": "b15ae9fb40d5509ac3b3003d78ca8cf9", "use_yahoo": false, "subscribed": false, "active_gargoyle_switches": ["discovery_best_comment", "discovery_network", "discovery_preview_b_users", "discovery_redirect_event", "edits_to_spam", "es_index_threads", "fingerprint", "firehose", "firehose_gnip", "firehose_gnip_http", "firehose_message_db_lookup", "firehose_pubsub", "firehose_pubsub_throttle", "firehose_push", "git_themes", "google_analytics", "html_email", "juggler_enabled", "juggler_thread_onReady", "limit_get_posts_days_30d", "listactivity_replies", "listactivity_replies_30d", "moderate_ascending", "new_moderate", "next_realtime", "next_realtime:indicators", "olark_addons", "olark_admin_addons", "olark_admin_packages", "olark_install", "olark_support", "phoenix", "phoenix_optout", "phoenix_reputation", "realtime", "redis_sessions", "redis_threadcount", "send_to_impermium", "shardpost", "shardpost:index", "shardvote", "shardvote:index", "show_captcha_on_links", "stats", "statsd.timings", "theme_editor_disabled", "train_impermium", "transitional_sessions", "use_impermium", "use_master_for_api", "usertransformer_reputation"], "realtime_speed": 15000, "use_openid": true}}; /* */
    /* __extrajson__ */
    cookieMessages = {"user_created": null, "post_has_profile": null, "post_twitter": null, "post_not_approved": null}; session = {"url": null, "name": null, "email": null};

    DISQUS.jsonData = jsonData;
    DISQUS.jsonData.cookie_messages = cookieMessages;
    DISQUS.jsonData.session = session;

    if (DISQUS.useSSL) {
        DISQUS.useSSL(DISQUS.jsonData.settings);
    }

    // The mappings below are for backwards compatibility--before we port all the code that
    // accesses jsonData.settings to DISQUS.settings

    var mappings = {
        debug:                'disqus.debug',
        minify_js:            'disqus.minified',
        read_only:            'disqus.readonly',
        recaptcha_public_key: 'disqus.recaptcha.key',
        facebook_app_id:      'disqus.facebook.appId',
        facebook_api_key:     'disqus.facebook.apiKey'
    };

    var urlMappings = {
        disqus_url:    'disqus.urls.main',
        media_url:     'disqus.urls.media',
        ssl_media_url: 'disqus.urls.sslMedia',
        realtime_url:  'disqus.urls.realtime',
        uploads_url:   'disqus.urls.uploads'
    };

    if (DISQUS.jsonData.context.switches.realtime_setting_change) {
        urlMappings.realtimeHost = 'realtime.host';
        urlMappings.realtimePort = 'realtime.port';
    }
    for (key in mappings) {
        if (mappings.hasOwnProperty(key)) {
            DISQUS.settings.set(mappings[key], DISQUS.jsonData.settings[key]);
        }
    }

    for (key in urlMappings) {
        if (urlMappings.hasOwnProperty(key)) {
            DISQUS.jsonData.settings[key] = DISQUS.settings.get(urlMappings[key]);
        }
    }
}());

DISQUS.jsonData.context.csrf_token = '21bc467119200cb06806902fa8e2f5b0';

DISQUS.jsonData.urls = {
    login: 'http://disqus.com/profile/login/',
    logout: 'http://disqus.com/logout/',
    upload_remove: 'http://viktorpeterssoncom.disqus.com/thread/notes_on_mongodb_gridfs_sharding_and_deploying_in_the_cloud/async_media_remove/',
    request_user_profile: 'http://disqus.com/AnonymousUser/',
    request_user_avatar: 'http://mediacdn.disqus.com/1336767989/images/noavatar92.png',
    verify_email: 'http://disqus.com/verify/',
    remote_settings: 'http://viktorpeterssoncom.disqus.com/_auth/embed/remote_settings/',
    edit_profile_window: 'http://disqus.com/embed/profile/edit/',
    embed_thread: 'http://viktorpeterssoncom.disqus.com/thread.js',
    embed_vote: 'http://viktorpeterssoncom.disqus.com/vote.js',
    embed_thread_vote: 'http://viktorpeterssoncom.disqus.com/thread_vote.js',
    embed_thread_share: 'http://viktorpeterssoncom.disqus.com/thread_share.js',
    embed_queueurl: 'http://viktorpeterssoncom.disqus.com/queueurl.js',
    embed_hidereaction: 'http://viktorpeterssoncom.disqus.com/hidereaction.js',
    embed_more_reactions: 'http://viktorpeterssoncom.disqus.com/more_reactions.js',
    embed_subscribe: 'http://viktorpeterssoncom.disqus.com/subscribe.js',
    embed_highlight: 'http://viktorpeterssoncom.disqus.com/highlight.js',
    embed_block: 'http://viktorpeterssoncom.disqus.com/block.js',
    update_moderate_all: 'http://viktorpeterssoncom.disqus.com/update_moderate_all.js',
    update_days_alive: 'http://viktorpeterssoncom.disqus.com/update_days_alive.js',
    show_user_votes: 'http://viktorpeterssoncom.disqus.com/show_user_votes.js',
    forum_view: 'http://viktorpeterssoncom.disqus.com/notes_on_mongodb_gridfs_sharding_and_deploying_in_the_cloud',
    cnn_saml_try: 'http://disqus.com/saml/cnn/try/',
    realtime: DISQUS.jsonData.settings.realtime_url,
    thread_view: 'http://viktorpeterssoncom.disqus.com/thread/notes_on_mongodb_gridfs_sharding_and_deploying_in_the_cloud/',
    twitter_connect: DISQUS.jsonData.settings.disqus_url + '/_ax/twitter/begin/',
    yahoo_connect: DISQUS.jsonData.settings.disqus_url + '/_ax/yahoo/begin/',
    openid_connect: DISQUS.jsonData.settings.disqus_url + '/_ax/openid/begin/',
    googleConnect: DISQUS.jsonData.settings.disqus_url + '/_ax/google/begin/',
    community: 'http://viktorpeterssoncom.disqus.com/community.html',
    admin: 'http://viktorpeterssoncom.disqus.com/admin/moderate/',
    moderate: 'http://viktorpeterssoncom.disqus.com/admin/moderate/',
    moderate_threads: 'http://viktorpeterssoncom.disqus.com/admin/moderate-threads/',
    settings: 'http://viktorpeterssoncom.disqus.com/admin/settings/',
    unmerged_profiles: 'http://disqus.com/embed/profile/unmerged_profiles/',
    juggler: DISQUS.jsonData.settings.juggler_url,

    channels: {
        def:      'http://disqus.com/default.html', /* default channel */
        auth:     'https://disqus.com/embed/login.html',
        tweetbox: 'http://disqus.com/forums/integrations/twitter/tweetbox.html?f=viktorpeterssoncom',
        edit:     'http://viktorpeterssoncom.disqus.com/embed/editcomment.html'
    }
};


// 
//     
DISQUS.jsonData.urls.channels.reply = 'http://mediacdn.disqus.com/1336767989/build/system/reply.html';
DISQUS.jsonData.urls.channels.upload = 'http://mediacdn.disqus.com/1336767989/build/system/upload.html';
DISQUS.jsonData.urls.channels.sso = 'http://mediacdn.disqus.com/1336767989/build/system/sso.html';
DISQUS.jsonData.urls.channels.facebook = 'http://mediacdn.disqus.com/1336767989/build/system/facebook.html';
//     
// 
