<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // check if file was uploaded without errors
    if (isset($_FILES["uploaded_file"]) && $_FILES["uploaded_file"] ["error"] === 0){
        // Get file details
        $file_name = $_FILES["uploaded_file"]["name"];
        $file_type = $_FILES["uploaded_file"]["type"];
        $file_size = $_FILES["uploaded_file"]["size"];
        $file_tmp_name = $_FILES["uploaded_file"]["tmp_name"];

        // Security checks
        // 1. Check file size (limit to 1mb in this example)
        if($file_size > 1048576){
            echo "Error: File size exceeds the limit (1mb)";
            exit;
        }

        //2. Validate file type/extension
        $allowed_types = ["image/jpg", "image/png", "image/gif", "application/pdf"];
        if (!in_array($file_type, $allowed_types)){
            echo "Error: Only JPG, PNG, GIF, and PDF files are allowed";
            exit;
        }   

        // 3. Create a safe filename
        $upload_dir = "uploads/"; // Make sure this directory exists and is writable
        $new_file_name = uniqid() . "_" . basename($file_name);
        $upload_path = $upload_dir . $new_file_name;

        // 4. Move the uploaded file to the destination
        if (move_uploaded_file($file_tmp_name, $upload_path)){
            echo "File uploaded successfully. Saved as: ". $new_file_name;

            // Optional: Record the upload in a database
            // recordFileUpload($new_file_name, $file_type, $file_size)
        }else{
            // Handle errors
            $error_message = "";
            switch($_FILES['uploaded_file']['error']){
                case UPLOAD_ERR_INI_SIZE:
                    $error_message = "The uploaded file exceeds the server's maximum allowed size<br>";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $error_message = "The uploaded file exceeds the form's maximum allowed size<br>";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $error_message = "The file was partially uploaded<br>";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $error_message = "No file was uploaded<br>";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $error_message = "Missing temporary folder<br>";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $error_message = "Failed to write file to disk<br>";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $error_message = "A PHP extension stopped the file upload<br>";
                    break;
                default:
                $error_message = "unknown upload error";
            }

            echo "Error: " . $error_message . "<br>";
        }
    }
}

?>