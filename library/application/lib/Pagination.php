<?php

namespace application\lib;

class Pagination {

    private $maxPages;
    private $maxBooks;
    private $currentPage;
    private $route;
    private $books;

    /**
     * Pagination constructor.
     * @param $route
     * @param $maxPages
     * @param $maxBooks
     * @param $currentPage
     * @param $books
     */
    public function __construct($route, $maxPages, $maxBooks, $currentPage, $books) {
        $this->route = $route;
        $this->maxPages = $maxPages;
        $this->maxBooks = $maxBooks;
        $this->currentPage = $currentPage;
        $this->books = $books;
    }

    public function getPagination() {
        $data = [];
        $icons = '';
        $numberOfPages = ceil(count($this->books)/$this->maxBooks);
        for ($i = 0; $i < $this->maxPages; $i++) {
            if ($this->currentPage+$i > $numberOfPages) break;
            $icons .= '<li class="page-item"><a class="page-link" href="/admin/view/';
                if (($this->currentPage+$i) != $this->currentPage) {
                    $icons .= ($this->currentPage+$i).'">'.($this->currentPage+$i);
                } else {
                    if ($this->currentPage == 1) {
                        $icons .= $this->currentPage.'">'.$this->currentPage.'</a></li>';
                        continue;
                    }
                    $icons .= ($this->currentPage-$i-1).'">'.($this->currentPage-$i-1).'</a></li>';
                    $icons .= '<li class="page-item"><a class="page-link" href="/admin/view/'.$this->currentPage.'">'.$this->currentPage;
                }
            $icons .= '</a></li>';
        }
        $data['icons'] = $icons;
        for ($i = $this->currentPage * $this->maxBooks - $this->maxBooks, $j = 0; isset($this->books[$i]) && $j < $this->maxBooks; $j++, $i++) {
            $data[$j] = $this->books[$i];
        }
        return $data;
    }


}