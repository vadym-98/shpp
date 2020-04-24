create table if not exists `authors` (
                                         `id` int(11) unsigned not null auto_increment,
                                         `author_name` varchar(255) not null unique,
                                         `created` timestamp default current_timestamp,
                                         primary key (id)
)
    engine = InnoDB
    auto_increment = 1
    character set utf8
    collate utf8_general_ci;

INSERT IGNORE INTO authors (author_name) SELECT authors FROM books;

ALTER TABLE books
    DROP COLUMN authors;