<?php return [
    'plugin' => [
        'name' => 'Thunder 4',
        'description' => 'Thunder 4 Mass site manager by Firestarter',
    ],
    'group' => [
        'form' => [
            'name' => 'Group Name',
        ],
        'list' => [
            'name' => 'Group',
        ],
        'menu' => [
            'title' => 'Groups',
        ],
    ],
    'domain' => [
        'form' => [
            'name' => 'Domain Name',
            'group' => 'Group',
            'theme' => 'Site template',
            'list_domains' => 'Domains list for Import',
            'import' => 'Import',
            'import_domains' => 'Import Domains',
            'group_id' => 'To Group',
        ],
        'list' => [
            'id' => 'Domain ID',
            'name' => 'Domain Name',
            'categories' => 'Categories',
            'theme' => 'Theme',
            'se' => 'SE Index',
        ],
        'menu' => [
            'title' => 'Domains',
        ],
    ],
    'category' => [
        'form' => [
            'name' => 'Category Name',
            'parent' => 'Parent Category',
            'domain' => 'Domain',
            'slug' => 'Pretty URL',
            'import_categories' => 'Categories Import',
            'file' => 'Use file with categories',
            'file_comment' => 'You can add your own files with categories to: /plugins/firestarter/thunder4/data/categories/',
            'categories_schema' => 'Categories Scheme',
            'categories_schema_comment' => 'Example 3;9;18 - 3 categories on First level, 9 - on Second, 18 - on Third',
            'import' => 'Import Categories',
        ],
        'list' => [
            'name' => 'Category Name',
            'reorder' => 'Sort',
            'domain' => 'Domain',
        ],
        'menu' => [
            'title' => 'Categories',
        ],
    ],
    'article' => [
        'form' => [
            'keyword' => 'Keyword',
            'title' => 'Article Title',
            'description' => 'Short Article Description',
            'body' => 'Article Body',
            'domain' => 'Domain',
            'category' => 'Category',
            'slug' => 'Pretty URL',
        ],
        'list' => [
            'keyword' => 'Keyword',
            'title' => 'Title',
            'domain' => 'Domain',
            'category' => 'Category',
        ],
        'menu' => [
            'title' => 'Article',
        ],
    ],
    'logs' => [
        'menu' => [
            'title' => 'Logs',
        ],
    ],
    'themes' => [
        'menu' => [
            'title' => 'Templates',
        ],
    ],
    'template' => [
        'form' => [
            'name' => 'Template Name',
            'id' => 'Template ID',
            'template' => 'Article Body View',
            'title_template' => 'Article Title View',
        ],
        'list' => [
            'name' => 'Article Template Name',
        ],
    ],
    'keyword' => [
        'list' => [
            'name' => 'Keywords Group Name',
            'id' => 'ID',
        ],
        'form' => [
            'name' => 'Keywords Group Name',
            'files' => 'Files With keywords',
        ],
        'menu' => [
            'title' => 'Keywords',
        ],
    ],
    'task' => [
        'list' => [
            'id' => 'ID',
            'name' => 'Task Name',
            'command' => 'Task Command',
            'cron' => 'Time to Execute',
        ],
        'form' => [
            'name' => 'Task Name',
            'command' => 'Task Command',
            'cron' => 'Time to Execute in  Cron Schema',
            'commands' => 'Internal Command:',
            'is_console' => 'Artisan(ON) or System(OFF) Command?',
        ],
        'menu' => [
            'title' => 'Tasks',
        ],
    ],
];