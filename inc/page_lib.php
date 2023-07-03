<?php
function pagination($total, $limit, $page_limit, $page, $paramArr)
{
  $param = '&sn=' . $paramArr['sn'] . '&sf=' . $paramArr['sf'];
  //1. 전체페이지
  $total_page = ceil($total / $limit);
  //2. 보여줄 페이지수

  //3. 페이징 보여주기
  $start_page = floor(($page - 1) / $page_limit) * $page_limit + 1;
  $end_page = $start_page + $page_limit - 1;
  $end_page = ($end_page > $total_page) ? $total_page : $end_page;
  $prev_page = $page - 1;
  if ($prev_page < 1) {
    $prev_page = 1;
  }

  $page_str = "<main class='d-flex justify-content-center'>";
  $page_str .=  "<nav aria-label='Page navigation example'>";
  $page_str .= "<ul class='pagination'>";
  $page_str .= " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page=1'$param>FIRST</a></li>";
  if ($page > 1) {
    $page_str .= " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page={$prev_page}'>PREV</a></li>";
  }
  for ($i = $start_page; $i <= $end_page; $i++) {
    if ($i == $page) {
      $page_str .= " <li class='page-item active'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page={$i}'>{$i}</a></li>";
    } else {
      $page_str .= " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page={$i}'>{$i}</a></li>";
    }
  }

  $next_page = (($page + 1) > $total_page) ? $total_page : $page + 1;
  if ($page < $total_page) {
    $page_str .= " <li class='page-item '><a class='page-link' href='{$_SERVER['PHP_SELF']}?page={$next_page}'$param>NEXT</a></li>";
  }
  $page_str .= " <li class='page-item'><a class='page-link' href='{$_SERVER['PHP_SELF']}?page={$total_page}'$param>LAST</a></li>";
  $page_str .= " </ul></nav>";
  $page_str .= "</main>";
  return $page_str;
}
