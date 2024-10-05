<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo PHP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #282c34;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 2em;
        }
        #output {
            white-space: pre; /* Preserve whitespace */
        }
    </style>
</head>
<body>
    <div id="output"></div>

    <script>
        const message = "Hola Mundo";
        const outputElement = document.getElementById('output');
        
        let index = 0;

        function printCharacter() {
            if (index < message.length) {
                outputElement.innerHTML += message.charAt(index);
                index++;
                setTimeout(printCharacter, 1000); // Call the function every second
            }
        }

        printCharacter(); // Start the printing process
    </script>
</body>
</html>
