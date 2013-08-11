<?
    
   // require common code
    require_once("Comon/common.php"); 
    
?>
<!DOCTYPE html>

    <head>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
        <link href="css/login.css" rel="stylesheet" type="text/css">
        <title>JP: Log In</title>
    </head>
    
    <body>
    	<div id="header"></div>
    	<div id="content"></div>
        <div id="footer">
        	<div id = "content">
	          <form action="login2.php" method="post">
	            <table>
	              <tr>
	                
	                <td><input name="usuario" placeholder="User" type="text"></td>
	              </tr>
	              <tr>
	                
	                <td><input name="senha" placeholder="Password" type="password"></td>
	              	<td></td>
	                <td colspan="2"><input type="submit" value="Log In"></td>
	              </tr>
	            </table>
	          </form>
	        </div>  
        </div>
    
    
    
    
    
    </body>


