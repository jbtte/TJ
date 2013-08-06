<?

    // require common code
    require_once("Comon/common.php"); 
    
    // check if user placed a username
    if ($_POST["username"] == null)
    {
        apologize("Invalid username and/or password!");     
    
    }
    
    // check if user placed a password
    if ($_POST["password"] == null)
    {
        apologize("Invalid username and/or password!");    
    
    }
    
    // check if password is equal to re-type
    if ($_POST["password"] != $_POST["password2"] )
    {
        apologize("Invalid username and/or password!");     
    
    }     

    
   
    // escape username to avoid SQL injection attacks
    $username = mysql_real_escape_string($_POST["username"]);
    
    // hash password
    $hash = crypt($_POST["password"]);
   
    // prepare SQL
    $sql = "INSERT INTO user (usuario, senha) VALUES ('$username', '$hash')";

    // execute query
    $result = mysql_query($sql);
    
    if ($result){
         
        
        // grab row
        $row = mysql_insert_id;
        
        // remember that user's now logged in by caching user's ID in session
        $_SESSION["id"] = $row["id"];

        // redirect to portfolio
        redirect("index.php");
    }
    
    // else report error
    apologize("Invalid username and/or password!");
    

    

    

    

?>
