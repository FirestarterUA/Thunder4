<?php return [
    'plugin' => [
        'name' => 'Thunder4',
        'description' => 'Thunder 4 Mass site manager by Firestarter',
    ],
    'group' => [
        'form' => [
            'name' => 'Название Группы',
        ],
        'list' => [
            'name' => 'Группа',
        ],
        'menu' => [
            'title' => 'Группы',
        ],
    ],
    'domain' => [
        'form' => [
            'name' => 'Название домена',
            'group' => 'Группа',
            'theme' => 'Используя шаблон',
            'list_domains' => 'Список доменов для импорта',
            'import' => 'Импорт',
            'import_domains' => 'Импортировать домены',
            'group_id' => 'В группу',
        ],
        'list' => [
            'id' => 'ID Домена',
            'name' => 'Название Домена',
            'categories' => 'Категории',
            'theme' => 'Шаблон',
            'se' => 'Индекс в ПС',
            'articles_count' =>'Количество статей'
        ],
        'menu' => [
            'title' => 'Домены',
        ],
    ],
    'category' => [
        'form' => [
            'name' => 'Название категории',
            'parent' => 'Родительская категория',
            'domain' => 'Домен',
            'slug' => 'ЧПУ',
            'import_categories' => 'Импорт категорий',
            'file' => 'Используя категории  из файла',
            'file_comment' => 'Можно добавить свои файлы с категорими в: /plugins/firestarter/thunder4/data/categories/',
            'categories_schema' => 'Используя схему',
            'categories_schema_comment' => 'Схема 3;9;18 означает что у каждого домена, будет 3 категории первого уровня, 9 - второго, 18 - третьего. Уровней вложености сколько угодно',
            'import' => 'Импортировать',
        ],
        'list' => [
            'name' => 'Название категории',
            'reorder' => 'Упорядочить',
            'domain' => 'Домен',
        ],
        'menu' => [
            'title' => 'Категории',
        ],
    ],
    'article' => [
        'form' => [
            'keyword' => 'Ключевик',
            'title' => 'Заголовок статьи',
            'description' => 'Краткое описание статьи',
            'body' => 'Полная статья',
            'domain' => 'Домен',
            'category' => 'Категория',
            'slug' => 'ЧПУ',
        ],
        'list' => [
            'keyword' => 'Ключевик',
            'title' => 'Заголовок',
            'domain' => 'Домен',
            'category' => 'Категория',

        ],
        'menu' => [
            'title' => 'Статьи',
        ],
    ],
    'logs' => [
        'menu' => [
            'title' => 'Логи',
        ],
    ],
    'themes' => [
        'menu' => [
            'title' => 'Шаблоны',
        ],
    ],
    'template' => [
        'form' => [
            'name' => 'Название шаблона',
            'id' => 'ID шаблона',
            'template' => 'Внешний вид статьи',
            'title_template' => 'Внешний вид заголовка статьи',
        ],
        'list' => [
            'name' => 'Название шаблона статьи',
        ],
    ],
    'keyword' => [
        'list' => [
            'name' => 'Названия группы ключей',
            'id' => 'ID',
        ],
        'form' => [
            'name' => 'Название группы ключей',
            'files' => 'Файлы с ключевими словами',
        ],
        'menu' => [
            'title' => 'Ключевые слова',
        ],
    ],
    'task' => [
        'list' => [
            'id' => 'ID',
            'name' => 'Название задачи',
            'command' => 'Команда',
            'cron' => 'Время выполнения',
        ],
        'form' => [
            'name' => 'Название задачи',
            'command' => 'Команда для выполнения',
            'cron' => 'Время выполнения в формате Cron Задачи',
            'commands' => 'Внутренние комманды Thunder4:',
            'is_console' => 'Это консольная(ВКЛ) или системная(ВЫКЛ) команда?',
        ],
        'menu' => [
            'title' => 'Задачи',
        ],
    ],
];