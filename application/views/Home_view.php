<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Trajekline-Jember</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('asset/lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('asset/lib/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/lib/animate/animate.min.css')?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('asset/css/style.css')?>" rel="stylesheet">

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#home"><img src="#img" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#home">Home</a></li>
          <li><a href="#wisata">Paket Tour</a></li>
          
            <li class="menu-has-children"><a href="">Bantuan</a>
            <ul>
            <li><a href="aboutus.php?post=profil">Profil Trajekline</a></li>
              <li><a href="aboutus.php?post=syarat">Ketentuan & Persyaratan</a></li>
              <li><a href="aboutus.php?post=pembayaran">Cara Pembayaran</a></li>
              <li><a href="#contact">Hubungi Kami</a></li>
            </ul>
          </li>
          <?php session_start();

          	if(isset($_SESSION['username'])){
	        ?>
			
			
        <li class="menu-active"><a href="profil.php" >Selamat datang, <?php echo "$_SESSION[username]"; ?></a></li>
        <li ><a  class="dropdown-toggle icon-cog" href="#"></a>
            <ul>
              <li><a href="profil.php">Profil</a></li>
              <li><a href="bookingList.php">Booking List</a></li>
              <li><a href="logout.php">Keluar</a></li>
            </ul>
          </li>
        <?php
	        }else{
	      ?>
				<li class="menu-has-children"><a href="">Register</a>
            <ul>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Daftar</a></li>
            </ul>
	<?php
	}
	?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
   
  </header><!-- #header -->

  <!--==========================
    Home
  ============================-->
  <section id="home" class="masthead text-white text-center">
  <?php include 'koneksi.php'; ?> <!-- Panggil database -->

    <div class="home-container">
      <h1>Trajekline</h1>
      <h2>Buat perjalan terbaikmu dengan kami</h2>
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="index.php #wisata" method="get">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="cari" class="form-control form-control-lg" placeholder="Masukkan nama tempat wisata...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary" value="cari">Cari</button>
                </div>
              </div>
            </form>
           
          </div>
        </div>
      </div>
    </div>
  </section><!-- #home -->

 <!--==========================
   Paket tour
  ============================-->
  <section id="wisata">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Paket Tour</h3>
          <p class="section-description">Pilih paket yang anda inginkan</p>
        </div>
       

        <div class="jumbotron text-center" id="buatpaket" >
            <div id="judulfitur">
             <h1 style="color:black;">Buat Paket Tour Anda Sendiri</h1>
             <p style="color:black; font-weight:bold;">Tentukan paket terbaik untuk anda</p> 
             </div>
             <a href="form-request.php" class="btn btn-info" role="button">Buat Paket</a>
        </div>
        <div class="row">

<div class="col-lg-12">
  <ul id="wisata-flters">
    <li data-filter=".filter-gunung, .filter-pantai, .filter-tamanbermain, .filter-wisatapendidikan" class="filter-active">All</li>
    <li data-filter=".filter-gunung">Gunung</li>
    <li data-filter=".filter-pantai">Pantai</li>
    <li data-filter=".filter-tamanbermain">Taman Bermain</li>
    <li data-filter=".filter-wisatapendidikan">Wisata Pendidikan</li>
  </ul>
</div>
</div>
            <?php 
            if(isset($_GET['cari'])){
              $cari = $_GET['cari'];
              echo "<b>Hasil Pencarian : ".$cari."</b>";
            }
            ?>
<div class="row" id="wisata-wrapper">

        <?php
                    // memanggil file koneksi.php untuk koneksi database
                    include "koneksi.php";

                    // variabel $query_mysql untuk menyimpan hasil dari fungsi mysqli_query()
                    // mengambil semua data dari tb_siswa
                    $query_mysql = mysqli_query($koneksi, "SELECT * FROM paket_tour ")or die(mysqli_error($koneksi));

                    // membuat variavel $nomor untuk penomoran baris otomatis tabel
                   
                    if(isset($_GET['cari'])){
                      $cari = $_GET['cari'];
                      $nama_paket = mysqli_query($koneksi, "SELECT * FROM paket_tour WHERE nama_paket LIKE'%".$cari."%'");
                      $query_mysql = mysqli_query($koneksi, "SELECT * FROM paket_tour ");
                    }else{
                      $nama_paket = mysqli_query($koneksi, "SELECT * FROM paket_tour ")or die(mysqli_error($koneksi));
                    }
                    // perulangan untuk mencetak tiap" record dari hasil query
                    // hasil query tersimpan dalam bentuk array
                    // digunakan fungsi mysqli_fetch_array() untuk mengambil nilai dari tiap baris record dari array
                    while($data = mysqli_fetch_array($nama_paket)) {
                  ?>
      


          <div class="col-lg-3 col-md-6 wisata-item filter-<?php echo $data['kategori']; ?>">
            <a href="detail-paket.php?id_paket=<?php echo $data['id_paket']; ?>">
              <img src="img/destinasi/<?php echo $data['foto'];?>" alt="">
              <div class="details">
                <h4><?php  echo $data['nama_paket']; ?></h4>
                <span>Rp. <?php echo number_format($data['harga'],0,',','.'); ?></span>
              </div>
            </a>
          </div>
          
          <?php } ?>

      </div>
    </section>
  <!-- #paket-tour -->
<!--==========================
      Bantuan Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Hubungi Kami</h3>
          <p class="section-description">Datang ke tempat kami atau hubungi kami di media sosial dibawah</p>
        </div>
      </div>

      <!-- Uncomment below if you wan to use dynamic maps -->
      <iframe  src="https://maps.google.com/maps?width=100&amp;height=398&amp;hl=en&amp;q=Gunung%20Batu%2CKebonsari%2C%20Jember%2C%20Indonesia+(PT.%20TRAJEK%20%20GROUP)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen>></iframe>

      <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-4">

            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>Jl Perumahan Gn. Batu<br>Jember, Jawa Timur</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>trajekline@gmail.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>6283847562830</p>
              </div>
            </div>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/trajeklinejember/?hl=id" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            </div>

          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="kirimMasukan.php" method="post" role="form" class="contactForm">
                <div class="form-group">
                <input id="id_saran" type="hidden" name="id_saran">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda"  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 20 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="saran_masukan" id="saran_masukan"rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Saran&Kritik"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button name="input" type="submit" value="add" class="btn btn-primary"
                    onclick="return confirm('Anda yakin ingin menyimpan data?');">Kirim Masukkan</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- #bantuan -->


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        PT. Trajekline Jember
      </div>
      <div class="credits">
        Cooperation with <a href="#soultaker">Soul Taker</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url('asset/lib/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/jquery/jquery-migrate.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/easing/easing.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/wow/wow.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/waypoints/waypoints.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/counterup/counterup.min.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/superfish/hoverIntent.js')?>"></script>
  <script src="<?php echo base_url('asset/lib/superfish/superfish.min.js')?>"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url('asset/contactform/contactform.js')?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url('asset/js/main.js')?>"></script>
  
  <script>
        /* when jQuery laods */
        $(document).ready(function() {
      /* click on back button - will do reset and removal of previously appended children */
      $('#back').on('click', function() {
        $('li.active').filter('.active').prev('li').find('a[data-toggle="tab"]').tab('show');
        $('li').find('a[data-toggle="tab"]').removeClass('btn-success');
        $('#ok-icon').addClass('hidden');
        total_tickets = 0;
        $('#listed_t1').addClass('hidden').children().not('h4').remove();
        $('#listed_t2').addClass('hidden').children().not('h4').remove();
        $('#listed_t3').addClass('hidden').children().not('h4').remove();
        render();
      });
      /* click on continue button */
      $('#continue').on('click', function() {
        if (total_tickets > 0) {
    			$('li.active').filter('.active').next('li').find('a[data-toggle="tab"]').tab('show');
          $('li').find('a[data-toggle="tab"]').addClass('btn-success');
          $('#ok-icon').removeClass('hidden');
          addTicketList(t1);
          addTicketList(t2);
          addTicketList(t3);
        }
  		});
      render();
  	});
    /* VARIABLES */
    var total = 0;         // total amount to be paid
    var total_tickets = 0; // total amount of tickets
    var t1 = { id: 't1', pocet: 0, hodnota: 100 }; // ticket 1st category
    var t2 = { id: 't2', pocet: 0, hodnota: 350 }; // ticket 2nd category
    var t3 = { id: 't3', pocet: 0, hodnota: 800 }; // ticket 3rd category

    /* perform either adding or substracting on a provided object */
    calculate = function(object, action) {
      if (action === 'plus') {
        total += object.hodnota;
        object.pocet++;
      } else if ((action === 'minus') && (object.pocet > 0)) {
        total -= object.hodnota;
        object.pocet--;
      }
      render();
    }

    /* recalculate and display numbers + assigning hidden inputs */
    render = function() {
      total_tickets = t1.pocet + t2.pocet + t3.pocet;
      $('#amount').html(total.toFixed(0));
      $('#t1_pocet').html(t1.pocet); $('#t2_pocet').html(t2.pocet); $('#t3_pocet').html(t3.pocet);
      /* assigning hidden inputs */
      $('#total_amount').html(total.toFixed(0));
      $('#t1_amount').html(t1.pocet); $('#t2_amount').html(t2.pocet); $('#t3_amount').html(t3.pocet);

      if (total_tickets > 0) {
        $('#continue').prop('disabled', false);
      } else {
        $('#continue').prop('disabled', true);
      }
    }

    /* add a list of tickets if multiple tickets are selected, argument is a ticket category */
    addTicketList = function(objekt) {
      if (objekt.pocet > 1 || total_tickets > 1) {
        for (var i = 0; i < objekt.pocet; i++) {
          $('#listed_' + objekt.id).removeClass('hidden').append(insert(i+1));
        }
      }
    }

    /* insert a row if multiple ticket are selected, argument passed is a ticket count (for that section) */
    var insert = function(num) {
      return (
      "<div class='row'>"+
        "<div class='col-xs-1'><label for='row' class='p-top'><span class='ticket_span'>"+ num +"#</span></label></div>"+
        "<div class='col-xs-5'><input type='text' class='form-control' name='names[]' placeholder='Full name' required></div>"+
        "<div class='col-xs-6'><input type='email' class='form-control' name='emails[]' placeholder='anothername@gmail.com' required></div>"+
      "</div>");
    }
  </script>
</body>
</html>
