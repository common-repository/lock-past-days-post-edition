=== lock-past-days-post-edition ===
Contributors: philrich123
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UXJRWH5TPAQJS
Tags: stop, post, edition, midnight, 12pm
Requires at least: 2.0.2
Tested up to: 4.9
Requires PHP: 5.2.6
Stable tag: 0.5

This plugin lock the edition possibility of a post after 12pm.

== Description ==

With this plugin active, it's impossible to edit posts that have a day of creation witch is not today.

In brief, the edition possibility is desactivated after 12pm, even if you are the author.

An exception is added since version 0.3 : if a posts are stickies, the edition is possible until the stickies tags are unchecked. This work with
the standard sticky feature of wordpress and with WP-Sticky plugin.

Only the administrator still have the possibility of edition.

== Installation ==

Simply Upload and Activate.

== Changelog ==

= 0.5 =
* No changes, only a update (after check) for new wordpress version and corrections to the description

= 0.4 =
* It's now possible to edit a post that will be published in the futur.

= 0.3 =
* Add the possibility of editing sticky posts until they are unsticked.
* Add "WP-Sticky" compatibility for the same feature as above.

= 0.2 =
* Changing the filter priority from 10 to 100 for "role scoper" plugin compatibility.
  Role scoper plugin install its filter at a 99 priority making previous version of this plugin not working.

= 0.1 =
* First version.

== Upgrade Notice ==

= 0.4 =
Correcting bug : it was impossible to edit a scheduled post.

= 0.3 =
Now it's possible to edit sticky posts every days (until they're unsticked).

= 0.2 =
Now work with "Role Scoper" plugin.

= 0.1 =
Initial version.

