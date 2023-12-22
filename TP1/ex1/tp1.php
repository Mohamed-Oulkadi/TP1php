<html>
    <body>
        <form action="#" method="post">
            Send a pdf file : <input type="file" name="file" accept=".pdf"><br>
            <input type="submit" value="send">
        </form>
    </body>
</html>

<?php
     if ($_FILES["file"]["type"] == "application/pdf") {
         if ($_FILES["file"]["size"] < 1000000) {

         } else {
             echo "the file is over 1mo";
         }
     } else {
         echo "Your file is not pdf";
     }

?>     