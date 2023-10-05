<?php
    function upload_foto($ft,$data){
        if ($data=="user")
            $target_dir = "imgUser/";
        else if ($data=="member")
            $target_dir = "imgMember/";
        else
            $target_dir = "img/";
        $target_file = $target_dir . basename($ft["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //check if files already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;    }
        //check file size
        if ($ft["size"] > 5000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;    }
        //allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
            $uploadOk = 0; }
        //check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        //if everything is ok, try upload file    
        } else {
            if (move_uploaded_file($ft["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
                return true;
            } else {
                //echo "Sorry, there was an error uploading your file.";
                return false;}
        }
    }
?>