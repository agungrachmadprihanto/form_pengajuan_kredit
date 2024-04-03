<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    
    {{-- test --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    {{-- end --}}

    <style>
        /* your CSS goes here*/
        body {
            background: #eee
        }

        #regForm {
            background-color: #ffffff;
            margin: 0px auto;
            font-family: Raleway;
            padding: 40px;
            border-radius: 10px
        }

        h1 {
            text-align: center
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa
        }

        input.invalid {
            background-color: #ffdddd
        }

        .tab {
            display: none
        }

        button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer
        }

        button:hover {
            opacity: 0.8
        }

        #prevBtn {
            background-color: #bbbbbb
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5
        }

        .step.active {
            opacity: 1
        }

        .step.finish {
            background-color: #4CAF50
        }

        .all-steps {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px
        }

        .thanks-message {
            display: none
        }

        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }


        /* Hide the browser's default radio button */

        .container input[type="radio"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }


        /* Create a custom radio button */

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }


        /* On mouse-over, add a grey background color */

        .container:hover input~.checkmark {
            background-color: #ccc;
        }


        /* When the radio button is checked, add a blue background */

        .container input:checked~.checkmark {
            background-color: #2196F3;
        }


        /* Create the indicator (the dot/circle - hidden when not checked) */

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }


        /* Show the indicator (dot/circle) when checked */

        .container input:checked~.checkmark:after {
            display: block;
        }


        /* Style the indicator (dot/circle) */

        .container .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

        .kbw-signature { width: 450px; height: 200px;}
        #sigModal canvas{
            width: auto;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form id="regForm">
                    @csrf

                    <h1 id="register">Form Pengajuan Kredit</h1>

                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif                
                    <!-- Way 1: Display All Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                    <div class="tab">
                        <h3><strong>Account Officer :</strong> </h3>
                        <label for="">Nomor Telefon / WhatsApp</label>
                        <input type="number" oninput="this.className = ''" value="{{ $no_hp }}" readonly>
                        <p>
                            <label for="">Nama :</label>
                            <input type="text" oninput="this.className = ''" value="{{ $nama }}" readonly>
                        </p>
                        <input type="hidden" value="{{ $nip }}" name="nip">
                    </div>
                    <div class="tab">
                        <p>
                            <label for="">Nama Pemohon : </label>
                            <input placeholder="Nama Lengkap" oninput="this.className = ''" name="name">
                        </p>
                        <p>
                            <label for="">Pekerjaan Pemohon :</label>
                            <input placeholder="Pekerjaan" oninput="this.className = ''" name="pekerjaan">
                        </p>
                        <p>
                            <label for="">Usia : </label>
                            <input type="number" placeholder="Usia" oninput="this.className = ''" name="usia">
                        </p>
                        <p>
                            <label for="">Tanggal Lahir</label>
                            <input type="date" placeholder="tanggal lahir" oninput="this.className = ''" name="tanggal_lahir">
                        </p>
                        <p>
                            <label for="">Nomor Handphone / WhatsApp (Hp) : </label>
                            <input type="number" placeholder="Nomor Handphone" oninput="this.className = ''" name="phone">
                        </p>
                        <p>
                            <label for="">Nama Suami / Istri : </label>
                            <input placeholder="nama suami/istri" oninput="this.className = ''" name="name_pasangan">
                        </p>           
                        <p>
                            <label for="">Usia Suami / Istri :</label>
                            <input type="number" placeholder="usia suami/istri" oninput="this.className = ''" name="usia_pasangan">
                        </p>
                        <p>
                            <label for="">Alamat Rumah (sesuai identitas)</label>
                            <input placeholder="alamat rumah" oninput="this.className = ''" name="alamat_rumah">
                        </p>
                        <p>
                            <label for="">Kontak yang dapat dihubungi</label>
                            <input placeholder="nama kontak darurat" oninput="this.className = ''" name="kontak_darurat">
                        </p>                    
                        <p>
                            <label for="">Hubungan dengan Kontak Darurat</label>
                            <input placeholder="hubungan" oninput="this.className = ''" name="hubungan_kontak_darurat">
                        </p>
                        <p>
                            <label for="">Alamat Kontak Darurat</label>
                            <input placeholder="alamat kontak darurat" oninput="this.className = ''" name="alamat_kontak_darurat">
                        </p>
                        <p>
                            <label for="">Nomor Telepon Kontak Darurat</label>
                            <input type="number" placeholder="nomor telepon kontak darurat" oninput="this.className = ''" name="phone_kontak_darurat">
                        </p>
    
                    </div>
                    <div class="tab">
                        <p>
                            <label for="">Jumlah Pinjaman</label>
                            <input placeholder="Jumlah Pinjaman" onkeyup="handleChange(this)" oninput="this.className = ''" name="jumlah_pengajuan">
                        </p>
                        <p>
                            <label for="">Jangka Waktu</label>
                            <input placeholder="Jangka Waktu" oninput="this.className = ''" name="jangka_waktu">
                        </p>
                        <p>
                            <label for="">Keterangan Keperluan</label>
                            <input placeholder="Keterangan keperluan" oninput="this.className = ''" name="keperluan_pengajuan_kredit">
                        </p>
                        <p>
                            <label for="">Jenis Kredit</label>
                            <select class="form-select" id="jenis_kredit" name="jenis_kredit">
                                <option value="angsuran">Angsuran</option>
                                <option value="musiman">Musiman</option>
                                <option value="Rekening Koran">Rekening Koran</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </p>
                        <p>
                            <label for="">Total Penghasilan</label>
                            <input placeholder="total penghasilan" onkeyup="handleChange(this)" oninput="this.className = ''" name="total_penghasilan">
                        </p>
                        <p>Jaminan
                            <select id="jaminan" name="jaminan">
                                <option value="sertifikat">Sertifikat</option>
                                <option value="BPKB">Bpkb</option>
                                <option value="BPKB">Lainnya</option>
                            </select>
                        </p>
                    </div>
                    <div class="tab">
                        <label for="">Tanda Tangan</label>
                        <br>
                        <div id="sigModal" name="ttd"></div>
                        <button id="clearModal" class="btn btn-danger">Clear Signature</button>
                        <textarea id="signature64" name="signed" style="display: none"></textarea>
                    </div>
    
                    <div class="thanks-message text-center" id="text-message">
                        <h3>Terimakasih !</h3> <span>Mohon Bersabar TIM BPR Mandiri Artha Abadi akan menghubungi anda</span>
                    </div>

                    <div style="overflow:auto;" id="nextprevious">
                        <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> --}}

