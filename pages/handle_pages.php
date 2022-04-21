<?php
  if(isset($_GET['page'])) {
    switch ($_GET['page']) {
      case 'home':
        include "pages/analysis.php";
        break;
      case 'users':
        include "pages/users/UsersView.php";
        break;
      case 'rent':
        include "pages/rent/RentView.php";
        break;
      case 'company':
        include "pages/company/CompanyView.php";
        break;
      case 'books':
       include "pages/books/BooksView.php";
       break;
    }
  } else {
    include "pages/analysis.php";
  }
?>
