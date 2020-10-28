<?php

class Pagination {
    
    private static $pageLimit  = 5;
    private static $totalCount = 0;

    static function setPageLimit($pageLimit) {
        self::$pageLimit = $pageLimit;
    }

    static function getPageLimit() {
        return self::$pageLimit;
    }
    
    static function getPageOffset() {
        
        return (self::getPageIndex() - 1) * 
               (self::getPageLimit());
    }
    
    static function getPageIndex() {
        return isset($_GET['page_index']) ? $_GET['page_index'] : 1;
    }
    
    static function setTotalCount($count) {
        self::$totalCount = $count;
    }
    
    static function getTotalCount() {
        return self::$totalCount;
    }    
    
    static function nextPage() {
        return (self::getPageOffset() + self::getPageLimit()) < self::getTotalCount();
    }
    
    static function prevPage() {
        return self::getPageIndex() > 1;
    }
    
    static function display() {
        
        $pageIndex      = self::getPageIndex();
        $nextPageIndex  = $pageIndex + 1;
        $prevPageIndex  = $pageIndex - 1;
        
        if(self::prevPage()) {
            echo "<a class='pagination' href='?page_index=$prevPageIndex'>Prev</a>";
        }        
        
        echo '<span>' . self::getPageOffset() . ' - ' . self::getTotalCount() . '</span>';
        
        if(self::nextPage()) {
            echo "<a class='pagination' href='?page_index=$nextPageIndex'>Next</a>";        
        }
    }   
}