<?php
use App\Models\Page;
function getMenuPages(){
$pages = Page::where("status",1)->orderBy("ordering")->get();
return $pages;
}

?>