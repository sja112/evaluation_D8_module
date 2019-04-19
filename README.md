# evaluation_D8_module

I have created two Drupal 8 modules one is collection module and other one is custom migration module.

In collection module I have done general problems,

1). Create a new field Formatter.
I have created a link field formatter named as ‘YouTube Link Formatter’ which will take youtube url
and created its embed code through code to show the video.

2). Create a new Views Field OR Area plugin, to be consumed in View.
I have created new area plugin which can be added in header region of the view. I will provide a add
new link in the header region to add the new content.

3). Create a new route subscriber to change the controller serving the route.
I have created new route subscriber which will change the controller serving the path,
Controller is serving ('/ctrlRoute') and I changed it to ('/alteredRoute')

4). Create a new block plugin, which is visible only on Admin pages, and to administrators only.
I have created new block which will be visible only on Admin pages, and to administrators only.

5). Create a new breadcrumb builder that gets called in specific scenario and shows required
breadcrumb
I have created a breadcrumb builder which will be called only for article pages. It will display current
page title and current page hierarchy if any.

In custom_migration module,

I have done migration for JSON file (data.json and user_data.json).

I have created two migration groups data and user_data (/admin/structure/migrate)
Migration status is visible on (/admin/structure/migrate/manage/user_data/migrations) and
(/admin/structure/migrate/manage/data/migrations)

Migration execution can be done from
(/admin/structure/migrate/manage/data/migrations/data/execute)
and (/admin/structure/migrate/manage/user_data/migrations/user_data/execute)

Drush commands will also work.
