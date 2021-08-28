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

# show user needs more detail

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
