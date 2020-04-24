<!--<h1>Главная страница</h1>-->
<?php //foreach($news as $val):?>
<!--    <h3>--><?//=$val["title"]?><!--</h3>-->
<!--    <p>--><?//=$val["text"]?><!--</p>-->
<!--    <hr>-->
<?php//endforeach;?>

<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php unset($vars['offset']);
                unset($vars['booksAmount']);
                foreach ($vars as $var) { ?>
                <div data-book-id="<?=$var["img"]?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="book/<?=$var["img"]?>" class="statistic"><img src="public/images/books/<?=$var["img"]?>.jpg" alt="<?=$var["book_name"]?>">
                            <div data-title="<?=$var["book_name"]?>" class="blockI" style="height: 46px;">
                                <div data-book-title="<?=$var["book_name"]?>" class="title size_text"><?=$var["book_name"]?></div>
                                <div data-book-author="<?=$var["author_name"]?>" class="author"><?=$var["author_name"]?></div>
                            </div>
                        </a>
                        <a href="book/<?=$var["img"]?>">
                            <button type="button" class="details detail btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            <?php }?>
<!--            <div data-book-id="23" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=23"><img src="public/images/books/23.jpg" alt="Программирование на языке Go!">-->
<!--                        <div data-title="Программирование на языке Go!" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Программирование на языке Go!" class="title size_text">Программирование на языке Go!</div>-->
<!--                            <div data-book-author="Марк Саммерфильд" class="author">Марк Саммерфильд</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=23">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="25" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=25"><img src="public/images/books/25.jpg" alt="Толковый словарь сетевых терминов и аббревиатур">-->
<!--                        <div data-title="Толковый словарь сетевых терминов и аббревиатур" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Толковый словарь сетевых терминов и аббревиатур" class="title size_text">Толковый словарь сетевых терминов и аббревиатур</div>-->
<!--                            <div data-book-author="М., Вильямс" class="author">М. Вильямс</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=25">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="26" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=26"><img src="public/images/books/26.jpg" alt="Python for Data Analysis">-->
<!--                        <div data-title="Python for Data Analysis" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Python for Data Analysis" class="title size_text">Python for Data Analysis</div>-->
<!--                            <div data-book-author="Уэс Маккинни" class="author">Уэс Маккинни</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=26">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="27" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=27"><img src="public/images/books/27.jpg" alt="Thinking in Java (4th Edition)">-->
<!--                        <div data-title="Thinking in Java (4th Edition)" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Thinking in Java (4th Edition)" class="title size_text">Thinking in Java (4th Edition)</div>-->
<!--                            <div data-book-author="Брюс Эккель" class="author">Брюс Эккель</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=27">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="29" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=29"><img src="public/images/books/29.jpg" alt="Introduction to Algorithms">-->
<!--                        <div data-title="Introduction to Algorithms" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Introduction to Algorithms" class="title size_text">Introduction to Algorithms</div>-->
<!--                            <div data-book-author=" 	Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн" class="author"> Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=29">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="31" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=31"><img src="public/images/books/31.jpg" alt="JavaScript Pocket Reference">-->
<!--                        <div data-title="JavaScript Pocket Reference" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="JavaScript Pocket Reference" class="title size_text">JavaScript Pocket Reference</div>-->
<!--                            <div data-book-author="Дэвид Флэнаган" class="author">Дэвид Флэнаган</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=31">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="32" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=32"><img src="public/images/books/32.jpg" alt="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles">-->
<!--                        <div data-title="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles" class="title size_text">Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles</div>-->
<!--                            <div data-book-author="Гэри Маклин Холл" class="author">Гэри Маклин Холл</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=32">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="33" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=33"><img src="public/images/books/33.jpg" alt="SQL: The Complete Referenc">-->
<!--                        <div data-title="SQL: The Complete Referenc" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="SQL: The Complete Referenc" class="title size_text">SQL: The Complete Referenc</div>-->
<!--                            <div data-book-author=" 	Джеймс Р. Грофф" class="author"> Джеймс Р. Грофф</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=33">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="34" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=34"><img src="public/images/books/34.jpg" alt="PHP and MySQL Web Development">-->
<!--                        <div data-title="PHP and MySQL Web Development" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="PHP and MySQL Web Development" class="title size_text">PHP and MySQL Web Development</div>-->
<!--                            <div data-book-author="Люк Веллинг" class="author">Люк Веллинг</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=34">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="35" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=35"><img src="public/images/books/35.jpg" alt="Статистический анализ и визуализация данных с помощью R">-->
<!--                        <div data-title="Статистический анализ и визуализация данных с помощью R" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Статистический анализ и визуализация данных с помощью R" class="title size_text">Статистический анализ и визуализация данных с помощью R</div>-->
<!--                            <div data-book-author="Сергей Мастицкий" class="author">Сергей Мастицкий</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=35">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div data-book-id="36" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">-->
<!--                <div class="book">-->
<!--                    <a href="book?id=36"><img src="public/images/books/36.jpg" alt="Computer Coding for Kid">-->
<!--                        <div data-title="Computer Coding for Kid" class="blockI" style="height: 46px;">-->
<!--                            <div data-book-title="Computer Coding for Kid" class="title size_text">Computer Coding for Kid</div>-->
<!--                            <div data-book-author="Джон Вудкок" class="author">Джон Вудкок</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a href="book?id=36">-->
<!--                        <button type="button" class="details detail btn btn-success">Читать</button>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
            <!--                 <div data-book-id="37" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/37"><img src="./books-page_files/37.jpg" alt="Exploring Arduino: Tools and Techniques for Engineering Wizardry">
                                        <div data-title="Exploring Arduino: Tools and Techniques for Engineering Wizardry" class="blockI" style="height: 46px;">
                                            <div data-book-title="Exploring Arduino: Tools and Techniques for Engineering Wizardry" class="title size_text">Exploring Arduino: Tools and Techniques for Engineering Wizardry</div>
                                            <div data-book-author="Джереми Блум" class="author">Джереми Блум</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/37">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="38" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/38"><img src="./books-page_files/38.jpg" alt="Программирование микроконтроллеров для начинающих и не только">
                                        <div data-title="Программирование микроконтроллеров для начинающих и не только" class="blockI" style="height: 46px;">
                                            <div data-book-title="Программирование микроконтроллеров для начинающих и не только" class="title size_text">Программирование микроконтроллеров для начинающих и не только</div>
                                            <div data-book-author="А. Белов" class="author">А. Белов</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/38">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="39" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/39"><img src="./books-page_files/39.jpg" alt="The Internet of Things">
                                        <div data-title="The Internet of Things" class="blockI" style="height: 46px;">
                                            <div data-book-title="The Internet of Things" class="title size_text">The Internet of Things</div>
                                            <div data-book-author="Сэмюэл Грингард" class="author">Сэмюэл Грингард</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/39">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="40" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/40"><img src="./books-page_files/40.jpg" alt="Sketching User Experiences: The Workbook">
                                        <div data-title="Sketching User Experiences: The Workbook" class="blockI" style="height: 46px;">
                                            <div data-book-title="Sketching User Experiences: The Workbook" class="title size_text">Sketching User Experiences: The Workbook</div>
                                            <div data-book-author="Сет Гринберг" class="author">Сет Гринберг</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/40">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="41" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/41"><img src="./books-page_files/41.jpg" alt="InDesign CS6">
                                        <div data-title="InDesign CS6" class="blockI" style="height: 46px;">
                                            <div data-book-title="InDesign CS6" class="title size_text">InDesign CS6</div>
                                            <div data-book-author="Александр Сераков" class="author">Александр Сераков</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/41">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="42" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/42"><img src="./books-page_files/42.jpg" alt="Адаптивный дизайн. Делаем сайты для любых устройств">
                                        <div data-title="Адаптивный дизайн. Делаем сайты для любых устройств" class="blockI" style="height: 46px;">
                                            <div data-book-title="Адаптивный дизайн. Делаем сайты для любых устройств" class="title size_text">Адаптивный дизайн. Делаем сайты для любых устройств</div>
                                            <div data-book-author="Тим Кедлек" class="author">Тим Кедлек</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/42">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="43" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/43"><img src="./books-page_files/43.jpg" alt="Android для разработчиков">
                                        <div data-title="Android для разработчиков" class="blockI" style="height: 46px;">
                                            <div data-book-title="Android для разработчиков" class="title size_text">Android для разработчиков</div>
                                            <div data-book-author="Пол Дейтел, Харви Дейтел" class="author">Пол Дейтел, Харви Дейтел</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/43">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="44" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/44"><img src="./books-page_files/44.jpg" alt="Clean Code: A Handbook of Agile Software Craftsmanship">
                                        <div data-title="Clean Code: A Handbook of Agile Software Craftsmanship" class="blockI" style="height: 46px;">
                                            <div data-book-title="Clean Code: A Handbook of Agile Software Craftsmanship" class="title size_text">Clean Code: A Handbook of Agile Software Craftsmanship</div>
                                            <div data-book-author="Роберт Мартин" class="author">Роберт Мартин</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/44">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="45" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/45"><img src="./books-page_files/45.jpg" alt="Swift Pocket Reference: Programming for iOS and OS X">
                                        <div data-title="Swift Pocket Reference: Programming for iOS and OS X" class="blockI" style="height: 46px;">
                                            <div data-book-title="Swift Pocket Reference: Programming for iOS and OS X" class="title size_text">Swift Pocket Reference: Programming for iOS and OS X</div>
                                            <div data-book-author="Энтони Грей" class="author">Энтони Грей</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/45">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="46" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/46"><img src="./books-page_files/46.jpg" alt="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence">
                                        <div data-title="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence" class="blockI" style="height: 46px;">
                                            <div data-book-title="NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence" class="title size_text">NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence</div>
                                            <div data-book-author="Мартин Фаулер, Прамодкумар Дж. Садаладж" class="author">Мартин Фаулер, Прамодкумар Дж. Садаладж</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/46">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="47" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/47"><img src="./books-page_files/47.jpg" alt="Head First Ruby">
                                        <div data-title="Head First Ruby" class="blockI" style="height: 46px;">
                                            <div data-book-title="Head First Ruby" class="title size_text">Head First Ruby</div>
                                            <div data-book-author="Джей Макгаврен" class="author">Джей Макгаврен</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/47">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
                            <div data-book-id="48" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                <div class="book">
                                    <a href="http://localhost:3000/book/48"><img src="./books-page_files/48.jpg" alt="Practical Vim">
                                        <div data-title="Practical Vim" class="blockI" style="height: 46px;">
                                            <div data-book-title="Practical Vim" class="title size_text">Practical Vim</div>
                                            <div data-book-author="Дрю Нейл" class="author">Дрю Нейл</div>
                                        </div>
                                    </a>
                                    <a href="http://localhost:3000/book/48">
                                        <button type="button" class="details detail btn btn-success">Читать</button>
                                    </a>
                                </div>
                            </div>
             -->            </div>
    </div>

    <center><nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if (($offset - OFFSET) >= 0) :?>
                    <li class="page-item"><a class="page-link" href="/<?php
                        echo ($offset - OFFSET) < OFFSET ? '' : $offset-OFFSET; ?>">Previous</a>
                    </li>
                    <?php endif; ?>
                    <?php $offset = (ceil($booksAmount/OFFSET) == 1) ? $offset + 1 : $offset;
                    if (ceil($booksAmount/OFFSET) > $offset) :?>
                    <li class="page-item"><a class="page-link" href="/<?php
                        echo $offset + OFFSET; ?>">Next</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
    </center>

</section>
<section id="footer" class="footer-wrapper">
    <div class="navbar-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container-fuild">
                <div class="content_footer"> Made with<a href="http://programming.kr.ua/" class="heart"><i aria-hidden="true" class="fa fa-heart"></i></a>by HolaTeam</div>
            </div>
        </div>
    </div>
</section>
<div class="sweet-overlay" tabindex="-1" style="opacity: -0.02; display: none;"></div>
<div class="sweet-alert hideSweetAlert" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: none; margin-top: -169px; opacity: -0.03;">
    <div class="sa-icon sa-error" style="display: block;">
            <span class="sa-x-mark">
        <span class="sa-line sa-left"></span>
            <span class="sa-line sa-right"></span>
            </span>
    </div>
    <div class="sa-icon sa-warning" style="display: none;">
        <span class="sa-body"></span>
        <span class="sa-dot"></span>
    </div>
    <div class="sa-icon sa-info" style="display: none;"></div>
    <div class="sa-icon sa-success" style="display: none;">
        <span class="sa-line sa-tip"></span>
        <span class="sa-line sa-long"></span>

        <div class="sa-placeholder"></div>
        <div class="sa-fix"></div>
    </div>
    <div class="sa-icon sa-custom" style="display: none;"></div>
    <h2>Ооопс!</h2>
    <p style="display: block;">Ошибка error</p>
    <fieldset>
        <input type="text" tabindex="3" placeholder="">
        <div class="sa-input-error"></div>
    </fieldset>
    <div class="sa-error-container">
        <div class="icon">!</div>
        <p>Not valid!</p>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.statistic').click(function(e) {
            // Stop form from sending request to server
            e.preventDefault();
            let btn = $(this);
            $.ajax({
                method: "POST",
                url: "/statistic",
                dataType: "json",
                data: {
                    "img": btn[0].attributes[0].value,
                }
            });
            let XHR = new XMLHttpRequest();
            setTimeout(function () {
                window.location.href = btn[0].attributes[0].value;             });
        })
    });
</script>
<!--<script>-->
<!--$(document).ready(function() {-->
<!--document.getElementById('statistic').addEventListener('click', function(e){  // EventTarget.addEventListener() поддерживается начиная с IE9, его можно заменить на onclick или добавить EventTarget.attachEvent()-->
<!--if (window.XMLHttpRequest) {-->
<!--e.preventDefault();  // по ссылке нельзя перейти, перенаправление осуществляется с помощью location в событии loadend-->
<!--var http = new XMLHttpRequest(), href = this.href;-->
<!--http.open('POST', '/statistic'); // ВНИМАНИЕ: заменить на свой адрес!-->
<!--http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");-->
<!--http.timeout = 10000;  // прервать запрос, если он длиться более 10 секунд-->
<!--http.addEventListener('loadend', function() { location = href });-->
<!--http.send('url=' + location);-->
<!--}-->
<!--});-->
<!--});</script>-->