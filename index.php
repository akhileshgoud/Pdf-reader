

<?php
if (!isset($_POST['submit'])) 
 {
 echo '<html>
       <head>
       <title>pdf reader</title>
       </head>
       <body>
       <br><font face="ARIAL" color="black"><center><h2>PDF READER</font></h2></center><br>
       <form name="form1" method="post" enctype="multipart/form-data">
       <br><center>Upload File:<input type="file" name="file" id="file" accept="application/pdf"></center><br>
       <br><center><pre><input type="reset" value="Reset">              <input type="submit" name="submit" value="Upload"></pre></center>
       </form>
       </body>
       </html>';
 } 
else 
 { 
 fupload();
 }
?>

<?php
function fupload()
{
$upload_dir = getcwd();

if ($_FILES['file']['type'] == "application/pdf")
 {
  if (file_exists($upload_dir."/".$_FILES["file"]["name"]))
      {
      echo " <br/> ** ERROR ** 
             <br/> The file " . $_FILES["file"]["name"] . " already exists. 
             <br/> Change the file name and upload again.";
      }
    else
      {
      $filename = $_FILES["file"]["name"];
       if(move_uploaded_file($_FILES["file"]["tmp_name"], "$upload_dir/$filename"))
       {
         echo "<br/> <br/> File uploaded to: " . $upload_dir ;
       }
       else
       {
     	 echo 'File Uploding Failed.';
       }
      }
 }
 else
 {
  echo " <br/> ** ERROR ** 
         <br/> Invalid file type. 
         <br/> Select a PDF file only and upload again. ";
 }
}
?> 
