<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increment/Decrement Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button.increment {
            background-color: #4CAF50; /* Green */
            color: white;
        }
        button.decrement {
            background-color: #f44336; /* Red */
            color: white;
        }
        button:hover {
            opacity: 0.8; /* Slightly transparent on hover */
        }
        #counter {
            font-size: 48px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Increment and Decrement Counter</h1>
    <div id="counter">0</div>
    <button class="decrement" onclick="decrement()">Decrement</button>
    <button class="increment" onclick="increment()">Increment</button>

    <script>
        let count = 0;

        function increment() {
            count++;
            updateCounter();
        }

        function decrement() {
            count--;
            updateCounter();
        }

        function updateCounter() {
            document.getElementById('counter').innerText = count;
        }
    </script>
</body>
</html>
