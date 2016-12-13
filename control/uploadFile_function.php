<?php 

function uploadFile($url)
{
    if (isset($_FILES["file"])) {
      if ((($_FILES["file"]["type"] == "application/octet-stream")  //rar,7z
      || ($_FILES["file"]["type"] == " application/zip")   //zip
      || ($_FILES["file"]["type"] == " application/msword") //word
      || ($_FILES["file"]["type"] == " application/vnd.ms-powerpoint ")//ppt
      || ($_FILES["file"]["type"] == " application/pdf ")//pdf
      || ($_FILES["file"]["type"] == " text/plain")//txt
      )  //word
      && ($_FILES["file"]["size"] < 20000))
        {
          $fullurl="$url/" . $_FILES["file"]["name"];
        if ($_FILES["file"]["error"] > 0)
          {
  //        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
          }
        else
          {
          // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
          // echo "Type: " . $_FILES["file"]["type"] . "<br />";
          // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
          // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

          if (file_exists("$url/" . $_FILES["file"]["name"]))
            {
  //          echo $_FILES["file"]["name"] . " already exists. ";
            }
          else
            {
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "$url/" . $_FILES["file"]["name"]);
  //          echo "Stored in: " . "$url/" . $_FILES["file"]["name"];
            unset($_FILES["file"]);
            
            return $fullurl;
            }
          }
      }
    else
      {
  //    echo "Invalid file";
      }
  }

  unset($_FILES["file"]);
  return null;
}
?>