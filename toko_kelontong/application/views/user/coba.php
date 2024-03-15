<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hardifal.com</title>
    <style>
        form {
            padding: 15%;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- Form input data Angka -->
    <form name="form" align="center">

        <span>Angka 1</span>
        <input type="text" name="angka1" size="3"><br><br>

        <span>Angka 2</span>
        <input type="text" name="angka2" size="3"><br> <br>

        <span>Hasil</span>
        <input type="text" name="hasil" size="6" value=""><br>
        <br><br>


        <input type="button" onclick="tambah()" value="+">
        <input type="button" onclick="kurang()" value="-">
        <input type="button" onclick="kali()" value="X">
        <input type="reset" onclick="clear()" value="CLEAR">
    </form>




    <!-- javascript -->
    <script>
        function cek() {
            if (form.angka1.value == "" || form.angka2.value == "") {
                alert("Angka Kosong");
                exit
            }
        }

        function tambah() {
            cek();
            a = parseInt(form.angka1.value);
            b = parseInt(form.angka2.value);
            form.hasil.value = a + b;
        }
    </script>