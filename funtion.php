<?php
function redirect($url)
{
  header("Location: http://localhost/bookStore/" . $url);
  die;
}
