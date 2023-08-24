<?php 
    function upload($files,$target){
        if ($files["imag"]["name"]=="") {
            return "please insert at least one photo";
        }
        $names = $files["imag"]["name"];//get names
        $tmp_name = $files["imag"]["tmp_name"];//get tmp location

        $files_array = array_combine($tmp_name,$names);// combine the arrays

        foreach($files_array as $tmp_folder => $img_name){
            move_uploaded_file($tmp_folder,$target.$img_name);
        }
        return "success";

    }

    /**
     * Summary of image
     * @return mixed
     */
    function image(){
        $image_tag="";
        if(isset($_FILES['imag']) && $_FILES['imag']['error'] !== UPLOAD_ERR_NO_FILE){
            $totalImages = count($_FILES['imag']['name']);
           for ($i=0; $i < $totalImages; $i++) { 
           if($i!=0)
           $image_tag = $image_tag.",".$_FILES["imag"]["name"][$i];
           else
           $image_tag = $_FILES["imag"]["name"][$i];

           echo "<br>".$_FILES["imag"]["name"][$i]."$totalImages <br>";
            }
       }
       return $image_tag;
    }

    ?>