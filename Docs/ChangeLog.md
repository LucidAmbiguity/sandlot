# Changes

**0.1.0-alpha**
Initial App

Spatie Laravel-permission installed.

Database seeded with default admin user and some roles to get started with.
added Roles index view.
added delete role
added Permissions view
added delete permission
added users view
added delete users
added add roles users and permissions

added Users roles and permission view to users main view

changed initial version per semver to indicate initial development. Anything MAY change at any time. The public API SHOULD NOT be considered stable.

updated db seeding for view testing

add remove roles from users

enforcing RBAC (role-based access Control)
and Laravel Standards of passing objects around.

Update user works for manage-users
updated quick start
FAdded Controllers for assign roles and permissions. for finer control.
clean up controller logic

Attach Blog Project to extend Demo Capabilities.
added a footer section to the base layout

-   ### ~~show user needs more detail and controller tweaking~~
-   ### ~~Posts section needs building out~~

Tweaked user page. Now removes role from user not from system. :)

Roles And permissions looks stable

Posts section framed and seeded.
next to tweek

Posts Section Tweaked - full crud - guests view index and show - auth() users can create - post owner can edit - post owner can delete - admin can edit/delete any post - Has ~30 test all passing - Super Admin Can Do It All

Next for Posts - is Comments from members - is Likes from members // use Soft Delete here to avoid spamming - profile pics - images in posts

Try to keep up with Testing.

Finer

## Components

delete-item : form element with delete button needs:

-   id="$id" id of model
-   :item="$name" label to display
-   route="route" name of destroy route resolves to route($route.'.destroy)

delete-button : form element with delete button needs:

-   id="$id" id of model
-   :item="$name" label to display
-   route="route" name of destroy route resolves to route($route.'.destroy)
    {not real happy with these they feel clunky}
