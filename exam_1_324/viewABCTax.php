<?php
session_start();
if (isset($_SESSION['nombreusr'])) {
    $username = $_SESSION['nombreusr'];
    $userci = $_SESSION['ci'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['java'])){
        $id = $_SESSION['id'];  // Get the ID from the session
        $JAVA_HOME = "C:\Program Files\Java\jdk-23";
        $PATH = "$JAVA_HOME\bin";
        putenv("JAVA_HOME=$JAVA_HOME");
        putenv("PATH=$PATH");
        // Command to run the Java program
        $command = "java determineTax $id";

        // Execute the Java program
        $output = shell_exec($command);

        // Display the output from the Java program
        echo "<h2>$output</h2>";
    } else {
        $id = $_SESSION['id'];  // Get the ID from the session
        
        // Command to run the C# program
        $command = "determineTax.exe $id";

        // Execute the C# program
        $output = shell_exec($command);

        // Display the output from the C# program
        echo "<h2>$output</h2>";
    }
}
?>
