<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="stylesheet" href="<?=base_url()?>asset/Profil.css">
    <meta charset="utf-8">
    <title>My Profil</title>
  </head>
  <body>
    <div class="sidenav">
      <p>
         <img src="<?= base_url()?>asset/team1.png"  class="user" style="width: 50px;height: 50px; margin-left: 20px;">
      </p>
      <a>Selamat Datang,</a>
    
      <a href="<?=base_url()?>index.php/welcome/pendidikan">Pendidikan Yang Ditempuh</a>
      <a href="<?=base_url()?>index.php/welcome/agendasaya">Agenda Saya</a>
      <a href="<?=base_url()?>index.php/welcome/masukan">Masukan</a>
      
      
    </div>

    <div class="content">

      <h2>Detail Profil</h2>
      <table id="pro">
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Birthday</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Telephone</th>
          <th>Hobby</th>
          
        </tr>
        <tr>
         <td>Mohammad</td>
          <td>Fani</td>
          <td>28 Sept 2018</td>
          <td>Jl. Danau Buyan</td>
          <td>Laki-Laki</td>
          <td>08132342445</td>
          <td>Mendengarkan Musik</td>
        </tr>

        
      </table>
      
    </div>
  </body>
</html>

