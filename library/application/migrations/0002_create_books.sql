create table if not exists `books` (
                                       `id` int(11) unsigned not null auto_increment,
                                       `book_name` varchar(255) not null unique ,
                                       `authors` varchar(255) not null unique ,
                                       `img` int(11) unsigned not null unique,
                                       `year` int(4) not null,
                                       `description` text,
                                       `clicks` int(11) unsigned default 0,
                                       `statistic` int(11) unsigned default 0,
                                       `created` timestamp default current_timestamp,
                                       primary key (id)
)
    engine = InnoDB
    auto_increment = 1
    character set utf8
    collate utf8_general_ci;