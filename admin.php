<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <link rel="stylesheet" href="stylessss.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
 <img src="logo.png" height="50px" width="50px">
        <div class="logo_name">DISCHARGE MANAGEMENT</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>

      <li>
        <a href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>

      <li>
       <a href="table.php">
          <i class='bx bx-plus-medical' ></i>
         <span class="links_name">Patient status</span>
       </a>
       <span class="tooltip">Patient status</span>
     </li>

     <li>
       <a href="#">
         <i class='bx bx-notepad' ></i>
         <span class="links_name">Module2</span>
       </a>
       <span class="tooltip">Module2</span>
     </li>

     <li>
       <a href="#">
         <i class='bx bx-notepad' ></i>
         <span class="links_name">Module3</span>
       </a>
       <span class="tooltip">Module3</span>
     </li>

     <li>
       <a href="#">
         <i class='bx bx-notepad' ></i>
         <span class="links_name">Module4</span>
       </a>
       <span class="tooltip">Module4</span>
     </li>

     <li>
       <a href="#">
         <i class='bx bx-notepad' ></i>
         <span class="links_name">Mkdule5</span>
       </a>
       <span class="tooltip">Module5</span>
     </li>
    
     <li class="profile">
<a href="logout.php">
         <i class='bx bx-log-out' id="log_out" ></i>
</a>
     </li>

    </ul>
  </div>

  <section class="home-section">
  <div class="text">ADMIN</div>
  </section>

  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>