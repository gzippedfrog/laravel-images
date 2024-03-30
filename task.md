Разработать прототип хостинга изображений.
Инструменты для реализации задания:

- фреймворк Laravel/Yii2
- mysql

1. Реализовать форму для загрузки изображений. При загрузке изображений должны соблюдаться следующие правила:
    - [x] в 1 запрос, в одной форме, можно загружать до 5 файлов
    - [x] название каждого файла должно транслителироваться на английский язык и приводиться к нижнему регистру
    - [x] название каждого файла должно быть уникальным, и, если файл с таким названием существует, нужно задавать
      новому
      файлу уникальное название
    - [x] все файлы должны отправляться в одну директорию
    - [x] записывать в БД инфу о загруженных файлах: название файла, дата и время загрузки

2. Реализовать страницу просмотра информации об изображениях. На странице должны быть реализованы:
    - [x] вывод информации о загруженных файлах (название файла, дата и время загрузки)
    - [x] просмотр превью изображения
    - [x] возможность просмотра оригинального изображения
    - [ ] сортировка по названию/дате и времени загрузки изображения
    - [ ] возможность скачать файл в zip архиве

3. Реализовать API
    - [ ] вывод информации о загруженных файлах в json
    - [ ] получить данные о загруженном файле по id в json

Код задания необходимо выложить на github/gitlab/bitbucket.
Бонусом будет возможность просмотра результата в общем доступе (например vds)