<script>
    $(document).ready(function() {
        var sigModal = $('#sigModal').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clearModal').click(function(e) {
            e.preventDefault();
            sigModal.signature('clear');
            $("#signature64").val('');
        });
     
});
</script>

<script>
    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function(event) {
        showTab(currentTab);
    });

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            var nextBtn = document.getElementById("nextBtn");
            nextBtn.innerHTML = "Submit";
            nextBtn.setAttribute("onclick", "submitForm();");
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
            // document.getElementById("nextBtn").removeAttribute("onclick");
        }
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("nextprevious").style.display = "none";
            document.getElementById("all-steps").style.display = "none";
            document.getElementById("register").style.display = "none";
            document.getElementById("text-message").style.display = "block";
        }
        showTab(currentTab);
    }

    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += " invalid";
                valid = false;
            }
        }
        if (valid) { 
            document.getElementsByClassName("step")[currentTab].className += " finish"; 
        }
        return valid;
    }

    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) { x[i].className = x[i].className.replace(" active", ""); }
        x[n].className += " active";
    }


    function submitForm() {
        var formData = new FormData(document.getElementById("regForm")); // Mendapatkan data formulir

    // Kirim data menggunakan AJAX
        $.ajax({
            url: "{{ route('pengajuan.post') }}", // URL dari endpoint controller Laravel
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle respons dari server jika berhasil
                console.log(response);

                Swal.fire({
                icon: 'success',
                title: 'Formulir berhasil dikirim!',
                showCancelButton: false,
                confirmButtonText: 'OK',        
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Terimakasih!',
                        'Mohon tunggu konfirmasi selanjutnya.',
                        'info'
                    ).then(()=>{
                        location.reload();
                    });
                }
            });

            },
            error: function(xhr, status, error) {
                // Handle error jika terjadi kesalahan saat mengirim formulir
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat mengirim formulir.');
            }
        });
    }


    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    // Fungsi untuk menangani perubahan input
    function handleChange(input) {
        var angka = input.value.replace(/\./g, '');
        input.value = formatRupiah(angka);
    }
</script>






</body>
</html>
