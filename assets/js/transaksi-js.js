function ketikRupiah(){
    var rupiah = document.getElementById("uangMasuk");
    rupiah.addEventListener("keyup", function(e) {
      rupiah.value = formatRupiah(this.value, "Rp. ");
    });
    }
    
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
      }
    
      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
    
    function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      function w3_open() {
        document.getElementById("main").style.marginLeft = "25%";
        document.getElementById("mySidebar").style.width = "25%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("btn").style.display = 'none'
      }
    
      function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("btn").style.display = "inline-block";
}

function tampil() {
  var table = document.getElementById("myTable");

  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      var temp = "$temp = ";
      var a = prompt('jumlah');
      temp = +a;
      return temp;
    };
  }
}

function ambilData() {
  var data = prompt("Masukan jumlah barang terbaru:");
  if (data != null) {
    document.edit.penampung.value = data;
  }
}
