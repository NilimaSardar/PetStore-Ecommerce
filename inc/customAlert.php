<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Alert Toast</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */

#toast-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
}

.toast {
    min-width: 250px;
    margin-bottom: 10px;
    padding: 15px;
    border-radius: 5px;
    color: white;
    display: none;
    font-family: Arial, sans-serif;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

.toast.success {
    background-color: #4CAF50; /* Green */
}

.toast.error {
    background-color: #f44336; /* Red */
}

/* Animation */
@keyframes fadein {
    from { opacity: 0; right: 0; }
    to { opacity: 1; right: 20px; }
}

@keyframes fadeout {
    from { opacity: 1; right: 20px; }
    to { opacity: 0; right: 0; }
}

    </style>
</head>
<body>

    <h1>Click the button to trigger a toast</h1>
    <button onclick="alert_toast('This is a success message!', 'success')">Show Success Toast</button>
    <button onclick="alert_toast('This is an error message!', 'error')">Show Error Toast</button>

    <!-- Toast container -->
    <div id="toast-container"></div>

    <script>

        function alert_toast(message, type) {
            // Create a new div for the toast
            const toast = document.createElement('div');
            toast.classList.add('toast', type);
            toast.innerText = message;

            // Get the toast container and append the new toast
            const toastContainer = document.getElementById('toast-container');
            toastContainer.appendChild(toast);

            // Show the toast
            toast.style.display = 'block';

            // Remove the toast after 3 seconds (3000ms)
            setTimeout(() => {
                toast.style.display = 'none';
                toast.remove(); // Remove from DOM after it's hidden
            }, 3000);
        }

    </script>
</body>
</html>
