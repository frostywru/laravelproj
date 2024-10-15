<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


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

            </div>
        </div>
    </div>
</x-app-layout>
