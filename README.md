# Thunder 4 Mass Site Manager

[![Firestarter](http://www.clipartbest.com/cliparts/9TR/zaX/9TRzaXMdc.png)](http://ifirestarter.ru)

Thunder 4 Менеджер неограниченного числа сайтов из одной админ панел и для October CMS.

  - Группы
  - Сайты
  - Категории статей
  - Статьи
  - Шаблоны статей
  - Задачи для CRON 

# Возможности:

  - Импорт доменов
  - Импорт категорий для сайтов
  - Задачи для автоматического постинга статей по сайтам
  
  
# Системные требования:

  - PHP version 5.5.9 or higher
  - PDO PHP Extension
  - cURL PHP Extension
  - OpenSSL PHP Extension
  - Mbstring PHP Library
  - ZipArchive PHP Library
  - GD PHP Library

# Установка:

  - [Установить Oсtober CMS](https://octobercms.info/docs/help-installation)
  - [Установить плагин Ocotober.Drivers](https://octobercms.com/plugin/october-drivers)
  - На [странице](https://github.com/FirestarterUA/Thunder4/tree/master) Clone or download -> Download
  - Содержимое папки Thunder4-master архива распаковать в папку /plugins/ October CMS
  - Активировать плагин в админ панели CMS
  - Опционально сменить язык сайта на "русский" в Profile -> Settings Админки CMS
  - Опционально установить [Cron](https://octobercms.com/docs/setup/installation#crontab-setup) на Сервере

# Алгоритм работы:

  - Создать "Группы" для сайтов
  - Добавить домены для сайтов на странице "Домены", или импортировать. Внимание! Все домены должны быть установлены "алиасами" к домену с сайтом.
  - Добавить или импортровать "Категории" для сайтов.
  - Добавлять статьи
  - Опционально добавить "Задачи" для автоматической публикации статей. Внимание! Должен быть установлен Cron.