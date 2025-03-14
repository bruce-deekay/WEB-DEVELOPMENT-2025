<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form processing</title>
</head>
<body>
    <h1>HTML Complex Form Processing</h1>

    <form action="process_complex_form.php" method = "POST">
        <!-- Text Input -->
         <label for="">Name:</label>
         <input type="text" name = "username">

         <!-- Password Input -->
          <label for="">Password:</label>
          <input type="password" name = "password">

        <!-- Checkbox -->
         Subscribe<input type="checkbox" name = "subscribe" value = "yes">

        <!-- Radio buttons -->
         Male<input type="radio" name = "gender" value = "male">
         Female<input type="radio" name = "gender" value = "female">
         Other<input type="radio" name = "gender" value = "other">

        <!-- Select dropdown -->
         <select name="country" id="">
            <option value="USA">United States</option>
            <option value="Ca">Canada</option>
            <option value="UK">United Kingdom</option>
         </select>

         <!-- Multi-select -->
          <select name="interest[]" mutiple id="">
            <option value="sports"> Sports</option>
            <option value="music"> Music</option>
            <option value="movies"> Movies</option>
          </select>

          <!-- Hidden field -->
           <input type="hidden" name = "form_id" value="regisration">

         <button type="submit">Register</button>
    </form>
</body>
</html>