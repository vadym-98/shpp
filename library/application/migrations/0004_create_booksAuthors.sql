create table if not exists `booksAuthors` (
                                              `author_id` int(11) unsigned not null,
                                              `book_id` int(11) unsigned not null,
                                              `created` timestamp default current_timestamp,
                                              PRIMARY KEY( `author_id`, `book_id`),
                                              FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
                                              FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE
)
    engine = InnoDB
    auto_increment = 1
    character set utf8
    collate utf8_general_ci;

ALTER TABLE `books` ADD `deleted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `created`;