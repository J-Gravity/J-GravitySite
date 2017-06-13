<?php

header('Content-Type: text/plain; charset=utf-8');

try {
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['file-select']['error']) || /* Referencing file by html <input ID=""/> */
        is_array($_FILES['file-select']['error'])  /* ['userfile'] is also a valid reference    */
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['file-select']['error'] value.
    switch ($_FILES['file-select']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    /* TODO : Find our PHP .ini and figure out what file size we can support */

    //if ($_FILES['file-select']['size'] > 1000000) {
    //    throw new RuntimeException('Exceeded filesize limit.');
    //}

    /* TODO : What is MIME type */

    $finfo = new finfo(FILEINFO_MIME_TYPE);

    /* finfo class reference, will be removing soon
    ** <--------------------------------------------
    ** finfo {
    **    public __construct ([ int $options = FILEINFO_NONE [, string $magic_file = NULL ]] )
    **    public string buffer ( string $string = NULL [, int $options = FILEINFO_NONE [, resource $context = NULL ]] )
    **    public string file ( string $file_name = NULL [, int $options = FILEINFO_NONE [, resource $context = NULL ]] )
    **    public bool set_flags ( int $options )
    ** }
    ** -------------------------------------------->
    */

    if (false === $ext = array_search(                  /* Setting .extension variable and performing a strict equality operation */
      $finfo->file($_FILES['file-select']['tmp_name']), /* Searching the file array for match                                     */
        array('jgrv' => 'file-select/jgrv',),           /* Looking for a match                                                    */
          true                                          /* true = strict search criteria .. exact matches ONLY                    */
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    if (!move_uploaded_file(                             /* Function() moves uploaded file to destination */
      $_FILES['file-select']['tmp_name'],                /* File to print                                 */
        sprintf('./testdata/%s.%s',                      /* Printing file name                            */
          sha1_file($_FILES['file-select']['tmp_name']), /* Hashing function for security                 */
            $ext)                                        /* File extension                                */
    )
  ) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {
    echo $e->getMessage();
}

/*********************************************************************************************
** Everything below here is essentially the same code as above.
** There are error-checking methods with validation and appropriate termination
** Given no errors, the script should invoke move_uploaded_file() and complete the transaction
*********************************************************************************************/

/*
$target_dir = "testdata/"; // Specify target directory
$target_file = $target_dir . basename($_FILES["data"]['name']);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);*/
// Check if image file is a actual image or fake image

/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES['userfile']['tmp_name']);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
*/



// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["data"]['size'] > 500000) { /* Some number we get to set */
  /*  echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "jgrv") {
    echo "Files must be uploaded with .jgrv extension";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
/*
  foreach ($_FILES['userfile']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
      $tmp_name = $_FILES['userfile']["tmp_name"][$key];
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["uploadData"]["name"][$key]);
      move_uploaded_file($tmp_name, "data/$name");
  }
}
    if (move_uploaded_file($_FILES["data"]['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["data"]['name']). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
/*foreach ($_FILES["pictures"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["pictures"]["name"][$key]);
        move_uploaded_file($tmp_name, "data/$name");
    }
}*/

?>
